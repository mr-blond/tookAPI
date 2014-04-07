<?php
/*use Symfony\Component\Console\Application;
 
require __DIR__.'/vendor/autoload.php';
 
$application = new Application();
$application->run();
 
*/
  
 require_once "vendor/autoload.php";  

 use Doctrine\ORM\Tools\Setup;  
 use Doctrine\ORM\EntityManager;  

 $paths = array("Entities");  
 $isDevMode = false;  

 // the connection configuration  
$dbParams = [     'driver' => 'pdo_mysql',
    'host' => 'localhost',
    'dbname' => 'mydb',
    'user' => 'root',
    'password' => ''
]; 

 // Any way to access the EntityManager from your application  
 $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);  
 $em = EntityManager::create($dbParams, $config);  

 $helperSet = new \Symfony\Component\Console\Helper\HelperSet(array(  
   'db' => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($em->getConnection()),  
   'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($em)  
 ));  