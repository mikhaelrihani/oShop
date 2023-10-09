<?php

namespace Oshop\Controllers;

use Oshop\Models\Category;
use Oshop\Models\Type;
use Oshop\Models\Brand;

class CoreController
{
    // méthode show
    protected function show($viewName, $viewData = null)
    {

        // point de vigilance, ce n'est pas une bonne pratique
        global $router;

        // permet de récupérer l'url de base du dossier
        // afin de créer nos urls dynamiques pour les dossiers assets
        $absoluteURL = $_SERVER['BASE_URI'];
        // on définit cette variable pour que nos vues puissent mettre le lien de la page courante en avant
        // Toutes nos données dynamiques à utiliser dans les vues se trouveront dans $viewData (par souci de simplification)
        $viewData['currentPage'] = $viewName;
        // __DIR__ vaut /var/www/html/S05/..../Controllers
        // Récupération des types pour le header
        $type = new Type();
        $viewData['allTypes'] =  $type->findAll();
        // Récupération des catégories pour le header
        $category = new Category();
        $viewData['allCategories'] =  $category->findAll();
        // Récupération des Brands
        $brand = new Brand();

        $viewData['allBrands'] =  $brand->findAll();    
        // extract permet de créer des variables dynamique basées sur les clefs d'un tableau
        extract($viewData);

        require __DIR__ . '/../views/header.tpl.php';
        // on inclut une vue selon la valeur du paramètre $viewName
        require __DIR__ . '/../views/' . $viewName . '.tpl.php';
        require __DIR__ . '/../views/footer.tpl.php';
    }
}
