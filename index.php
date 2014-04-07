<?php
require 'vendor/autoload.php';

//classe qui permet de manipuler les tables liées à l'utilisateur
//require_once '../include/DbUserHandler.php';

include_once 'reverse-geocoding/OpenStreetMap.php';
require_once 'bdd_handler/DbUserHandler.php';
require_once 'bdd_handler/DbPositionHandler.php';

// Variable Global
$user_id = NULL;

$app = new \Slim\Slim();

//Verification et affichage des erreurs
require_once 'bdd_handler/tool/ErrorHelper.php';

//routage destiné à créer ou identifier l'utilisateur
require_once 'routing/test.php';


//routage destiné à créer ou identifier l'utilisateur
require_once 'routing/user.php';
        
//routage destiné à créeret recuperer des positions
require_once 'routing/position.php';
      
      


$app->run();

