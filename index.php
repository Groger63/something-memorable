<?php 
require_once('/config/config.php');
//chargement autoloader pour autochargement des classes
require_once('/config/autoload.php');
Autoload::load();

//Lancement du front controller
$cont = new frontController();
?>