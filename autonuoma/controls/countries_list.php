<?php

include 'libraries/awards.class.php';
$contractsObj = new awards();

include 'libraries/countries.class.php';
$servicesObj = new countries();

include 'utils/paging.class.php';
$paging = new paging(NUMBER_OF_ROWS_IN_PAGE);

if(!empty($removeId)) {
    // patikriname, ar šalinama paslauga nenaudojama jokioje sutartyje
    $contractCount = $servicesObj->getContractCountOfService($removeId);

    $removeErrorParameter = '';
    if($contractCount == 0) {
        // pašaliname paslaugos kainas
        $servicesObj->deleteServicePrices($removeId);

        // pašaliname paslaugą
        $servicesObj->deleteService($removeId);
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
        <li>Papildomos paslaugos</li>
    </ul>
    <div id="actions">
        <a href="report.php?id=2" target="_blank">Paslaugų ataskaita</a>
        <a href='index.php?module=<?php echo $module; ?>&action=new'>Nauja paslauga</a>
    </div>
    <div class="float-clear"></div>

<?php if(isset($_GET['remove_error'])) { ?>
    <div class="errorBox">
        Paslauga nebuvo pašalinta.
    </div>
<?php } ?>

    <table>
        <tr>
            <th>ID</th>
            <th>Zemynas</th>
            <th>Gyventoju skaicius</th>
            <th>Pavadinimas</th>
            <th>Laiko zona</th>
            <th>Ikurimo data</th>
        </tr>
        <?php
        // suskaičiuojame bendrą įrašų kiekį
        $elementCount = $servicesObj->getServicesListCount();

        // suformuojame sąrašo puslapius
        $paging->process($elementCount, $pageId);

        // išrenkame nurodyto puslapio paslaugas
        $data = $servicesObj->getServicesList($paging->size, $paging->first);

        // suformuojame lentelę
        foreach($data as $key => $val) {
            echo
                "<tr>"
                . "<td>{$val['id_Valstybe']}</td>"
                . "<td>{$val['zemynas']}</td>"
                . "<td>{$val['gyventoju_sk']}</td>"
                . "<td>{$val['pavadinimas']}</td>"
                . "<td>{$val['laiko_zona']}</td>"
                . "<td>{$val['ikurimo_data']}</td>"
                ."<td>"
                . "<a href='#' onclick='showConfirmDialog(\"{$module}\", \"{$val['id_Valstybe']}\"); return false;' title=''>šalinti</a>&nbsp;"
                . "<a href='index.php?module={$module}&id={$val['id_Valstybe']}' title=''>redaguoti</a>"
                . "</td>"
                . "</tr>";
        }
        ?>
    </table>

<?php
// įtraukiame puslapių šabloną
include 'controls/paging.php';
?>