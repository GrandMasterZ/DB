<?php
	// sukuriame modelių klasės objektą
	include 'libraries/theathers.class.php';
	$modelsObj = new theathers();
	// sukuriame puslapiavimo klasės objektą
	include 'utils/paging.class.php';
	$paging = new paging(NUMBER_OF_ROWS_IN_PAGE);
if(!empty($removeId)) {
	$count = $modelsObj->getCarCountOfModel($removeId);

	$removeErrorParameter = '';
	if ($count == 0) {
		// šaliname kino teatras
		$modelsObj->deleteModel($removeId);
	} else {
		// nepašalinome, nes kino teatras turi bent viena seansa
		$removeErrorParameter = '&remove_error=1';
	}
	header("Location: index.php?module={$module}{$removeErrorParameter}");
	die();
}
?>
<ul id="pagePath">
	<li><a href="index.php">Pradžia</a></li>
	<li>Kino teatrai</li>
</ul>
<div id="actions">
	<a href='index.php?module=<?php echo $module; ?>&action=new'>Naujas modelis</a>
</div>
<div class="float-clear"></div>

<?php if(isset($_GET['remove_error'])) { ?>
	<div class="errorBox">
		Kino teatras nebuvo pasalintas nes turi seansu
	</div>
<?php } ?>

<table>
	<tr>
		<th>ID</th>
		<th>Pavadinimas</th>
		<th>Adresas</th>
		<th>Ikurimo_data</th>
		<th>Darbo valandos</th>
		<th>Miestas</th>
	</tr>
	<?php
		// suskaičiuojame bendrą įrašų kiekį
		$elementCount = $modelsObj->getModelListCount();

		// suformuojame sąrašo puslapius
		$paging->process($elementCount, $pageId);

		// išrenkame nurodyto puslapio modelius
		$data = $modelsObj->getModelList($paging->size, $paging->first);

		// suformuojame lentelę
		foreach($data as $key => $val) {
			echo
				"<tr>"
					. "<td>{$val['id_Kino_teatras']}</td>"
					. "<td>{$val['kTeatras']}</td>"
					. "<td>{$val['adresas']}</td>"
					. "<td>{$val['ikurimo_data']}</td>"
					. "<td>{$val['darbo_valandos']}</td>"
					. "<td>{$val['miestas']}</td>"
					. "<td>"
						. "<a href='index.php?module={$module}&remove={$val['id_Kino_teatras']}'  title=''>šalinti</a>&nbsp;"
						. "<a href='index.php?module={$module}&id={$val['id_Kino_teatras']}' title=''>redaguoti</a>"
					. "</td>"
				. "</tr>";
		}
	?>
</table>

<?php
	// įtraukiame puslapių šabloną
	include 'controls/paging.php';
?>