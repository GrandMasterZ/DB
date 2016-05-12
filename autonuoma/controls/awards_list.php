<?php
	
	// sukuriame sutarčių klasės objektą
	include 'libraries/awards.class.php';
	$contractsObj = new awards();

	// sukuriame puslapiavimo klasės objektą
	include 'utils/paging.class.php';
	$paging = new paging(NUMBER_OF_ROWS_IN_PAGE);
	
	if(!empty($removeId)) {
		// pašaliname užsakytas paslaugas
		$contractsObj->deleteOrderedServices($removeId);

		// šaliname sutartį
		$contractsObj->deleteContract($removeId);

		// nukreipiame į sutarčių puslapį
		header("Location: index.php?module={$module}");
		die();
	}
?>
<ul id="pagePath">
	<li><a href="index.php">Pradžia</a></li>
	<li>Apdovanojimai</li>
</ul>
<div id="actions">
	<a href="report.php?id=1" target="_blank">Sutarčių ataskaita</a>
	<a href='index.php?module=<?php echo $module; ?>&action=new'>Naujas bilietas</a>
</div>
<div class="float-clear"></div>

<table>
	<tr>
		<th>id</th>
		<th>pavadinimas</th>
		<th>ceremonija</th>
	</tr>
	<?php
		// suskaičiuojame bendrą įrašų kiekį
		$elementCount = $contractsObj->getContractListCount();

		// suformuojame sąrašo puslapius
		$paging->process($elementCount, $pageId);

		// išrenkame nurodyto puslapio sutartis
		$data = $contractsObj->getContractList($paging->size, $paging->first);

		// suformuojame lentelę
		foreach($data as $key => $val) {
			echo
				"<tr>"
					. "<td>{$val['id_Apdovanojimas']}</td>"
					. "<td>{$val['Pav']}</td>"
					. "<td>{$val['pavadinimas']}</td>"
					. "<td>"
						. "<a href='#' onclick='showConfirmDialog(\"{$module}\", \"{$val['id_Apdovanojimas']}\"); return false;' title=''>šalinti</a>&nbsp;"
						. "<a href='index.php?module={$module}&id={$val['id_Apdovanojimas']}' title=''>redaguoti</a>"
					. "</td>"
				. "</tr>";
		}
	?>
</table>

<?php include 'controls/paging.php'; ?>