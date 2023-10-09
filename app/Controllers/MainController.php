<?php
// création d'un namespace Oshop\Models
// cela signifie que notre class ici présente
// sera maintenant située et identifiée dans un dosser virtuel 
// ayant le chemin Oshop\Models
namespace Oshop\Controllers;
// les classes ayant été déplacées désn des dossiers virtuels (namespaces)
// je dois utiliser le mot clef use pour récupérer leur référence
use Oshop\Models\Category;
use Oshop\Models\Type;
use Oshop\Models\Brand;
use Oshop\Models\Product;

class MainController extends CoreController
{

    // action home -> méthode page home
    public function home()
    {
        $categoryInit = new Category();
        $fiveFirstcategories = $categoryInit->findFiveFirst();
        $viewDatas['fiveFirstCategories'] = $fiveFirstcategories;
        $this->show('home',$viewDatas);
    }
    // action legalMentions -> méthode page mentions legales
    public function legalMentions()
    {
        $this->show('legalMentions');
    }
    public function test()
    {
        // test des différentes méthodes des models
        $typeInit = new Type;
        $AllTypes = $typeInit->findAll();
        $OneType = $typeInit->find(1);
        // dump($AllTypes);
        // dump($OneType);
        //brands
        $brandInit = new Brand;
        $AllBrands = $brandInit->findAll();
        $OneBrand = $brandInit->find(1);
        // dump($AllBrands);
        // dump($OneBrand);
        // products
        $productInit = new Product;
        $product = $productInit->find(1);
        //categories
        $categoryInit = new Category;
        $AllCategories = $categoryInit->findAll();
        $Onecategory = $categoryInit->find(1);
        $fiveFirstcategories = $categoryInit->findFiveFirst();
        // dump($AllCategories);
        // dump($Onecategory);
        // dump($fiveFirstcategories);
        $this->show('test');
    }

}
