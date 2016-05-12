<?php
	
	// sukuriame klientų klasės objektą
	include 'libraries/movies.class.php';
	$customersObj = new movies();

	// sukuriame puslapiavimo klasės objektą
	include 'utils/paging.class.php';
	$paging = new paging(NUMBER_OF_ROWS_IN_PAGE);

	if(!empty($removeId)) {
		// patikriname, ar klientas neturi sudarytų sutarčių
		$count = $customersObj->getContractCountOfCustomer($removeId);
		
		$removeErrorParameter = '';
		if($count == 0) {
			// šaliname klientą
			$customersObj->deleteCustomer($removeId);
		} else {
			// nepašalinome, nes klientas sudaręs bent vieną sutartį, rodome klaidos pranešimą
			$removeErrorParameter = '&remove_error=1';
		}

		// nukreipiame į klientų puslapį
		header("Location: index.php?module={$module}{$removeErrorParameter}");
		die();
	}
?>
<ul id="pagePath">
	<li><a href="index.php">Pradžia</a></li>
	<li>Filmai</li>
</ul>
<div id="actions">
	<a href='index.php?module=<?php echo $module; ?>&action=new'>Naujas filmas</a>
</div>
<div class="float-clear"></div>

<?php if(isset($_GET['remove_error'])) { ?>
	<div class="errorBox">
		Filmas nebuvo pasalintas nes yra priskirtas seansui arba turi apdovanojimu (-ų).
	</div>
<?php } ?>

<table>
	<tr>
		<th>ID</th>
		<th>pavadinimas</th>
		<th>isleidimo data</th>
		<th>reitingas</th>
		<th>apdovanojimu skaicius</th>
		<th>pelnas</th>
	</tr>
	<?php
		// suskaičiuojame bendrą įrašų kiekį
		$elementCount = $customersObj->getCustomersListCount();

		// suformuojame sąrašo puslapius
		$paging->process($elementCount, $pageId);

		// išrenkame nurodyto puslapio klientus
		$data = $customersObj->getCustomersList($paging->size, $paging->first);

		// suformuojame lentelę
		foreach($data as $key => $val) {
			echo
				"<tr>"
					. "<td>{$val['id_Filmas']}</td>"
					. "<td>{$val['pavadinimas']}</td>"
					. "<td>{$val['pagaminimo_data']}</td>"
					. "<td>{$val['reitingas']}</td>"
					. "<td>{$val['apdovanojimu_sk']}</td>"
					. "<td>{$val['pelnas']}</td>"
					. "<td>"
						. "<a href='#' onclick='showConfirmDialog(\"{$module}\", \"{$val['id_Filmas']}\"); return false;' title=''>šalinti</a>&nbsp;"
						. "<a href='index.php?module={$module}&id={$val['id_Filmas']}' title=''>redaguoti</a>"
					. "</td>"
				. "</tr>";
		}
	?>
</table>

<?php
	// įtraukiame puslapių šabloną
	include 'controls/paging.php';
?>