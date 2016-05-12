<?php
	
	include 'libraries/countries.class.php';
	$servicesObj = new countries();

	include 'libraries/cities.class.php';
	$contractsObj = new cities();
	
	$formErrors = null;
	$fields = array();
	
	// nustatome privalomus laukus
	$required = array('pavadinimas', 'gyventoju_sk', 'ikurimo_data', 'fk_Valstybeid_Valstybe');
	
	// maksimalūs leidžiami laukų ilgiai
	$maxLengths = array (
		'pavadinimas' => 40,
		'aprasymas' => 300
	);
	
	// paspaustas išsaugojimo mygtukas
	if(!empty($_POST['submit'])) {
		// nustatome laukų validatorių tipus
		$validations = array (
			'pavadinimas' => 'anything',
			'gyventoju_sk' => 'alfanum',
			'ikurimo_data' => 'anything',
			'fk_Valstybeid_Valstybe' => 'alfanum');
		
		// sukuriame validatoriaus objektą
		include 'utils/validator.class.php';
		$validator = new validator($validations, $required, $maxLengths);
		
		// laukai įvesti be klaidų
		if($validator->validate($_POST)) {
			// suformuojame laukų reikšmių masyvą SQL užklausai
			$data = $validator->preparePostFieldsForSQL();
			if($_GET['id']!=null) {
				// atnaujiname duomenis
				$data['id']=$_GET['id'];
				$contractsObj->updateService($data);
				
				// pašaliname paslaugos kainas, kurios nėra naudojamos sutartyse
				$deleteQueryClause = "";
				foreach($data['kainos'] as $key=>$val) {
					if($data['neaktyvus'][$key] == 1) {
						$deleteQueryClause .= " AND NOT `galioja_nuo`='" . $data['datos'][$key] . "'";
					}
				}
				$contractsObj->deleteServicePrices($data['id'], $deleteQueryClause);
				
				// atnaujiname paslaugos kainas, kurios nėra naudojamos sutartyse
				$contractsObj->insertServicePrices($data);
			} else {
				// randame didžiausią paslaugos numeri duomenų bazėje
				$latestId = $servicesObj->getMaxIdOfService();
				
				// įrašome naują įrašą
				$data['id'] = $latestId + 1;
				$contractsObj->insertService($data);

				// įrašome paslaugų kainas
				$contractsObj->insertServicePrices($data);
			}
			
			// nukreipiame į modelių puslapį
			 header("Location: index.php?module={$module}");
			die();
		} else {
			// gauname klaidų pranešimą
			$formErrors = $validator->getErrorHTML();
			// gauname įvestus laukus
			$fields = $_POST;
			if(isset($_POST['kainos']) && sizeof($_POST['kainos']) > 0) {
				$i = 0;
				foreach($_POST['kainos'] as $key => $val) {
					$fields['paslaugos_kainos'][$i]['kaina'] = $val;
					$fields['paslaugos_kainos'][$i]['galioja_nuo'] = $_POST['datos'][$key];
					$fields['paslaugos_kainos'][$i]['neaktyvus'] = $_POST['neaktyvus'][$key];
					$i++;
				}
			}
		}
	} else {
		// tikriname, ar nurodytas elemento id. Jeigu taip, išrenkame elemento duomenis ir jais užpildome formos laukus.
		if(!empty($id)) {
			$fields = $contractsObj->getService($id);
			if(sizeof($tmp) > 0) {
				foreach($tmp as $key => $val) {
					// jeigu paslaugos kaina yra naudojama, jos koreguoti neleidziame ir įvedimo laukelį padarome neaktyvų
					$priceCount = $contractsObj->getPricesCountOfOrderedServices($id, $val['galioja_nuo']);
					if($priceCount > 0) {
						$val['neaktyvus'] = 1;
					}
					$fields['paslaugos_kainos'][] = $val;
				}
			}
		}
	}
?>
<ul id="pagePath">
	<li><a href="index.php">Pradžia</a></li>
	<li><a href="index.php?module=<?php echo $module; ?>">Miestai</a></li>
	<li><?php if(!empty($id)) echo "Miesto redagavimas"; else echo "Naujas miestas"; ?></li>
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
			<legend>Miesto informacija</legend>
			<p>
				<label class="field" for="pavadinimas">Pavadinimas<?php echo in_array('pavadinimas', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="pavadinimas" name="pavadinimas" class="textbox-150" value="<?php echo isset($fields['pavadinimas']) ? $fields['pavadinimas'] : ''; ?>">
				<?php if(key_exists('pavadinimas', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['pavadinimas']} simb.)</span>"; ?>
			</p>
			<p>
				<label class="field" for="gyventoju_sk">Gyventoju skaicius<?php echo in_array('gyventoju_sk', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="number" id="gyventoju_sk" name="gyventoju_sk" class="textbox-150" value="<?php echo isset($fields['gyventoju_sk']) ? $fields['gyventoju_sk'] : ''; ?>" />
			</p>
			<p>
				<label class="field" for="ikurimo_data">Ikurimo data<?php echo in_array('ikurimo_data', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="ikurimo_data" name="ikurimo_data" class="textbox-70 date" value="<?php echo isset($fields['ikurimo_data']) ? $fields['ikurimo_data'] : ''; ?>" />
			</p>
			<p>
				<label class="field" for="fk_Valstybeid_Valstybe">Valstybe<?php echo in_array('fk_Valstybeid_Valstybe', $required) ? '<span> *</span>' : ''; ?></label>
				<select id="fk_Valstybeid_Valstybe" name="fk_Valstybeid_Valstybe">
					<option value="">---------------</option>
					<?php
					// išrenkame aikšteles
					$data = $servicesObj->getServicesList();
					foreach($data as $key => $val) {
						$selected = "";
						if(isset($fields['fk_Valstybeid_Valstybe']) && $fields['fk_Valstybeid_Valstybe'] == $val['id_Valstybe']) {
							$selected = " selected='selected'";
						}
						echo "<option{$selected} value='{$val['id_Valstybe']}'>{$val['pavadinimas']}</option>";
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