<?php

//Définition du repertoire de travail courrant
$rep=realpath(dirname(__FILE__)).'/../';



//DB localhost Yael
// $user="root";
// $password = "jsn10081993";
// $base = "dbSomethingMemorable";
// $host = "localhost";

//DB Azure Quentin
$user="b75f54a35a10bd";
$password = "91023cc1";
$base = "db1508613";
$host = "eu-cdbr-azure-west-c.cloudapp.net";

//DB localhostQuentin
// $user="root";
// $password = "";
// $base = "db1508613";
// $host = "localhost";

//Liste des vues
$view['error']='views/error.php';
$view['home']='views/home.php';
$view['adventure']='views/adventure.php';

$role=array('user','reader','author','admin');
$actions=array('logout','deleteaccount','changepassword','changedisplayname','changeprofilepic','login','signup','home','showadventure','kickuser','deletepost','deletecomment','deletephoto','addpost','editpost','vote','commentpost','editcomment','deletecomment' );

?>