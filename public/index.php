<?php
// require des controllers
require __DIR__ . '/../vendor/autoload.php';
// *pour gérer l'autoload, se rendre dans composer.json
// *ajouter ce code : 
// *"autoload": {
// *    "psr-4": {
// *       "Oshop\\": "app/"
// *   }
// *}
// ici on lui dit de prendre en compte que la racine de notre chemin vers nos classes
// est bien app/ et non pas Oshop\
// ensuite il faut lancer la commande suivante dans le terminal 
//!(attention d'etre au meme niveau que composer.json) :
// *composer dump-autoload
// enjoy !

// nos anciens require 
// require_once __DIR__ . '/../app/Utils/Database.php';

// require_once __DIR__ . '/../app/Models/CoreModel.php';
// require_once __DIR__ . '/../app/Models/Product.php';
// require_once __DIR__ . '/../app/Models/Category.php';
// require_once __DIR__ . '/../app/Models/Type.php';
// require_once __DIR__ . '/../app/Models/Brand.php';

// require_once __DIR__ . '/../app/Controllers/CoreController.php';
// require_once __DIR__ . '/../app/Controllers/MainController.php';
// require_once __DIR__ . '/../app/Controllers/CatalogController.php';

//première solution ><
//spl_autoload_register nous retourne le nom de la classe utilisée
// spl_autoload_register(function($className){
//     // on découpe la string (namespace de la classe) et on forme un tableau 
//     $classNameExploded = explode("\\",$className);
//     // on remplace Oshop par app (le premier element du tableau)
//     $classNameExploded[0] = 'app';
//     // une fois oshop remplacé on change notre tableau en une string grace à implode
//     $pathArrayToString = implode('/',$classNameExploded);
//     // on créé le chemin grace aux variable;
//     // mais c'est un peu bancale non ?!
//     $path = __DIR__ . '/../'.$pathArrayToString.'.php';
//     // on fait le require
//     require($path);
// });

//utilisation de AltoRouter
//on commence par instancier AltoRouter
$router = new AltoRouter();

// on fournit a AltoRouter la partie de l'URL à ne pas prendre en compte pour faire la comparaison entre l'URL courante et l'url de la route
// la valeur de $_SERVER['BASE_URI'] est donnée par le .htaccess. Elle correspond à la racine du site => à la route "/"
$router->setBasePath($_SERVER['BASE_URI']);
// mise en place des routes
$router->map(
    // 1er param, la méthode pour récupérer la requete post ou get
    'GET',
    // 2eme param = la route
    '/',
    // target, soit les éléments que l'on souhaite déclencher lorsque l'on va tomber
    // sur l'url spécifiée au dessus
    [
        'action' => 'home',
        'controller' => 'Oshop\Controllers\MainController'
    ],
    // un param facultatif pour identifer notre route
    'home'
);
// Route mentions légales
$router->map(
    // 1er param, la méthode pour récupérer la requete post ou get
    'GET',
    // 2eme param = la route
    '/mentions-legales/',
    // target, soit les éléments que l'on souhaite déclencher lorsque l'on va tomber
    // sur l'url spécifiée au dessus
    [
        'action' => 'legalMentions',
        'controller' => 'Oshop\Controllers\MainController'
    ],
    // un param facultatif pour identifer notre route
    'legalMentions'
);
// Route page type
$router->map(
    // 1er param, la méthode pour récupérer la requete post ou get
    'GET',
    // 2eme param = la route
    '/catalogue/type/[i:id]',
    // target, soit les éléments que l'on souhaite déclencher lorsque l'on va tomber
    // sur l'url spécifiée au dessus
    [
        'action' => 'type',
        'controller' => 'Oshop\Controllers\CatalogController'
    ],
    // un param facultatif pour identifer notre route
    'type'
);
// Route page brand
$router->map(
    // 1er param, la méthode pour récupérer la requete post ou get
    'GET',
    // 2eme param = la route
    '/catalogue/marque/[i:id]',
    // target, soit les éléments que l'on souhaite déclencher lorsque l'on va tomber
    // sur l'url spécifiée au dessus
    [
        'action' => 'brand',
        'controller' => 'Oshop\Controllers\CatalogController'
    ],
    // un param facultatif pour identifer notre route
    'brand'
);
// Route page product
$router->map(
    // 1er param, la méthode pour récupérer la requete post ou get
    'GET',
    // 2eme param = la route
    '/catalogue/produit/[i:id]',
    // target, soit les éléments que l'on souhaite déclencher lorsque l'on va tomber
    // sur l'url spécifiée au dessus
    [
        'action' => 'product',
        'controller' => 'Oshop\Controllers\CatalogController'
    ],
    // un param facultatif pour identifer notre route
    'product'
);
// Route Catalog
$router->map(
    // 1er param, la méthode pour récupérer la requete post ou get
    'GET',
    // 2eme param = la route
    '/catalogue/categorie/[i:id]',
    // target, soit les éléments que l'on souhaite déclencher lorsque l'on va tomber
    // sur l'url spécifiée au dessus
    [
        'action' => 'category',
        'controller' => 'Oshop\Controllers\CatalogController'
    ],
    // un param facultatif pour identifer notre route
    'category'
);

// Route Test
$router->map(
    // 1er param, la méthode pour récupérer la requete post ou get
    'GET',
    // 2eme param = la route
    '/test',
    // target, soit les éléments que l'on souhaite déclencher lorsque l'on va tomber
    // sur l'url spécifiée au dessus
    [
        'action' => 'test',
        'controller' => 'Oshop\Controllers\MainController'
    ],
    // un param facultatif pour identifer notre route
    'test'
);

// cette étape permet de récupérer la valeurs s'il y'a un match entre la requete et
//le mapping des routes fait au dessus
$match = $router->match();
// Début Dispatcher
// si la méthode match à trouvé une correspondance entre 
// le mapping fait au dessus et la requete

if ($match) {
    // je récupère les éléments situés dans le tableau match dans target.
    $controllerToUse = $match['target']['controller'];
    $methodToUse = $match['target']['action'];
} else {
    exit("erreur 404: la page demandée n'existe pas !");
}



//nouvelle instance du controleur sélectionné dynamiquement dans le if
$controller = new $controllerToUse();
// l'appelle de la méthode correspondante
$controller->$methodToUse($match['params']);
// fin Dispatcher
