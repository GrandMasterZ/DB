<?php
	
	// sukuriame darbuotojų klasės objektą
	include 'libraries/client.class.php';
	$client = new client();

	// sukuriame puslapiavimo klasės objektą
	include 'utils/paging.class.php';
	$paging = new paging(NUMBER_OF_ROWS_IN_PAGE);
if(!empty($removeId)) {
	// patikriname, ar darbuotojas neturi sudarytų sutarčių
	$count = $client->getContractCountOfEmployee($removeId);

	$removeErrorParameter = '';
	if($count == 0) {
		// šaliname darbuotoją
		$client->deleteEmployee($removeId);
	} else {
		// nepašalinome, nes darbuotojas sudaręs bent vieną sutartį, rodome klaidos pranešimą
		$removeErrorParameter = '&remove_error=1';
	}

	// nukreipiame į darbuotojų puslapį
	header("Location: index.php?module={$module}{$removeErrorParameter}");
	die();
}
?>
<ul id="pagePath">
	<li><a href="index.php">Pradžia</a></li>
	<li>Klientai</li>
</ul>
<div id="actions">
	<a href='index.php?module=<?php echo $module; ?>&action=new'>Naujas klientas</a>
</div>
<div class="float-clear"></div>

<?php if(isset($_GET['remove_error'])) { ?>
	<div class="errorBox">
		Klientas nebuvo pašalintas, nes turi bilieta/u).
	</div>
<?php } ?>

<table>
	<tr>
		<th>id</th>
		<th>asmens kodas</th>
		<th>telefonas</th>
		<th>vardas</th>
		<th>pavarde</th>
		<th>email</th>
		<th>gimimo data</th>
		<th>lytis</th>
		<th>tautybe</th>
	</tr>
	<?php
		// suskaičiuojame bendrą įrašų kiekį
		$elementCount = $client->getEmplyeesListCount();

		// suformuojame sąrašo puslapius
		$paging->process($elementCount, $pageId);

		// išrenkame nurodyto puslapio darbuotojus
		$data = $client->getEmplyeesList($paging->size, $paging->first);

		// suformuojame lentelę
		foreach($data as $key => $val) {
			echo
				"<tr>"
					. "<td>{$val['id_Klientas']}</td>"
					. "<td>{$val['asmens_kodas']}</td>"
					. "<td>{$val['telefonas']}</td>"
					. "<td>{$val['vardas']}</td>"
					. "<td>{$val['pavarde']}</td>"
					. "<td>{$val['e_pastas']}</td>"
					. "<td>{$val['gimimo_data']}</td>"
					. "<td>{$val['lytis']}</td>"
					. "<td>{$val['tautybe']}</td>"
					. "<td>"
						. "<a href='index.php?module={$module}&remove=\" + removeId' onclick='showConfirmDialog(\"{$module}\", \"{$val['id_Klientas']}\"); return false;' title=''>šalinti</a>&nbsp;"
						. "<a href='index.php?module={$module}&id={$val['id_Klientas']}' title=''>redaguoti</a>"
					. "</td>"
				. "</tr>";
		}
	?>
</table>

<?php
	// įtraukiame puslapių šabloną
	include 'controls/paging.php';
?>