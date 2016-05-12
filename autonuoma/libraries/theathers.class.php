<?php

/**
 * Automobilių modelių redagavimo klasė
 *
 * @author ISK
 */

class theathers {
	
	public function __construct() {
		
	}
	
	/**
	 * Modelio išrinkimas
	 * @param type $id
	 * @return type
	 */
	public function getModel($id) {
		$query = "  SELECT *
					FROM `kino_teatras`
					WHERE `id_Kino_teatras`='{$id}'";
		$data = mysql::select($query);
		
		return $data[0];
	}
	
	/**
	 * Modelių sąrašo išrinkimas
	 * @param type $limit
	 * @param type $offset
	 * @return type
	 */
	public function getModelList($limit = null, $offset = null) {
		$limitOffsetString = "";
		if(isset($limit)) {
			$limitOffsetString .= " LIMIT {$limit}";
		}
		if(isset($offset)) {
			$limitOffsetString .= " OFFSET {$offset}";
		}
		
		$query = "  SELECT `kino_teatras`.`id_Kino_teatras`, `kino_teatras`.`pavadinimas` as `kTeatras`,
						   `kino_teatras`.`adresas`,
						    `kino_teatras`.`ikurimo_data`, `kino_teatras`.`darbo_valandos`,
						    `miestas`.`pavadinimas` as `miestas`
					FROM `kino_teatras`
						LEFT JOIN `miestas`
							ON `kino_teatras`.`fk_Miestasid_Miestas`=`miestas`.`id_Miestas`" . $limitOffsetString;
		$data = mysql::select($query);
		
		return $data;
	}

	/**
	 * Modelių kiekio radimas
	 * @return type
	 */
	public function getModelListCount() {
		$query = "  SELECT COUNT(`kino_teatras`.`id_Kino_teatras`) as `kiekis`
					FROM `kino_teatras`";
		$data = mysql::select($query);
		
		return $data[0]['kiekis'];
	}
	
	/**
	 * Modelių išrinkimas pagal markę
	 * @param type $brandId
	 * @return type
	 */
	public function getModelListByBrand($brandId) {
		$query = "  SELECT *
					FROM `modeliai`
					WHERE `fk_marke`='{$brandId}'";
		$data = mysql::select($query);
		
		return $data;
	}
	
	/**
	 * Modelio atnaujinimas
	 * @param type $data
	 */
	public function updateModel($data) {
		$query = "  UPDATE `kino_teatras`
					SET    `pavadinimas`='{$data['pavadinimas']}',
						   `adresas`='{$data['adresas']}',
						   `ikurimo_data`='{$data['ikurimo_data']}',
						   `darbo_valandos`='{$data['darbo_valandos']}',
						   `fk_Miestasid_Miestas`='{$data['fk_Miestasid_Miestas']}'
					WHERE `id_Kino_teatras`='{$data['id']}'";
		mysql::query($query);
	}
	
	/**
	 * Modelio įrašymas
	 * @param type $data
	 */
	public function insertModel($data) {
		$id = $this->getMaxIdOfModel();
		$id++;
		$query = "  INSERT INTO `kino_teatras`
								(
									`id_Kino_teatras`,
									`pavadinimas`,
									`adresas`,
									`ikurimo_data`,
									`darbo_valandos`,
									`fk_Miestasid_Miestas`
								)
								VALUES
								(
									'{$id}',
									'{$data['pavadinimas']}',
									'{$data['adresas']}',
									'{$data['ikurimo_data']}',
									'{$data['darbo_valandos']}',
									'{$data['fk_Miestasid_Miestas']}'
								)";
		mysql::query($query);
	}
	
	/**
	 * Modelio šalinimas
	 * @param type $id
	 */
	public function deleteModel($id) {
		$query = "  DELETE FROM `kino_teatras`
					WHERE `id_Kino_teatras`='{$id}'";
		mysql::query($query);
	}
	
	/**
	 * Nurodyto modelio automobilių kiekio radimas
	 * @param type $id
	 * @return type
	 */
	public function getCarCountOfModel($id) {
		$query = "  SELECT COUNT(`seansas`.`id_Seansas`) AS `kiekis`
					FROM `kino_teatras`
						INNER JOIN `seansas`
							ON `kino_teatras`.`id_Kino_teatras`=`seansas`.`fk_Kino_teatrasid_Kino_teatras`
					WHERE `kino_teatras`.`id_Kino_teatras`='{$id}'";
		$data = mysql::select($query);
		
		return $data[0]['kiekis'];
	}
	
	/**
	 * Didžiausios modelio id reikšmės radimas
	 * @return type
	 */
	public function getMaxIdOfModel() {
		$query = "  SELECT MAX(`id_Kino_teatras`) AS `latestId`
					FROM `kino_teatras`";
		$data = mysql::select($query);
		
		return $data[0]['latestId'];
	}
	
}