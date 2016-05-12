<?php

/**
 * Papildomų paslaugų redagavimo klasė
 *
 * @author ISK
 */

class show
{

    public function __construct()
    {

    }

    /**
     * Paslaugų sąrašo išrinkimas
     * @param type $limit
     * @param type $offset
     * @return type
     */
    public function getShowList($limit = null, $offset = null)
    {
        $limitOffsetString = "";
        if (isset($limit)) {
            $limitOffsetString .= " LIMIT {$limit}";
        }
        if (isset($offset)) {
            $limitOffsetString .= " OFFSET {$offset}";
        }

        $query = "SELECT `id_Seansas`, `pradzios_laikas`, `pabaigos_laikas`,`kaina`, `filmas`.`pavadinimas` as `pavadinimas`, `kino_teatras`.`pavadinimas` as `kTeatras` FROM `seansas` 
  LEFT JOIN `kino_teatras` ON `seansas`.`fk_Kino_teatrasid_Kino_teatras`=`kino_teatras`.`id_Kino_teatras`
  LEFT JOIN `filmas` ON `seansas`.`fk_Filmasid_Filmas`=`filmas`.`id_Filmas`
  " . $limitOffsetString;
        $data = mysql::select($query);

        return $data;
    }

    /**
     * Paslaugų kiekio radimas
     * @return type
     */
    public function getShowListCount()
    {
        $query = "  SELECT COUNT(*) as `kiekis`
					FROM `seansas`";
        $data = mysql::select($query);

        return $data[0]['kiekis'];
    }

    /**
     * Paslaugos kainų sąrašo radimas
     * @param type $serviceId
     * @return type
     */
    public function getServicePrices($serviceId)
    {
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
    public function getContractCountOfService($serviceId)
    {
        $query = "  SELECT COUNT(`seansas`.`id_Seansas`) AS `kiekis`
					FROM `seansas`
						INNER JOIN `bilietas`
							ON `seansas`.`id_Seansas`=`bilietas`.`fk_Seansasid_Seansas`
					WHERE `seansas`.`id_Seansas`='{$serviceId}'";
        $data = mysql::select($query);

        return $data[0]['kiekis'];
    }

    /**
     * Paslaugos išrinkimas
     * @param type $id
     * @return type
     */
    public function getService($id)
    {
        $query = "  SELECT *
					FROM `seansas`
					WHERE `id_Seansas`='{$id}'";
        $data = mysql::select($query);

        return $data[0];
    }

    /**
     * Paslaugos įrašymas
     * @param type $data
     */
    public function insertService($data)
    {
        $id=$this->getMaxIdOfService();
        $id++;
        $query = "  INSERT INTO `seansas`
								(
									`id_Seansas`,
									`pradzios_laikas`,
									`pabaigos_laikas`,
									`kaina`,
									`fk_Filmasid_Filmas`,
									`fk_Kino_teatrasid_Kino_teatras`
								)
								VALUES
								(
									'{$id}',
									'{$data['pradzios_laikas']}',
									'{$data['pabaigos_laikas']}',
									'{$data['kaina']}',
									'{$data['fk_Filmasid_Filmas']}',
									'{$data['fk_Kino_teatrasid_Kino_teatras']}'
								)";
        mysql::query($query);
    }

    /**
     * Paslaugos atnaujinimas
     * @param type $data
     */
    public function updateService($data)
    {
        $query = "  UPDATE `seansas`
					SET    `pradzios_laikas`='{$data['pradzios_laikas']}',
						   `pabaigos_laikas`='{$data['pabaigos_laikas']}',
						   `kaina`='{$data['kaina']}',
						   `fk_Filmasid_Filmas`='{$data['fk_Filmasid_Filmas']}',
						   `fk_Kino_teatrasid_Kino_teatras`='{$data['fk_Kino_teatrasid_Kino_teatras']}'
					WHERE `id_Seansas`='{$data['id_Seansas']}'";
        mysql::query($query);
    }

    /**
     * Paslaugos šalinimas
     * @param type $id
     */
    public function deleteService($id)
    {
        $query = "  DELETE FROM `seansas`
					WHERE `id_Seansas`='{$id}'";
        mysql::query($query);
    }

    /**
     * Paslaugos kainų įrašymas
     * @param type $data
     */
    public function insertServicePrices($data)
    {
        foreach ($data['kainos'] as $key => $val) {
            if ($data['neaktyvus'] == array() || $data['neaktyvus'][$key] == 0) {
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
    public function deleteServicePrices($serviceId, $clause = "")
    {
        $query = "  DELETE FROM `paslaugu_kainos`
					WHERE `fk_paslauga`='{$serviceId}'" . $clause;
        mysql::query($query);
    }

    /**
     * Didžiausios paslaugos id reikšmės radimas
     * @return type
     */
    public function getMaxIdOfService()
    {
        $query = "  SELECT MAX(`id_Seansas`) AS `latestId`
					FROM `seansas`";
        $data = mysql::select($query);

        return $data[0]['latestId'];
    }

    public function getOrderedServices($dateFrom, $dateTo)
    {
        $whereClauseString = "";
        if (!empty($dateFrom)) {
            $whereClauseString .= " WHERE `sutartys`.`sutarties_data`>='{$dateFrom}'";
            if (!empty($dateTo)) {
                $whereClauseString .= " AND `sutartys`.`sutarties_data`<='{$dateTo}'";
            }
        } else {
            if (!empty($dateTo)) {
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

    public function getStatsOfOrderedServices($dateFrom, $dateTo)
    {
        $whereClauseString = "";
        if (!empty($dateFrom)) {
            $whereClauseString .= " WHERE `sutartys`.`sutarties_data`>='{$dateFrom}'";
            if (!empty($dateTo)) {
                $whereClauseString .= " AND `sutartys`.`sutarties_data`<='{$dateTo}'";
            }
        } else {
            if (!empty($dateTo)) {
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