<?php

//Définition du repertoire de travail courrant
$rep=realpath(dirname(__FILE__)).'/../';



//DB connection
$user="b75f54a35a10bd";
$password = "91023cc1";
$base = "db1508613";
$host = "eu-cdbr-azure-west-c.cloudapp.net";

//Liste des vues
$view['error']='views/error.php';
$view['home']='views/home.php';


$role=array('user','reader','author','admin');


?>