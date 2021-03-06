<?php
	
	include 'libraries/client.class.php';
	$clientObj = new client();

	$formErrors = null;
	$fields = array();
	
	// nustatome privalomus formos laukus
	$required = array('asmens_kodas', 'telefonas', 'vardas', 'pavarde', 'e_pastas', 'gimimo_data','lytis','tautybe');
	
	// maksimalūs leidžiami laukų ilgiai
	$maxLengths = array (
		'asmens_kodas' => 11,
		'telefonas' => 9,
		'vardas' => 20,
		'pavarde' => 20,
		'e_pastas' => 80,
		'lytis' => 1
	);
	// vartotojas paspaudė išsaugojimo mygtuką
	if(!empty($_POST['submit'])) {
		include 'utils/validator.class.php';
		
		// nustatome laukų validatorių tipus
		$validations = array (
			'tabelio_nr' => 'alfanum',
			'vardas' => 'alfanum',
			'pavarde' => 'alfanum',
			'gimimo_data' => 'datetime',
			'asmens_kodas' => 'alfanum',
			'telefonas' => 'alfanum',
			'tautybe' => 'alfanum',
			'lytis' => 'alfanum',
			'e_pastas' => 'alfanum');
		
		// sukuriame laukų validatoriaus objektą
		$validator = new validator($validations, $required, $maxLengths);
		// laukai įvesti be klaidų
		if($validator->validate($_POST)) {
			// suformuojame laukų reikšmių masyvą SQL užklausai
			$data = $validator->preparePostFieldsForSQL();
			var_dump($data['editing']);
			if(isset($data['editing'])) {
				// redaguojame klientą
				$clientObj->updateEmployee($data);
			} else {
				// įrašome naują klientą
				$clientObj->insertEmployee($data);
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
			$fields = $clientObj->getEmployee($id);
			$fields['editing'] = 1;
		}
	}
?>
<ul id="pagePath">
	<li><a href="index.php">Pradžia</a></li>
	<li><a href="index.php?module=<?php echo $module; ?>">Klientai</a></li>
	<li><?php if(!empty($id)) echo "Darbuotojo redagavimas"; else echo "Naujas klientas"; ?></li>
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
			<?php if(isset($fields['editing'])) { ?>
				<input type="hidden" name="editing" value="1" />
				<input type="hidden" id="id_Klientas" name="id_Klientas" class="textbox-150" value="<?php echo isset($fields['id_Klientas']) ? $fields['id_Klientas'] : ''; ?>" />
			<?php } ?>
			<p>
				<label class="field" for="vardas">Vardas<?php echo in_array('vardas', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="vardas" name="vardas" class="textbox-150" value="<?php echo isset($fields['vardas']) ? $fields['vardas'] : ''; ?>" />
				<?php if(key_exists('vardas', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['vardas']} simb.)</span>"; ?>
			</p>
			<p>
				<label class="field" for="pavarde">Pavardė<?php echo in_array('pavarde', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="pavarde" name="pavarde" class="textbox-150" value="<?php echo isset($fields['pavarde']) ? $fields['pavarde'] : ''; ?>" />
				<?php if(key_exists('pavarde', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['pavarde']} simb.)</span>"; ?>
			</p>
			<p>
				<label class="field" for="telefonas">telefonas<?php echo in_array('telefonas', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="telefonas" name="telefonas" class="textbox-150" value="<?php echo isset($fields['telefonas']) ? $fields['telefonas'] : ''; ?>" />
				<?php if(key_exists('telefonas', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['telefonas']} simb.)</span>"; ?>
			</p>
			<p>
				<label class="field" for="e_pastas">e_pastas<?php echo in_array('e_pastas', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="e_pastas" name="e_pastas" class="textbox-150" value="<?php echo isset($fields['e_pastas']) ? $fields['e_pastas'] : ''; ?>" />
				<?php if(key_exists('e_pastas', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['e_pastas']} simb.)</span>"; ?>
			</p>
			<p>
				<label class="field" for="asmens_kodas">asmens kodas<?php echo in_array('asmens_kodas', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="asmens_kodas" name="asmens_kodas" class="textbox-150" value="<?php echo isset($fields['asmens_kodas']) ? $fields['asmens_kodas'] : ''; ?>" />
				<?php if(key_exists('asmens_kodas', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['asmens_kodas']} simb.)</span>"; ?>
			</p>
			<p>
				<label class="field" for="gimimo_data">gimimo data<?php echo in_array('gimimo_data', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="gimimo_data" name="gimimo_data" class="datetime textbox-150" value="<?php echo isset($fields['gimimo_data']) ? $fields['gimimo_data'] : ''; ?>">
			</p>
			<p>
				<label class="field" for="lytis">lytis<?php echo in_array('lytis', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="lytis" name="lytis" class="textbox-150" value="<?php echo isset($fields['lytis']) ? $fields['lytis'] : ''; ?>" />
				<?php if(key_exists('lytis', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['lytis']} simb.)</span>"; ?>
			</p>
			<p>
				<label class="field" for="lytis">tautybe<?php echo in_array('tautybe', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="tautybe" name="tautybe" class="textbox-150" value="<?php echo isset($fields['tautybe']) ? $fields['tautybe'] : ''; ?>" />
				<?php if(key_exists('tautybe', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['tautybe']} simb.)</span>"; ?>
			</p>
		</fieldset>
		<p class="required-note">* pažymėtus laukus užpildyti privaloma</p>
		<p>
			<input type="submit" class="submit" name="submit" value="Išsaugoti">
		</p>
	</form>
</div>