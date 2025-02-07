<?php
const DEFAULT_APP = 'Frontend';
 
// Si l'application n'est pas valide, charger l'application par défaut qui se chargera de générer une erreur 404
if (!isset($_GET['app']) || !file_exists(__DIR__.'/../App/'.$_GET['app'])) $_GET['app'] = DEFAULT_APP;
 
// Commencer par inclure la classe nous permettant d'enregistrer nos autoload
require __DIR__.'/../lib/OCFram/SplClassLoader.php';
 
// Ensuite enregistrer les autoloads correspondant à chaque vendor (OCFram, App, Model, etc.)
$OCFramLoader = new SplClassLoader('OCFram', __DIR__.'/../lib');
$OCFramLoader->register();
 
$appLoader = new SplClassLoader('App', __DIR__.'/..');
$appLoader->register();
 
$modelLoader = new SplClassLoader('Model', __DIR__.'/../lib/vendors');
$modelLoader->register();
 
$entityLoader = new SplClassLoader('Entity', __DIR__.'/../lib/vendors');
$entityLoader->register();
 
$formBuilderLoader = new SplClassLoader('FormBuilder', __DIR__.'/../lib/vendors');
$formBuilderLoader->register();
 
 
// Déduire le nom de la classe et l'instancier
$appClass = 'App\\'.$_GET['app'].'\\'.$_GET['app'].'Application';
 
$app = new $appClass;
$app->run();