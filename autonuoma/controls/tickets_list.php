<?php

	// sukuriame markių klasės objektą
	include 'libraries/tickets.class.php';
	$brandsObj = new tickets();
	
	// sukuriame puslapiavimo klasės objektą
	include 'utils/paging.class.php';
	$paging = new paging(NUMBER_OF_ROWS_IN_PAGE);
	
	if(!empty($removeId)) {
		// patikriname, ar šalinama markė nepriskirta modeliui
		$count = $brandsObj->getModelCountOfBrand($removeId);
		
		$removeErrorParameter = '';
		if($count == 0) {
			// šaliname markę
			$brandsObj->deleteBrand($removeId);
		} else {
			// nepašalinome, nes markė priskirta modeliui, rodome klaidos pranešimą
			$removeErrorParameter = '$remove_error=1';
		}

		// nukreipiame į markių puslapį
		header("Location: index.php?module={$module}{$removeErrorParameter}");
		die();
	}
?>
<ul id="pagePath">
	<li><a href="index.php">Pradžia</a></li>
	<li>Bilietai</li>
</ul>
<div id="actions">
	<a href='index.php?module=<?php echo $module; ?>&action=new'>Naujas bilietas</a>
</div>
<div class="float-clear"></div>

<?php if(isset($_GET['remove_error'])) { ?>
	<div class="errorBox">
		Markė nebuvo pašalinta. Pirmiausia pašalinkite markės modelius.
	</div>
<?php } ?>

<table>
	<tr>
		<th>ID</th>
		<th>Kiekis</th>
		<th>Klientas</th>
		<th>Filmo pavadinimas</th>
		<th>Kino teatras</th>
		<th>Pradzia</th>
		<th>Pabaiga</th>
	</tr>
	<?php
		// suskaičiuojame bendrą įrašų kiekį
		$elementCount = $brandsObj->getTicketsCount();

		// suformuojame sąrašo puslapius
		$paging->process($elementCount, $pageId);

		// išrenkame nurodyto puslapio markes
		$data = $brandsObj->getTicketsList($paging->size, $paging->first);

		// suformuojame lentelę
		foreach($data as $key => $val) {
			echo
				"<tr>"
					. "<td>{$val['id_Bilietas']}</td>"
					. "<td>{$val['kiekis']}</td>"
					. "<td>{$val['vardas']} {$val['pavarde']}</td>"
					. "<td>{$val['pavadinimas']}</td>"
					. "<td>{$val['kTeatras']}</td>"
					. "<td>{$val['pradzios_laikas']}</td>"
					. "<td>{$val['pabaigos_laikas']}</td>"
					. "<td>"
						. "<a href='#' onclick='showConfirmDialog(\"{$module}\", \"{$val['id_Bilietas']}\"); return false;' title=''>šalinti</a>&nbsp;"
						. "<a href='index.php?module={$module}&id={$val['id_Bilietas']}' title=''>redaguoti</a>"
					. "</td>"
				. "</tr>";
		}
	?>
</table>

<?php
	// įtraukiame puslapių šabloną
	include 'controls/paging.php';
?>