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
        $sql = 'SELECT  HOR.Id
                        ,HOR.Merk
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

    public function create ($data)
{
    $sql = "INSERT INTO Horloges ( merk
                                    ,Model
                                    ,Prijs
                                    ,Materiaal
                                    ,Waterdichtheid
                                    ,UniekKenmerk
                                    ,Gewicht
                                    ,Releasedatum
                                    ,type
                                    )
            VALUES (:merk,
                    :model,
                    :prijs,
                    :materiaal,
                    :waterdichtheid,
                    :uniekkenmerk,
                    :gewicht,
                    :releasedatum,
                    :type)";

    $this->db->query($sql);
    $this->db->bind(':merk', $data['merk'], PDO::PARAM_STR);
    $this->db->bind(':model', $data['model'], PDO::PARAM_STR);
    $this->db->bind(':prijs', $data['prijs'], PDO::PARAM_INT);
    $this->db->bind(':materiaal', $data['materiaal'], PDO::PARAM_STR);
    $this->db->bind(':waterdichtheid', $data['waterdichtheid'], PDO::PARAM_STR);
    $this->db->bind(':uniekkenmerk', $data['uniekkenmerk'], PDO::PARAM_STR);
    $this->db->bind(':gewicht', $data['gewicht'], PDO::PARAM_INT);
    $this->db->bind(':releasedatum', $data['releasedatum'], PDO::PARAM_STR);
    $this->db->bind(':type', $data['type'], PDO::PARAM_STR);

    return $this->db->execute();
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

    public function getHorlogeById($Id)
    {
        $sql = "SELECT  HOR.Id
                        ,HOR.Merk
                        ,HOR.Model
                        ,HOR.Type
                        ,HOR.Prijs
                        ,HOR.Materiaal
                        ,HOR.Waterdichtheid
                        ,HOR.UniekKenmerk
                        ,HOR.Gewicht
                        ,DATE_FORMAT(HOR.Releasedatum, '%Y-%m-%d') as Releasedatum

                FROM    Horloges as HOR

                WHERE HOR.Id = :Id";

        $this->db->query($sql);

        $this->db->bind(':Id', $Id, PDO::PARAM_INT);

        return $this->db->single();
    }

    public function update($Id, $data)
{
    $sql = "UPDATE Horloges
            SET Merk = :merk,
                Model = :model,
                Prijs = :prijs,
                Materiaal = :materiaal,
                Waterdichtheid = :waterdichtheid,
                UniekKenmerk = :uniekkenmerk,
                Gewicht = :gewicht,
                Releasedatum = :releasedatum,
                Type = :type
            WHERE Id = :Id";

    $this->db->query($sql);
    $this->db->bind(':Id', $Id, PDO::PARAM_INT);
    $this->db->bind(':merk', $data['merk'], PDO::PARAM_STR);
    $this->db->bind(':model', $data['model'], PDO::PARAM_STR);
    $this->db->bind(':prijs', $data['prijs'], PDO::PARAM_INT);
    $this->db->bind(':materiaal', $data['materiaal'], PDO::PARAM_STR);
    $this->db->bind(':waterdichtheid', $data['waterdichtheid'], PDO::PARAM_STR);
    $this->db->bind(':uniekkenmerk', $data['uniekkenmerk'], PDO::PARAM_STR);
    $this->db->bind(':gewicht', $data['gewicht'], PDO::PARAM_INT);
    $this->db->bind(':releasedatum', $data['releasedatum'], PDO::PARAM_STR);
    $this->db->bind(':type', $data['type'], PDO::PARAM_STR);

    return $this->db->execute();

    }
}