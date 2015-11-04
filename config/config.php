<?php

//Définition du repertoire de travail courrant
$rep=realpath(dirname(__FILE__)).'/../';



//DB connection
$user="root";
$password = "jsn10081993";
$base = "dbSomethingMemorable";
$host = "localhost";

//Liste des vues
$view['error']='views/error.php';
$view['home']='views/home.php';
$view['adventure']='views/adventure.php';

$role=array('user','reader','author','admin');
$actions=array('logout','deleteaccount','changepassword','changedisplayname','changeprofilepic','login','signup','home','showadventure','kickuser','deletepost','deletecomment','deletephoto','addpost','editpost','vote','likepost','commentpost','editcomment','deletecomment' );

?>