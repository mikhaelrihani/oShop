<?php

namespace Oshop\Models;
use  Oshop\Models\CoreModel;
use Oshop\Utils\Database;
use \PDO;


class Type extends CoreModel
{
    public function findAll()
    {
        // création de la requete SELECT
        $sql = 'SELECT * FROM type';
        // connexion PDO BDD
        $pdo = Database::getPDO();
        //execution de la requete
        $pdoStatement = $pdo->query($sql);
        //return du résultat de la requete
        $types = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'Oshop\Models\Type');

        return $types;
    }

    public function find($id)
    {
        $sql = 'SELECT *
        FROM type WHERE type.id=' . $id;
        // connexion PDO BDD
        $pdo = Database::getPDO();
        //execution de la requete
        $pdoStatement = $pdo->query($sql);
        //return du résultat de la requete
        $pdoStatement->setFetchMode(PDO::FETCH_CLASS, 'Oshop\Models\Type'); 

        $type = $pdoStatement->fetch();
        return $type;
    }
}
