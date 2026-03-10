<?php

class Horloges
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllHorloges()
    {
        $sql = 'SELECT  HOR.Merk
                        ,HOR.Model
                        ,HOR.Type
                        ,CONCAT("€ ", FORMAT(HOR.Prijs, 2, "de_DE")) as Prijs
                        ,HOR.Materiaal
                        ,HOR.Waterdichtheid
                        ,HOR.UniekKenmerk
                        ,CONCAT(HOR.Gewicht, " g") as Gewicht
                        ,DATE_FORMAT(HOR.Releasedatum, "%d/%m/%Y") as Releasedatum

                FROM    Horloges as HOR

                ORDER BY HOR.Prijs DESC
                        ,HOR.Gewicht ASC
                        ,HOR.Releasedatum DESC';

        $this->db->query($sql);

        return $this->db->resultSet();
    }

        public function delete($Id)
    {
        $sql = "DELETE
                FROM Horloges
                WHERE Id = :Id";

        $this->db->query($sql);

        $this->db->bind(':Id', $Id, PDO::PARAM_INT);

        return $this->db->execute();
    }
}
