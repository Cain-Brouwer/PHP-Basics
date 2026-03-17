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

        public function create($data)
{
    $sql = "INSERT INTO Sneakers ( Merk
                                    ,Model
                                    ,Prijs
                                    ,Materiaal
                                    ,Gewicht
                                    ,Releasedatum
                                    ,Type
                                    )
            VALUES (:merk,
                    :model,
                    :prijs,
                    :materiaal,
                    :gewicht,
                    :releasedatum,
                    :type)";

    $this->db->query($sql);
    $this->db->bind(':merk', $data['merk'], PDO::PARAM_STR);
    $this->db->bind(':model', $data['model'], PDO::PARAM_STR);
    $this->db->bind(':prijs', $data['prijs'], PDO::PARAM_STR);
    $this->db->bind(':materiaal', $data['materiaal'], PDO::PARAM_STR);
    $this->db->bind(':gewicht', $data['gewicht'], PDO::PARAM_STR);
    $this->db->bind(':releasedatum', $data['releasedatum'], PDO::PARAM_STR);
    $this->db->bind(':type', $data['type'], PDO::PARAM_STR);

    return $this->db->execute();
}

public function createOld($data)
{
    $sql = "INSERT INTO Sneakers ( Merk}
            VALUES (:merk,
                    :model,
                    :prijs,
                    :geheugen,
                    :besturingssysteem,
                    :schermgrootte,
                    :releasedatum,
                    :megapixels)";

    $this->db->query($sql);
    $this->db->bind(':merk', $data['merk'], PDO::PARAM_STR);
    $this->db->bind(':model', $data['model'], PDO::PARAM_STR);
    $this->db->bind(':prijs', $data['prijs'], PDO::PARAM_INT);
    $this->db->bind(':geheugen', $data['geheugen'], PDO::PARAM_INT);
    $this->db->bind(':besturingssysteem', $data['besturingssysteem'], PDO::PARAM_STR);
    $this->db->bind(':schermgrootte', $data['schermgrootte'], PDO::PARAM_INT);
    $this->db->bind(':releasedatum', $data['releasedatum'], PDO::PARAM_STR);
    $this->db->bind(':megapixels', $data['megapixels'], PDO::PARAM_INT);

    return $this->db->execute();
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