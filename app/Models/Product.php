<?php

namespace Oshop\Models;

use  Oshop\Models\CoreModel;
use Oshop\Utils\Database;
use \PDO;

class Product extends CoreModel
{
    private $description;
    private $picture;
    private $price;
    private $rate;
    private $status;
    private $brand_id;
    private $category_id;
    private $type_id;
    // la propriété type_name sera nécéssaire pour la jointure de findProductsBy
    private $type_name;

    public function findAll()
    {
        // création de la requete SELECT
        $sql = 'SELECT * FROM product';
        // connexion PDO BDD
        $pdo = Database::getPDO();
        //execution de la requete
        $pdoStatement = $pdo->query($sql);
        //return du résultat de la requete
        $products = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'Oshop\Models\Product');

        return $products;
    }

    public function find($id)
    {
        // création de la requete SELECT
        //Sélectionne tous les champs de la table produit
        // ainsi que le champ nom de la table category
        // tu me renomme ce champs name en category_name
        //tu va récupérer ces info depuis la table product
        // et depuis la table category
        // vérifie si le lien correspond entre 
        //le champs id de la table category
        // et le champs category_id de la table product
        // enfin, tu sélectionne uniquement le produit qui à l'id demandé
        $sql = 'SELECT product.*, category.name AS category_name
         FROM product INNER JOIN category
         ON category.id = product.category_id
         WHERE product.id=' . $id;
        // connexion PDO BDD
        $pdo = Database::getPDO();
        //execution de la requete
        $pdoStatement = $pdo->query($sql);
        //return du résultat de la requete
        $product = $pdoStatement->fetch(PDO::FETCH_ASSOC);
        return $product;
    }
    //* Cette méthode est générique et nous permet de récupérer le type des produits
    //* l'ajout du type daans les fiches produits est commun à toute les pages
    //* donc autant faire un seul code
    //* De plus grace à lajout de façon dynamique, on à pas besoin de créer
    //* une méthode pour chaque page exemple :
    //* findProductsByCategories(), findProductsByTypes(),findProductsByBrand()

    public function findProductsBy($element, $element_id)
    {
        $sql = "SELECT product.*, type.name AS type_name
        FROM product
        INNER JOIN type ON product.type_id = type.id
        WHERE " . $element . "_id = " . $element_id;
        $pdo = Database::getPDO();
        //execution de la requete
        $pdoStatement = $pdo->query($sql);
        //return du résultat de la requete
        $products = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'Oshop\Models\Product');
        return $products;
    }



    /**
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */
    public function setDescription($description)
    {
        $this->description = $description;

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
     * Get the value of price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of rate
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Set the value of rate
     *
     * @return  self
     */
    public function setRate($rate)
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * Get the value of status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }


    /**
     * Get the value of brand_id
     */
    public function getBrand_id()
    {
        return $this->brand_id;
    }

    /**
     * Set the value of brand_id
     *
     * @return  self
     */
    public function setBrand_id($brand_id)
    {
        $this->brand_id = $brand_id;

        return $this;
    }

    /**
     * Get the value of category_id
     */
    public function getCategory_id()
    {
        return $this->category_id;
    }

    /**
     * Set the value of category_id
     *
     * @return  self
     */
    public function setCategory_id($category_id)
    {
        $this->category_id = $category_id;

        return $this;
    }

    /**
     * Get the value of type_id
     */
    public function getType_id()
    {
        return $this->type_id;
    }

    /**
     * Set the value of type_id
     *
     * @return  self
     */
    public function setType_id($type_id)
    {
        $this->type_id = $type_id;

        return $this;
    }

    /**
     * Get the value of type_name
     */ 
    public function getType_name()
    {
        return $this->type_name;
    }

    /**
     * Set the value of type_name
     *
     * @return  self
     */ 
    public function setType_name($type_name)
    {
        $this->type_name = $type_name;

        return $this;
    }
}
