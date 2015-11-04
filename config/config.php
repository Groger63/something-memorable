<?php

//Définition du repertoire de travail courrant
$rep=realpath(dirname(__FILE__)).'/../';



//DB connection
// $user="root";
// $password = "jsn10081993";
// $base = "dbSomethingMemorable";
// $host = "localhost";

$user="b75f54a35a10bd";
$password = "91023cc1";
$base = "db1508613";
$host = "eu-cdbr-azure-west-c.cloudapp.net";

//Liste des vues
$view['error']='views/error.php';
$view['home']='views/home.php';
$view['adventure']='views/adventure.php';

$role=array('user','reader','author','admin');
$actions=array('logout','deleteaccount','changepassword','changedisplayname','changeprofilepic','login','signup','home','showadventure','kickuser','deletepost','deletecomment','deletephoto','addpost','editpost','vote','likepost','commentpost','editcomment','deletecomment' );

?>