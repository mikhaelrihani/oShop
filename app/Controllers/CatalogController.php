<?php
// création d'un namespace Oshop\Models
// cela signifie que notre class ici présente
// sera maintenant située et identifiée dans un dosser virtuel 
// ayant le chemin Oshop\Models
namespace Oshop\Controllers;
// les classes ayant été déplacées désn des dossiers virtuels (namespaces)
// je dois utiliser le mot clef use pour récupérer leur référence
use  Oshop\Models\Category;
use  Oshop\Models\Type;
use  Oshop\Models\Brand;
use  Oshop\Models\Product;

class CatalogController extends CoreController
{

    // action category -> méthode page categorie
    public function category($category)
    {
        // faire appel au bon model
        $categoryInit = new Category();    
        $onecategory = $categoryInit->find($category['id']);
        // on doit également sortir les produits de la catégorie en cours
        $productInit = new Product();
        // on récupères les produits pas catégories
        $products = $productInit->findProductsBy('category',$category['id']);
        // on ajoute des éléments dans le tableau viewData via des clefs
        // pour pouvoir les manipuler sous forme de variables grace au extract()
        $viewData['currentCategory'] =  $onecategory;
        $viewData['products'] =  $products;
        $this->show('category',  $viewData);
    }
    // action type -> méthode page type
    public function type($type)
    {
        // faire appel au bon model
        $typeInit = new Type;
        $oneType = $typeInit->find($type['id']);
        // récupération des produits par types
        $productInit = new Product();
        $products = $productInit->findProductsBy('type',$type['id']);
        // on ajoute des éléments dans le tableau viewData via des clefs
        // pour pouvoir les manipuler sous forme de variables grace au extract()
        $viewData['currentType'] =  $oneType;
        $viewData['products'] =  $products;
        $this->show('type', $viewData);
    }
    // action brand -> méthode page marque 
    public function brand($brand)
    {
        // faire appel au bon model
        $brandInit = new Brand;
        $oneBrand = $brandInit->find($brand['id']);
        // récupération des produits par marques
        $productInit = new Product();
        $products = $productInit->findProductsBy('brand',$brand['id']);
        // on ajoute des éléments dans le tableau viewData via des clefs
        // pour pouvoir les manipuler sous forme de variables grace au extract()
        $viewData['currentBrand'] =  $oneBrand;
        $viewData['products'] =  $products;
        $this->show('brand', $viewData);
    }
    // action product -> méthode page produit 
    public function product($productInfos)
    {

        // faire appel au bon model
        $productInit = new Product;
        $product = $productInit->find($productInfos['id']);

        // faire appel à la bonne méthode du model
        // afin de récupérer les datas de la BDD
        $viewData['productInfos'] = $productInfos;
        $viewData['product'] = $product;
        $this->show('product', $viewData);
    }
}
