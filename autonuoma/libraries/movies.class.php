<?php

/**
 * Klientų redagavimo klasė
 *
 * @author ISK
 */

class movies {
	
	public function __construct() {
		
	}
	
	/**
	 * Kliento išrinkimas
	 * @param type $id
	 * @return type
	 */
	public function getCustomer($id) {
		$query = "  SELECT *
					FROM `filmas`
					WHERE `id_Filmas`='{$id}'";
		$data = mysql::select($query);
		
		return $data[0];
	}
	
	/**
	 * Klientų sąrašo išrinkimas
	 * @param type $limit
	 * @param type $offset
	 * @return type
	 */
	public function getCustomersList($limit = null, $offset = null) {
		$limitOffsetString = "";
		if(isset($limit)) {
			$limitOffsetString .= " LIMIT {$limit}";
		}
		if(isset($offset)) {
			$limitOffsetString .= " OFFSET {$offset}";
		}
		
		$query = "  SELECT *
					FROM `filmas`" . $limitOffsetString;
		$data = mysql::select($query);
		
		return $data;
	}
	
	/**
	 * Klientų kiekio radimas
	 * @return type
	 */
	public function getCustomersListCount() {
		$query = "  SELECT COUNT(`id_Filmas`) as `kiekis`
					FROM `filmas`";
		$data = mysql::select($query);
		
		return $data[0]['kiekis'];
	}
	
	/**
	 * Kliento šalinimas
	 * @param type $id
	 */
	public function deleteCustomer($id) {
		$query = "  DELETE FROM `filmas`
					WHERE `id_Filmas`='{$id}'";
		mysql::query($query);
	}
	
	/**
	 * Kliento atnaujinimas
	 * @param type $data
	 */
	public function updateCustomer($data) {
		$query = "  UPDATE `filmas`
					SET    `pavadinimas`='{$data['pavadinimas']}',
						   `pagaminimo_data`='{$data['pagaminimo_data']}',
						   `reitingas`='{$data['reitingas']}',
						   `apdovanojimu_sk`='{$data['apdovanojimu_sk']}',
						   `pelnas`='{$data['pelnas']}'
					WHERE `id_Filmas`='{$data['id_Filmas']}'";
		mysql::query($query);
	}
	
	/**
	 * Kliento įrašymas
	 * @param type $data
	 */
	public function insertCustomer($data) {
		$id = $this->getMaxIdl();
		$id++;
		$query = "  INSERT INTO `filmas`
								(
									`id_Filmas`,
									`pavadinimas`,
									`pagaminimo_data`,
									`reitingas`,
									`apdovanojimu_sk`,
									`pelnas`
								) 
								VALUES
								(
									'{$id}',
									'{$data['pavadinimas']}',
									'{$data['pagaminimo_data']}',
									'{$data['reitingas']}',
									'{$data['apdovanojimu_sk']}',
									'{$data['pelnas']}'
								)";
		mysql::query($query);
	}
	
	/**
	 * Sutarčių, į kurias įtrauktas klientas, kiekio radimas
	 * @param type $id
	 * @return type
	 */
	public function getContractCountOfCustomer($id) {
		$query = "  SELECT COUNT(`seansas`.`id_Seansas`) AS `kiekis`
					FROM `seansas`
						INNER JOIN `filmas`
							ON `filmas`.`id_Filmas`=`seansas`.`fk_Filmasid_Filmas`
						INNER JOIN `filmas_apdovanojimas`
							ON `filmas`.`id_Filmas`=`filmas_apdovanojimas`.`fk_Filmasid_Filmas`
					WHERE `filmas`.`id_Filmas`='{$id}'";
		$data = mysql::select($query);
		
		return $data[0]['kiekis'];
	}

	public function getMaxIdl() {
		$query = "  SELECT MAX(`id_Filmas`) AS `latestId`
					FROM `filmas`";
		$data = mysql::select($query);

		return $data[0]['latestId'];
	}
	
}