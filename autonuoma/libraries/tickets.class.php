<?php

/**
 * Automobilių markių redagavimo klasė
 *
 * @author ISK
 */

class tickets {

	public function __construct() {
		
	}
	
	/**
	 * Markės išrinkimas
	 * @param type $id
	 * @return type
	 */
	public function getTicket($id) {
		$query = "  SELECT *
					FROM `bilietas`
					WHERE `id_Bilietas`='{$id}'";
		$data = mysql::select($query);
		
		return $data[0];
	}
	
	/**
	 * Markių sąrašo išrinkimas
	 * @param type $limit
	 * @param type $offset
	 * @return type
	 */
	public function getTicketsList($limit = null, $offset = null) {
		$limitOffsetString = "";
		if(isset($limit)) {
			$limitOffsetString .= " LIMIT {$limit}";
		}
		if(isset($offset)) {
			$limitOffsetString .= " OFFSET {$offset}";
		}
		
		$query = "SELECT `id_Bilietas`, `kiekis`, `vardas`,`pavarde`,`filmas`.`pavadinimas`, `kino_teatras`.`pavadinimas` as `kTeatras`, `pradzios_laikas`, `pabaigos_laikas` FROM `bilietas` 
  LEFT JOIN `seansas` ON `seansas`.`id_Seansas`=`bilietas`.`fk_Seansasid_Seansas` 
  LEFT JOIN `kino_teatras` ON `seansas`.`fk_Kino_teatrasid_Kino_teatras`=`kino_teatras`.`id_Kino_teatras`
  LEFT JOIN `klientas` ON `bilietas`.`fk_Klientasid_Klientas`=`klientas`.`id_Klientas`
  LEFT JOIN `filmas` ON `seansas`.`fk_Filmasid_Filmas`=`filmas`.`id_Filmas`
  " . $limitOffsetString;
		$data = mysql::select($query);
		
		return $data;
	}

	/**
	 * Markių kiekio radimas
	 * @return type
	 */
	public function getTicketsCount() {
		$query = "  SELECT COUNT(`id_Bilietas`) as `kiekis`
					FROM `bilietas`";
		$data = mysql::select($query);
		
		return $data[0]['kiekis'];
	}

	public function getLastInserted()
	{
		$query = "SELECT * FROM `bilietas`
		ORDER BY `id_Bilietas` DESC LIMIT 1";

		$data = mysql::select($query);

		return $data[0]['id_Bilietas'];
	}
	
	/**
	 * Markės įrašymas
	 * @param type $data
	 */
	public function insertTicket($data) {
		$index = $this->getLastInserted();
		$index++;
		$query = "  INSERT INTO `bilietas`
								(
									`id_Bilietas`,
									`kiekis`,
									`fk_Seansasid_Seansas`,
									`fk_Klientasid_Klientas`
								)
								VALUES
								(
									'{$index}',
									'{$data['kiekis']}',
									'{$data['fk_Seansasid_Seansas']}',
									'{$data['fk_Klientasid_Klientas']}'
								)";
		mysql::query($query);
	}
	
	/**
	 * Markės atnaujinimas
	 * @param type $data
	 */
	public function updateBrand($data) {
		$query = "  UPDATE `bilietas`
					SET    `kiekis`='{$data['kiekis']}',
							`fk_Seansasid_Seansas` = '{$data['fk_Seansasid_Seansas']}',
							`fk_Klientasid_Klientas` = '{$data['fk_Klientasid_Klientas']}'
					WHERE `id_Bilietas`='{$data['id_Bilietas']}'";
		mysql::query($query);
	}
	
	/**
	 * Markės šalinimas
	 * @param type $id
	 */
	public function deleteBrand($id) {
		$query = "  DELETE FROM `bilietas`
					WHERE `id_Bilietas`='{$id}'";
		mysql::query($query);
	}
	
	/**
	 * Markės modelių kiekio radimas
	 * @param type $id
	 * @return type
	 */
	public function getModelCountOfBrand($id) {
		$query = "  SELECT COUNT(`modeliai`.`id`) AS `kiekis`
					FROM `markes`
						INNER JOIN `modeliai`
							ON `markes`.`id`=`modeliai`.`fk_marke`
					WHERE `markes`.`id`='{$id}'";
		$data = mysql::select($query);
		
		return $data[0]['kiekis'];
	}
	
	/**
	 * Didžiausiausios markės id reikšmės radimas
	 * @return type
	 */
	public function getMaxIdOfBrand() {
		$query = "  SELECT MAX(`id`) AS `latestId`
					FROM `markes`";
		$data = mysql::select($query);
		
		return $data[0]['latestId'];
	}
	
}