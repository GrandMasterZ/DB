<?php

/**
 * Papildomų paslaugų redagavimo klasė
 *
 * @author ISK
 */

class cities {
	
	public function __construct() {
		
	}
	
	/**
	 * Paslaugų sąrašo išrinkimas
	 * @param type $limit
	 * @param type $offset
	 * @return type
	 */
	public function getServicesList($limit = null, $offset = null) {
		$limitOffsetString = "";
		if(isset($limit)) {
			$limitOffsetString .= " LIMIT {$limit}";
		}
		if(isset($offset)) {
			$limitOffsetString .= " OFFSET {$offset}";
		}
		
		$query = "  SELECT `id_Miestas`, `miestas`.`pavadinimas`,`miestas`.`gyventoju_sk`, `miestas`.`ikurimo_data` as `data`, `valstybe`.`pavadinimas` as `valstybe`
					FROM `miestas` LEFT JOIN `valstybe` ON `miestas`.`fk_Valstybeid_Valstybe`=`valstybe`.`id_Valstybe`" . $limitOffsetString;
		$data = mysql::select($query);
		
		return $data;
	}
	
	/**
	 * Paslaugų kiekio radimas
	 * @return type
	 */
	public function getServicesListCount() {
		$query = "  SELECT COUNT(*) as `kiekis`
					FROM `miestas`";
		$data = mysql::select($query);
		
		return $data[0]['kiekis'];
	}
	
	/**
	 * Paslaugos kainų sąrašo radimas
	 * @param type $serviceId
	 * @return type
	 */
	public function getServicePrices($serviceId) {
		$query = "  SELECT *
					FROM `paslaugu_kainos`
					WHERE `fk_paslauga`='{$serviceId}'";
		$data = mysql::select($query);
		
		return $data;
	}
	
	/**
	 * Sutarčių, į kurias įtraukta paslauga, kiekio radimas
	 * @param type $serviceId
	 * @return type
	 */
	public function getContractCountOfService($serviceId) {
		$query = "  SELECT COUNT(`miestas`.`id_Miestas`) AS `kiekis`
					FROM `miestas`
						INNER JOIN `kino_teatras`
							ON `miestas`.`id_Miestas`=`kino_teatras`.`fk_Miestasid_Miestas`
					WHERE `miestas`.`id_Miestas`='{$serviceId}'";
		$data = mysql::select($query);
		
		return $data[0]['kiekis'];
	}
	
	/**
	 * Paslaugos išrinkimas
	 * @param type $id
	 * @return type
	 */
	public function getService($id) {
		$query = "  SELECT *
					FROM `miestas`
					WHERE `id_Miestas`='{$id}'";
		$data = mysql::select($query);
		
		return $data[0];
	}
	
	/**
	 * Paslaugos įrašymas
	 * @param type $data
	 */
	public function insertService($data) {
		$id=$this->getMaxIdOfService();
		$id++;
		$query = "  INSERT INTO `miestas`
								(
									`id_Miestas`,
									`pavadinimas`,
									`gyventoju_sk`,
									`ikurimo_data`,
									`fk_Valstybeid_Valstybe`
								)
								VALUES
								(
									'{$id}',
									'{$data['pavadinimas']}',
									'{$data['gyventoju_sk']}',
									'{$data['ikurimo_data']}',
									'{$data['fk_Valstybeid_Valstybe']}'
								)";
		mysql::query($query);
	}
	
	/**
	 * Paslaugos atnaujinimas
	 * @param type $data
	 */
	public function updateService($data) {
		$query = "  UPDATE `miestas`
					SET    `pavadinimas`='{$data['pavadinimas']}',
						   `gyventoju_sk`='{$data['gyventoju_sk']}',
						   `ikurimo_data`='{$data['ikurimo_data']}',
						   `fk_Valstybeid_Valstybe`='{$data['fk_Valstybeid_Valstybe']}'
					WHERE `id_Miestas`='{$data['id']}'";
		mysql::query($query);
	}
	
