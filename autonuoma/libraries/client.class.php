<?php

/**
 * Darbuotojų redagavimo klasė
 *
 * @author ISK
 */

class client {
	
	public function __construct() {
		
	}
	
	/**
	 * Darbuotojo išrinkimas
	 * @param type $id
	 * @return type
	 */
	public function getEmployee($id) {
		$query = "  SELECT *
					FROM `klientas`
					WHERE `id_Klientas`='{$id}'";
		$data = mysql::select($query);
		
		return $data[0];
	}
	
	/**
	 * Darbuotojų sąrašo išrinkimas
	 * @param type $limit
	 * @param type $offset
	 * @return type
	 */
	public function getEmplyeesList($limit = null, $offset = null) {
		$limitOffsetString = "";
		if(isset($limit)) {
			$limitOffsetString .= " LIMIT {$limit}";
		}
		if(isset($offset)) {
			$limitOffsetString .= " OFFSET {$offset}";
		}
		
		$query = "  SELECT *
					FROM `klientas`" . $limitOffsetString;
		$data = mysql::select($query);
		
		return $data;
	}
	
	/**
	 * Darbuotojų kiekio radimas
	 * @return type
	 */
	public function getEmplyeesListCount() {
		$query = "  SELECT COUNT(`id_Klientas`) as `kiekis`
					FROM `klientas`";
		$data = mysql::select($query);
		
		return $data[0]['kiekis'];
	}
	
	/**
	 * Darbuotojo šalinimas
	 * @param type $id
	 */
	public function deleteEmployee($id) {
		$query = "DELETE FROM `klientas`
					WHERE `id_Klientas`='{$id}'";
		mysql::query($query);
	}
	
	/**
	 * Darbuotojo atnaujinimas
	 * @param type $data
	 */
	public function updateEmployee($data) {
		$query = "  UPDATE `klientas`
					SET    `vardas`='{$data['vardas']}',
						   `pavarde`='{$data['pavarde']}',
						   `telefonas` = '{$data['telefonas']}',
						   `e_pastas` = '{$data['e_pastas']}',
						   `gimimo_data` = '{$data['gimimo_data']}',
						   `lytis`='{$data['lytis']}',
						   `tautybe`='{$data['tautybe']}'
					WHERE `id_Klientas`='{$data['id_Klientas']}'";
		mysql::query($query);
	}
	
	/**
	 * Darbuotojo įrašymas
	 * @param type $data
	 */
	public function insertEmployee($data) {
		$count = $this->getEmplyeesListCount();
		$count++;
		$query = "  INSERT INTO `klientas`
								(
									`id_Klientas`,
									`vardas`,
									`pavarde`,
									`telefonas`,
									`asmens_kodas`,
									`e_pastas`,
									`gimimo_data`,
									`lytis`,
									`tautybe`
								) 
								VALUES
								(
								    '{$count}',
									'{$data['vardas']}',
									'{$data['pavarde']}',
									'{$data['telefonas']}',
									'{$data['asmens_kodas']}',
								    '{$data['e_pastas']}',
								    '{$data['gimimo_data']}',
								    '{$data['lytis']}',
									'{$data['tautybe']}'
								)";
		mysql::query($query);
	}
	
	/**
	 * Sutarčių, į kurias įtrauktas klientas, kiekio radimas
	 * @param type $id
	 * @return type
	 */
	public function getContractCountOfEmployee($id) {
		$query = "  SELECT COUNT(`bilietas`.`id_Bilietas`) AS `kiekis`
					FROM `bilietas`
						INNER JOIN `klientas`
							ON `klientas`.`id_Klientas`=`bilietas`.`fk_Klientasid_Klientas`
					WHERE `klientas`.`id_Klientas`='{$id}'";
		$data = mysql::select($query);
		
		return $data[0]['kiekis'];
	}
	
}