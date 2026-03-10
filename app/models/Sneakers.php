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
        $sql = 'SELECT  SNK.Id
                        ,SNK.Merk
                        ,SNK.Model
                        ,SNK.Type
                        ,CONCAT("€ ", FORMAT(SNK.Prijs, 2, "de_DE")) as Prijs
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

        public function delete($Id)
    {
        $sql = "DELETE
                FROM Sneakers
                WHERE Id = :Id";

        $this->db->query($sql);

        $this->db->bind(':Id', $Id, PDO::PARAM_INT);

        return $this->db->execute();
    }
}