	/**
	 * Paslaugos šalinimas
	 * @param type $id
	 */
	public function deleteService($id) {
		$query = "  DELETE FROM `miestas`
					WHERE `id_Miestas`='{$id}'";
		mysql::query($query);
	}
	
	/**
	 * Paslaugos kainų įrašymas
	 * @param type $data
	 */
	public function insertServicePrices($data) {
		foreach($data['kainos'] as $key=>$val) {
			if($data['neaktyvus'] == array() || $data['neaktyvus'][$key] == 0) {
				$query = "  INSERT INTO `paslaugu_kainos`
										(
											`fk_paslauga`,
											`galioja_nuo`,
											`kaina`
										)
										VALUES
										(
											'{$data['id']}',
											'{$data['datos'][$key]}',
											'{$val}'
										)";
				mysql::query($query);
			}
		}
	}
	
	/**
	 * Paslaugos kainų šalinimas
	 * @param type $serviceId
	 * @param type $clause
	 */
	public function deleteServicePrices($serviceId, $clause = "") {
		$query = "  DELETE FROM `paslaugu_kainos`
					WHERE `fk_paslauga`='{$serviceId}'" . $clause;
		mysql::query($query);
	}

	/**
	 * Didžiausios paslaugos id reikšmės radimas
	 * @return type
	 */
	public function getMaxIdOfService() {
		$query = "  SELECT MAX(`id_Miestas`) AS `latestId`
					FROM `miestas`";
		$data = mysql::select($query);
		
		return $data[0]['latestId'];
	}
	
	public function getOrderedServices($dateFrom, $dateTo) {
		$whereClauseString = "";
		if(!empty($dateFrom)) {
			$whereClauseString .= " WHERE `sutartys`.`sutarties_data`>='{$dateFrom}'";
			if(!empty($dateTo)) {
				$whereClauseString .= " AND `sutartys`.`sutarties_data`<='{$dateTo}'";
			}
		} else {
			if(!empty($dateTo)) {
				$whereClauseString .= " WHERE `sutartys`.`sutarties_data`<='{$dateTo}'";
			}
		}
		
		$query = "  SELECT `id`,
						   `pavadinimas`,
						   sum(`kiekis`) AS `uzsakyta`,
						   sum(`kiekis`*`uzsakytos_paslaugos`.`kaina`) AS `bendra_suma`
					FROM `paslaugos`
						INNER JOIN `uzsakytos_paslaugos`
							ON `paslaugos`.`id`=`uzsakytos_paslaugos`.`fk_paslauga`
						INNER JOIN `sutartys`
							ON `uzsakytos_paslaugos`.`fk_sutartis`=`sutartys`.`nr`
					{$whereClauseString}
					GROUP BY `paslaugos`.`id` ORDER BY `bendra_suma` DESC";
		$data = mysql::select($query);

		return $data;
	}

	public function getStatsOfOrderedServices($dateFrom, $dateTo) {
		$whereClauseString = "";
		if(!empty($dateFrom)) {
			$whereClauseString .= " WHERE `sutartys`.`sutarties_data`>='{$dateFrom}'";
			if(!empty($dateTo)) {
				$whereClauseString .= " AND `sutartys`.`sutarties_data`<='{$dateTo}'";
			}
		} else {
			if(!empty($dateTo)) {
				$whereClauseString .= " WHERE `sutartys`.`sutarties_data`<='{$dateTo}'";
			}
		}
		
		$query = "  SELECT sum(`kiekis`) AS `uzsakyta`,
						   sum(`kiekis`*`uzsakytos_paslaugos`.`kaina`) AS `bendra_suma`
					FROM `paslaugos`
						INNER JOIN `uzsakytos_paslaugos`
							ON `paslaugos`.`id`=`uzsakytos_paslaugos`.`fk_paslauga`
						INNER JOIN `sutartys`
							ON `uzsakytos_paslaugos`.`fk_sutartis`=`sutartys`.`nr`
					{$whereClauseString}";
		$data = mysql::select($query);

		return $data;
	}
}