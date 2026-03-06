<?php

class Sneakers
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllSneakers()
    {
        $sql = 'SELECT  SNK.Merk
                        ,SNK.Model
                        ,SNK.Type
                        ,CONCAT("€ ", FORMAT(SNK.Prijs, 2, "nl_NL")) as Prijs
                        ,SNK.Materiaal
                        ,CONCAT(SNK.Gewicht, " g") as Gewicht
                        ,DATE_FORMAT(SNK.Releasedatum, "%d/%m/%Y") as Releasedatum

                FROM    Sneakers as SNK

                ORDER BY SNK.Prijs DESC
                        ,SNK.Gewicht ASC
                        ,SNK.Releasedatum DESC';

        $this->db->query($sql);

        return $this->db->resultSet();
    }
}