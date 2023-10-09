<?php
namespace Oshop\Models;
use  Oshop\Models\CoreModel;
use Oshop\Utils\Database;
use \PDO;

class Brand extends CoreModel
{

    public function findAll()
    {
        // création de la requete SELECT
        $sql = 'SELECT * FROM brand';
        // connexion PDO BDD
        $pdo = Database::getPDO();
        //execution de la requete
        $pdoStatement = $pdo->query($sql);
        //return du résultat de la requete
        $brands = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'Oshop\Models\Brand');

        return $brands;
    }

    public function find($id)
    {
        // création de la requete SELECT
        //Sélectionne tous les champs de la table brand
        // ainsi que le champ nom de la table category
        // tu me renomme ce champs name en category_name
        //tu va récupérer ces info depuis la table brand
        // et depuis la table category
        // vérifie si le lien correspond entre 
        //le champs id de la table category
        // et le champs category_id de la table brand
        // enfin, tu sélectionne uniquement le brand qui à l'id demandé
        $sql = 'SELECT *
        FROM brand WHERE brand.id=' . $id;
        // connexion PDO BDD
        $pdo = Database::getPDO();
        //execution de la requete
        $pdoStatement = $pdo->query($sql);
        //return du résultat de la requete
        $pdoStatement->setFetchMode(PDO::FETCH_CLASS, 'Oshop\Models\Brand'); 
        $brand = $pdoStatement->fetch();
        return $brand;
    }
}
