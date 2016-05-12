<?php

	include 'libraries/cities.class.php';
	$servicesObj = new cities();
	
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
	<li>Miestai</li>
</ul>
<div id="actions">
	<a href='index.php?module=<?php echo $module; ?>&action=new'>Naujas miestas</a>
</div>
<div class="float-clear"></div>

<?php if(isset($_GET['remove_error'])) { ?>
	<div class="errorBox">
		Miestas nebuvo pasalintas, jame yra kino teatru
	</div>
<?php } ?>

<table>
	<tr>
		<th>ID</th>
		<th>Pavadinimas</th>
		<th>Gyventoju skaicius</th>
		<th>Ikurimo data</th>
		<th>Valstybe</th>
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
					. "<td>{$val['id_Miestas']}</td>"
					. "<td>{$val['pavadinimas']}</td>"
					. "<td>{$val['gyventoju_sk']}</td>"
					. "<td>{$val['data']}</td>"
					. "<td>{$val['valstybe']}</td>"
						."<td>"
						. "<a href='#' onclick='showConfirmDialog(\"{$module}\", \"{$val['id_Miestas']}\"); return false;' title=''>šalinti</a>&nbsp;"
						. "<a href='index.php?module={$module}&id={$val['id_Miestas']}' title=''>redaguoti</a>"
					. "</td>"
				. "</tr>";
		}
	?>
</table>

<?php
	// įtraukiame puslapių šabloną
	include 'controls/paging.php';
?>