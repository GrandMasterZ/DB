<?php
// sukuriame modelių klasės objektą
include 'libraries/show.class.php';
$showObj = new show();

// sukuriame puslapiavimo klasės objektą
include 'utils/paging.class.php';
$paging = new paging(NUMBER_OF_ROWS_IN_PAGE);

if(!empty($removeId)) {
    // patikriname, ar šalinamas modelis nenaudojamas, t.y. nepriskirtas jokiam automobiliui
    $count = $showObj->getContractCountOfService($removeId);

    $removeErrorParameter = '';
    if($count == 0) {
        // pašaliname modelį
        $showObj->deleteService($removeId);
    } else {
        // nepašalinome, nes modelis priskirtas bent vienam automobiliui, rodome klaidos pranešimą
        $removeErrorParameter = '&remove_error=1';
    }

    // nukreipiame į modelių puslapį
    header("Location: index.php?module={$module}{$removeErrorParameter}");
    die();
}
?>
    <ul id="pagePath">
        <li><a href="index.php">Pradžia</a></li>
        <li>Seansai</li>
    </ul>
    <div id="actions">
        <a href='index.php?module=<?php echo $module; ?>&action=new'>Naujas seansas</a>
    </div>
    <div class="float-clear"></div>

<?php if(isset($_GET['remove_error'])) { ?>
    <div class="errorBox">
        Seansas nebuvo pasalintas. Yra sio seanso bilietu
    </div>
<?php } ?>

    <table>
        <tr>
            <th>ID</th>
            <th>pradzios laikas</th>
            <th>pabaigos laikas</th>
            <th>kaina</th>
            <th>pavadinimas </th>
            <th>Kino teatras</th>
        </tr>
        <?php
        // suskaičiuojame bendrą įrašų kiekį
        $elementCount = $showObj->getShowListCount();

        // suformuojame sąrašo puslapius
        $paging->process($elementCount, $pageId);

        // išrenkame nurodyto puslapio modelius
        $data = $showObj->getShowList($paging->size, $paging->first);

        // suformuojame lentelę
        foreach($data as $key => $val) {
            echo
                "<tr>"
                . "<td>{$val['id_Seansas']}</td>"
                . "<td>{$val['pradzios_laikas']}</td>"
                . "<td>{$val['pabaigos_laikas']}</td>"
                . "<td>{$val['kaina']}</td>"
                . "<td>{$val['pavadinimas']}</td>"
                . "<td>{$val['kTeatras']}</td>"
                . "<td>"
                . "<a href='#' onclick='showConfirmDialog(\"{$module}\", \"{$val['id_Seansas']}\"); return false;' title=''>šalinti</a>&nbsp;"
                . "<a href='index.php?module={$module}&id={$val['id_Seansas']}' title=''>redaguoti</a>"
                . "</td>"
                . "</tr>";
        }
        ?>
    </table>

<?php
// įtraukiame puslapių šabloną
include 'controls/paging.php';
?>