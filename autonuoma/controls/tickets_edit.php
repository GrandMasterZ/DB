<?php

	include 'libraries/tickets.class.php';
	$ticketsObj = new tickets();
	include 'libraries/client.class.php';
	$clientObj = new client();
	include 'libraries/show.class.php';
	$showObj = new show();

	$formErrors = null;
	$fields = array('kiekis','fk_Klientasid_Klientas', 'fk_Seansasid_Seansas');
	
	// nustatome privalomus laukus
	$required = array('kiekis','fk_Seansasid_Seansas','fk_Klientasid_Klientas');

	// maksimalūs leidžiami laukų ilgiai
	$maxLengths = array (
		'pavadinimas' => 20
	);
	
	// paspaustas išsaugojimo mygtukas
	if(!empty($_POST['submit'])) {
		// nustatome laukų validatorių tipus
		$validations = array (
			'kiekis' => 'alfanum',
			'fk_Klientasid_Klientas' => 'alfanum',
			'fk_Seansasid_Seansas' => 'alfanum'
		);
		
		// sukuriame validatoriaus objektą
		include 'utils/validator.class.php';
		$validator = new validator($validations, $required, $maxLengths);

		if($validator->validate($_POST)) {
			// suformuojame laukų reikšmių masyvą SQL užklausai
			$data = $validator->preparePostFieldsForSQL();
			var_dump($_GET['id']);
			$data['id_Bilietas']=$_GET['id'];
			if($_GET['id']!=null) {
				// atnaujiname duomenis
				$ticketsObj->updateBrand($data);
			} else {
				// randame didžiausią markės id duomenų bazėje
				$ticketsObj->insertTicket($data);
			}
			
			// nukreipiame į markių puslapį
			header("Location: index.php?module={$module}");
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
			$fields = $ticketsObj->getTicket($id);
			$data['id']=$id;
		}
	}
?>
<ul id="pagePath">
	<li><a href="index.php">Pradžia</a></li>
	<li><a href="index.php?module=<?php echo $module; ?>">Bilietai</a></li>
	<li><?php if(!empty($id)) echo "Markės redagavimas"; else echo "Naujas bilietas"; ?></li>
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

			<legend>Bilieto informacija</legend>
			<p>
			<label class="field" for="kiekis"> Kiekis <?php echo in_array('kiekis', $required) ? '<span> *</span>' : ''; ?></label>
			<select id="kiekis" name="kiekis">
				<?php for($i=1; $i<13; $i++) {?>

				<option value=<?php echo $i ?>> <?php echo $i ?> </option>
				<?php } ?>
			</select>
			</p>
			<p>
			<label class="field" for="fk_Klientasid_Klientas">Klientas<?php echo in_array('fk_Klientasid_Klientas', $required) ? '<span> *</span>' : ''; ?></label>
			<select id="fk_Klientasid_Klientas" name="fk_Klientasid_Klientas">
				<option value="">---------------</option>
				<?php
				// išrenkame aikšteles
				$data = $clientObj->getEmplyeesList();
				foreach($data as $key => $val) {
					$selected = "";
					if(isset($fields['fk_Klientasid_Klientas']) && $fields['fk_Klientasid_Klientas'] == $val['id_Klientas']) {
						$selected = " selected='selected'";
					}
					echo "<option{$selected} value='{$val['id_Klientas']}'>{$val['vardas']} {$val['pavarde']}</option>";
				}
				?>
			</select>
			</p>
			<p>
				<label class="field" for="fk_Seansasid_Seansas">Seansas<?php echo in_array('fk_Seansasid_Seansas', $required) ? '<span> *</span>' : ''; ?></label>
				<select id="fk_Seansasid_Seansas" name="fk_Seansasid_Seansas">
					<option value="">---------------</option>
					<?php
					// išrenkame aikšteles
					$data = $showObj->getShowList();
					foreach($data as $key => $val) {
						$selected = "";
						if(isset($fields['fk_Seansasid_Seansas']) && $fields['fk_Seansasid_Seansas'] == $val['id_Seansas']) {
							$selected = " selected='selected'";
						}
						echo "<option{$selected} value='{$val['id_Seansas']}'>{$val['pavadinimas']} {$val['kTeatras']} {$val['pradzios_laikas']}</option>";
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