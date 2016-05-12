<?php

	include 'libraries/cities.class.php';
	$citiesObj = new cities();

	include 'libraries/theathers.class.php';
	$modelsObj = new theathers();
	
	$formErrors = null;
	$fields = array();
	
	// nustatome privalomus laukus
	$required = array('pavadinimas', 'fk_Miestasid_Miestas');

	// maksimalūs leidžiami laukų ilgiai
	$maxLengths = array (
		'pavadinimas' => 20
	);
	
	// paspaustas išsaugojimo mygtukas
	if(!empty($_POST['submit'])) {
		// nustatome laukų validatorių tipus
		$validations = array (
			'pavadinimas' => 'anything',
			'fk_marke' => 'positivenumber',
			'fk_Miestasid_Miestas' => 'alfanum');
		
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
				$modelsObj->updateModel($data);
			} else {
				// randame didžiausią modelio id duomenų bazėje
				$latestId = $modelsObj->getMaxIdOfModel();

				// įrašome naują įrašą
				$data['id'] = $latestId + 1;
				$modelsObj->insertModel($data);
			}
			
			// nukreipiame į modelių puslapį
			// header("Location: index.php?module={$module}");
			die();
		} else {
			// gauname klaidų pranešimą
			$formErrors = $validator->getErrorHTML();
			// gauname įvestus laukus
			$fields = $_POST;
		}
	} else {
		// tikriname, ar nurodytas elemento id. Jeigu taip, išrenkame elemento duomenis ir jais užpildome formos laukus.
		if(!empty($id)) {
			$fields = $modelsObj->getModel($id);
		}
	}
?>
<ul id="pagePath">
	<li><a href="index.php">Pradžia</a></li>
	<li><a href="index.php?module=<?php echo $module; ?>">Kino teatrai</a></li>
	<li><?php if(!empty($id)) echo "Kino teatro redagavimas"; else echo "Naujas kino teatras"; ?></li>
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
			<legend>Kino teatro informacija</legend>
			<p>
				<label class="field" for="name">Pavadinimas<?php echo in_array('pavadinimas', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="name" name="pavadinimas" class="textbox-150" value="<?php echo isset($fields['pavadinimas']) ? $fields['pavadinimas'] : ''; ?>">
				<?php if(key_exists('pavadinimas', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['pavadinimas']} simb.)</span>"; ?>
			</p>
			<p>
				<label class="field" for="adresas">Adresas<?php echo in_array('adresas', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="name" name="adresas" class="textbox-150" value="<?php echo isset($fields['adresas']) ? $fields['adresas'] : ''; ?>">
				<?php if(key_exists('adresas', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['adresas']} simb.)</span>"; ?>
			</p>
			<p>
				<label class="field" for="ikurimo_data">ikurimo data<?php echo in_array('ikurimo_data', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="ikurimo_data" name="ikurimo_data" class="datetime textbox-150" value="<?php echo isset($fields['ikurimo_data']) ? $fields['ikurimo_data'] : ''; ?>">
			</p>
			<p>
				<label class="field" for="darbo_valandos">Darbo valandos<?php echo in_array('darbo_valandos', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="darbo_valandos" name="darbo_valandos" class="textbox-150" value="<?php echo isset($fields['darbo_valandos']) ? $fields['darbo_valandos'] : ''; ?>">
				<?php if(key_exists('pavadinimas', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['pavadinimas']} simb.)</span>"; ?>
			</p>
			<p>
				<label class="field" for="fk_Miestasid_Miestas">Miestas<?php echo in_array('fk_Miestasid_Miestas', $required) ? '<span> *</span>' : ''; ?></label>
				<select id="fk_Miestasid_Miestas" name="fk_Miestasid_Miestas">
					<option value="">---------------</option>
					<?php
					// išrenkame aikšteles
					$data = $citiesObj->getServicesList();
					foreach($data as $key => $val) {
						$selected = "";
						if(isset($fields['fk_Miestasid_Miestas']) && $fields['fk_Miestasid_Miestas'] == $val['id_Miestas']) {
							$selected = " selected='selected'";
						}
						echo "<option{$selected} value='{$val['id_Miestas']}'>{$val['pavadinimas']}</option>";
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