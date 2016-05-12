<?php
	
	include 'libraries/movies.class.php';
	$customersObj = new movies();

	$formErrors = null;
	$fields = array();
	
	// nustatome privalomus formos laukus
	$required = array('asmens_kodas', 'vardas', 'pavarde', 'gimimo_data', 'telefonas');
	
	// maksimalūs leidžiami laukų ilgiai
	$maxLengths = array (
		'asmens_kodas' => 11,
		'vardas' => 20,
		'pavarde' => 20
	);
	
	// vartotojas paspaudė išsaugojimo mygtuką
	if(!empty($_POST['submit'])) {
		include 'utils/validator.class.php';
		
		// nustatome laukų validatorių tipus
		$validations = array (
			'asmens_kodas' => 'positivenumber',
			'vardas' => 'alfanum',
			'pavarde' => 'alfanum',
			'gimimo_data' => 'date',
			'telefonas' => 'phone',
			'epastas' => 'email'
		);
		
		// sukuriame laukų validatoriaus objektą
		$validator = new validator($validations, $required, $maxLengths);

		// laukai įvesti be klaidų
		if($validator->validate($_POST)) {
			// suformuojame laukų reikšmių masyvą SQL užklausai
			$data = $validator->preparePostFieldsForSQL();

			if(isset($data['editing'])) {
				// redaguojame klientą
				$data['id_Filmas'] = $_GET['id'];
				$customersObj->updateCustomer($data);
			} else {
				// įrašome naują klientą
				$customersObj->insertCustomer($data);
			}

			// nukreipiame vartotoją į klientų puslapį
			header("Location: index.php?module={$module}");
			die();
		}
		else {
			// gauname klaidų pranešimą
			$formErrors = $validator->getErrorHTML();
			// laukų reikšmių kintamajam priskiriame įvestų laukų reikšmes
			$fields = $_POST;
		}
	} else {
		// tikriname, ar nurodytas elemento id. Jeigu taip, išrenkame elemento duomenis ir jais užpildome formos laukus.
		if(!empty($id)) {
			// išrenkame klientą
			$fields = $customersObj->getCustomer($id);
			$fields['editing'] = 1;
		}
	}
?>
<ul id="pagePath">
	<li><a href="index.php">Pradžia</a></li>
	<li><a href="index.php?module=<?php echo $module; ?>">Filmai</a></li>
	<li><?php if(!empty($id)) echo "Kliento redagavimas"; else echo "Naujas filmas"; ?></li>
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
			<legend>Kliento informacija</legend>
				<p>
					<?php if(!isset($fields['editing'])) { ?>
					<?php } else { ?>
						<input type="hidden" name="editing" value="1" />
					<?php } ?>
				</p>
			<p>
				<label class="field" for="pavadinimas">Pavadinimas<?php echo in_array('pavadinimas', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="vardas" name="pavadinimas" class="textbox-150" value="<?php echo isset($fields['pavadinimas']) ? $fields['pavadinimas'] : ''; ?>" />
				<?php if(key_exists('pavadinimas', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['pavadinimas']} simb.)</span>"; ?>
			</p>
			<p>
				<label class="field" for="pagaminimo_data">Isleidimo data<?php echo in_array('pagaminimo_data', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="pagaminimo_data" name="pagaminimo_data" class="textbox-70 date" value="<?php echo isset($fields['pagaminimo_data']) ? $fields['pagaminimo_data'] : ''; ?>" />
			</p>
			<p>
				<label class="field" for="reitingas"> Reitingas <?php echo in_array('reitingas', $required) ? '<span> *</span>' : ''; ?></label>
				<select id="reitingas" name="reitingas">
					<?php for($i=1; $i<11; $i++) {
						if(isset($fields['fk_Seansasid_Seansas']) && $fields['fk_Seansasid_Seansas'] == $val['id_Seansas'])
						?>

						<option <?php if(isset($fields['reitingas']) && $fields['reitingas'] == $i) { echo "selected=selected"; } ?> value=<?php echo $i ?>> <?php echo $i ?> </option>
					<?php } ?>
				</select>
			</p>
			<p>
				<label class="field" for="apdovanojimu_sk"> Apdovanojimu skaicius <?php echo in_array('apdovanojimu_sk', $required) ? '<span> *</span>' : ''; ?></label>
				<select id="apdovanojimu_sk" name="apdovanojimu_sk">
					<?php for($i=1; $i<11; $i++) {?>

						<option <?php if(isset($fields['apdovanojimu_sk']) && $fields['apdovanojimu_sk'] == $i) { echo "selected=selected"; } ?> value=<?php echo $i ?>> <?php echo $i ?> </option>
					<?php } ?>
				</select>
			</p>
			<p>
				<label class="field" for="pelnas">Pelnas<?php echo in_array('pelnas', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="number" id="pelnas" name="pelnas" class="textbox-150" value="<?php echo isset($fields['pelnas']) ? $fields['pelnas'] : ''; ?>" />
			</p>
		</fieldset>
		<p class="required-note">* pažymėtus laukus užpildyti privaloma</p>
		<p>
			<input type="submit" class="submit" name="submit" value="Išsaugoti">
		</p>
	</form>
</div>