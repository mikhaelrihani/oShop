<?php
// création d'un namespace Oshop\Models
// cela signifie que notre class ici présente
// sera maintenant située et identifiée dans un dosser virtuel 
// ayant le chemin Oshop\Models
namespace Oshop\Models;

// les classes ayant été déplacées désn des dossiers virtuels (namespaces)
// je dois utiliser le mot clef use pour récupérer leur référence
use  Oshop\Models\CoreModel;
use Oshop\Utils\Database;
use \PDO;

class Category extends CoreModel
{

    private $subtitle;
    private $picture;
    private $home_order;

    public function findAll()
    {
        // création de la requete SELECT
        $sql = 'SELECT * FROM category';
        // connexion PDO BDD
        $pdo = Database::getPDO();
        //execution de la requete
        $pdoStatement = $pdo->query($sql);
        //return du résultat de la requete
        $categories = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'Oshop\Models\Category');

        return $categories;
    }

    public function findFiveFirst()
    {
        $sql = "SELECT *
        FROM category
        WHERE home_order > 0
        ORDER BY home_order
        LIMIT 5";

        // connexion PDO BDD
        $pdo = Database::getPDO();
        //execution de la requete
        $pdoStatement = $pdo->query($sql);
        //return du résultat de la requete
        $categories = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'Oshop\Models\Category');
        return $categories;
    }

    public function find($id)
    {
        $sql = 'SELECT *
         FROM category
         WHERE category.id=' . $id;
        // connexion PDO BDD
        $pdo = Database::getPDO();
        //execution de la requete
        $pdoStatement = $pdo->query($sql);
        $pdoStatement->setFetchMode(PDO::FETCH_CLASS, 'Oshop\Models\Category'); 
        //return du résultat de la requete
        $category = $pdoStatement->fetch();
        return $category;
    }
  

    /**
     * Get the value of subtitle
     */
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * Set the value of subtitle
     *
     * @return  self
     */
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    /**
     * Get the value of picture
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set the value of picture
     *
     * @return  self
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get the value of home_order
     */
    public function getHome_order()
    {
        return $this->home_order;
    }

    /**
     * Set the value of home_order
     *
     * @return  self
     */
    public function setHome_order($home_order)
    {
        $this->home_order = $home_order;

        return $this;
    }

    
}
