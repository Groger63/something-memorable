<?php 
	echo "ok";
require_once(__DIR__.'/config/config.php');
echo "ok";
//chargement autoloader pour autochargement des classes
require_once(__DIR__.'/config/autoload.php');
echo "ok";
Autoload::load();
echo "ok";

//Lancement du front controller
$cont = new frontController();
echo "ok";
?>