<?php 
require_once(__DIR__.'/config/config.php');
//chargement autoloader pour autochargement des classes
require_once(__DIR__.'/config/autoload.php');
Autoload::load();

//Lancement du front controller
$cont = new frontController();
?>