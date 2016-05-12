<?php

include 'libraries/theathers.class.php';
$ticketsObj = new theathers();
include 'libraries/movies.class.php';
$clientObj = new movies();
include 'libraries/show.class.php';
$showObj = new show();

$formErrors = null;
$fields = array('kiekis','fk_Klientasid_Klientas', 'fk_Seansasid_Seansas');

// nustatome privalomus laukus
$required = array('kiekis','fk_Seansasid_Seansas','fk_Klientasid_Klientas');

// maksimalūs leidžiami laukų ilgiai
$maxLengths = array (
    'pavadinimas' => 20
);

// paspaustas išsaugojimo mygtukas
if(!empty($_POST['submit'])) {
    // nustatome laukų validatorių tipus
    $validations = array (
        'kaina' => 'alfanum',
        'fk_Filmasid_Filmas' => 'alfanum',
        'fk_Kino_teatrasid_Kino_teatras' => 'alfanum',
        `pradzios_laikas` => 'anything',
        `pabaigos_laikas` => 'anything'
    );

    // sukuriame validatoriaus objektą
    include 'utils/validator.class.php';
    $validator = new validator($validations, $required, $maxLengths);

    if($validator->validate($_POST)) {
        // suformuojame laukų reikšmių masyvą SQL užklausai
        $data = $validator->preparePostFieldsForSQL();
        var_dump($_GET['id']);
        $data['id_Seansas']=$_GET['id'];
        if($_GET['id']!=null) {
            // atnaujiname duomenis
            $showObj->updateService($data);
        } else {
            // randame didžiausią markės id duomenų bazėje
            $showObj->insertService($data);
        }

        // nukreipiame į markių puslapį
        header("Location: index.php?module={$module}");
        die();
    } else {
        // gauname klaidų pranešimą
        $formErrors = $validator->getErrorHTML();
        // gauname įvestus laukus
        $fields = $_POST;
    }
} else {
    // tikriname, ar nurodytas elemento id. Jeigu taip, išrenkame elemento duomenis ir jais užpildome formos laukus.
    if(!empty($id)) {
        $fields = $showObj->getService($id);
        $data['id']=$id;
    }
}
?>
<ul id="pagePath">
    <li><a href="index.php">Pradžia</a></li>
    <li><a href="index.php?module=<?php echo $module; ?>">Seansai</a></li>
    <li><?php if(!empty($id)) echo "Seanso redagavimas"; else echo "Naujas seansas"; ?></li>
</ul>
<div class="float-clear"></div>
<div id="formContainer">
    <?php if($formErrors != null) { ?>
        <div class="errorBox">
            Neįvesti arba neteisingai įvesti šie laukai:
            <?php
            echo $formErrors;
            ?>
        </div>
    <?php } ?>
    <form action="" method="post">
        <fieldset>

            <legend>Seanso informacija</legend>
            <p>
                <label class="field" for="kaina"> Kaina <?php echo in_array('kaina', $required) ? '<span> *</span>' : ''; ?></label>
                <select id="kaina" name="kaina">
                    <?php for($i=1; $i<13; $i++) {?>
                        <option <?php if(isset($fields['kaina']) && $fields['kaina'] == $i) { echo "selected=selected"; } ?> value=<?php echo $i ?>> <?php echo $i ?> </option>
                    <?php } ?>
                </select>
            </p>
            <p>
                <label class="field" for="pradzios_laikas">Pradzios laikas<?php echo in_array('pradzios_laikas', $required) ? '<span> *</span>' : ''; ?></label>
                <input type="text" id="pradzios_laikas" name="pradzios_laikas" class="datetime textbox-150" value="<?php echo isset($fields['pradzios_laikas']) ? $fields['pradzios_laikas'] : ''; ?>" />
            </p>
            <p>
                <label class="field" for="pabaigos_laikas">Pabaigos laikas<?php echo in_array('pabaigos_laikas', $required) ? '<span> *</span>' : ''; ?></label>
                <input type="text" id="pabaigos_laikas" name="pabaigos_laikas" class="datetime textbox-150" value="<?php echo isset($fields['pabaigos_laikas']) ? $fields['pabaigos_laikas'] : ''; ?>" />
            </p>
            <p>
                <label class="field" for="fk_Filmasid_Filmas">Filmas<?php echo in_array('fk_Filmasid_Filmas', $required) ? '<span> *</span>' : ''; ?></label>
                <select id="fk_Filmasid_Filmas" name="fk_Filmasid_Filmas">
                    <option value="">---------------</option>
                    <?php
                    // išrenkame aikšteles
                    $data = $clientObj->getCustomersList();
                    foreach($data as $key => $val) {
                        $selected = "";
                        if(isset($fields['fk_Filmasid_Filmas']) && $fields['fk_Filmasid_Filmas'] == $val['id_Filmas']) {
                            $selected = " selected='selected'";
                        }
                        echo "<option{$selected} value='{$val['id_Filmas']}'>{$val['pavadinimas']}</option>";
                    }
                    ?>
                </select>
            </p>
            <p>
                <label class="field" for="fk_Kino_teatrasid_Kino_teatras">Kino teatras<?php echo in_array('fk_Kino_teatrasid_Kino_teatras', $required) ? '<span> *</span>' : ''; ?></label>
                <select id="fk_Kino_teatrasid_Kino_teatras" name="fk_Kino_teatrasid_Kino_teatras">
                    <option value="">---------------</option>
                    <?php
                    // išrenkame aikšteles
                    $data = $ticketsObj->getModelList();
                    foreach($data as $key => $val) {
                        $selected = "";
                        if(isset($fields['fk_Kino_teatrasid_Kino_teatras']) && $fields['fk_Kino_teatrasid_Kino_teatras'] == $val['id_Kino_teatras']) {
                            $selected = " selected='selected'";
                        }
                        echo "<option{$selected} value='{$val['id_Kino_teatras']}'>{$val['kTeatras']} {$val['miestas']}</option>";
                    }
                    ?>
                </select>
            </p>
        </fieldset>
        <p class="required-note">* pažymėtus laukus užpildyti privaloma</p>
        <p>
            <input type="submit" class="submit" name="submit" value="Išsaugoti">
        </p>
        <?php if(isset($fields['id'])) { ?>
            <input type="hidden" name="id" value="<?php echo $fields['id']; ?>" />
        <?php } ?>
    </form>
</div>