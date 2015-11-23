<?php

//Définition du repertoire de travail courrant
$rep=realpath(dirname(__FILE__)).'/../';



//DB localhost Yael
// $user="root";
// $password = "jsn10081993";
// $base = "dbSomethingMemorable";
// $host = "localhost";

//DB Azure Quentin
// $user="b75f54a35a10bd";
// $password = "91023cc1";
// $base = "db1508613";
// $host = "eu-cdbr-azure-west-c.cloudapp.net";

//DB localhostQuentin
// $user="root";
// $password = "";
// $base = "db1508613";
// $host = "localhost";

// //DB amen.fr
$user="quchambefodb";
$password = "patrick12345";
$base = "quentindb";
$host = "hostingmysql324.amen.fr";

//Liste des vues
$view['error']='views/error.php';
$view['home']='views/home.php';
$view['search']='views/search.php';
$view['adventure']='views/adventure.php';
$view['signupUnamePwd']='views/signupUnamePwd.php';
$view['signupMoreinfo']='views/signupMoreinfo.php';
$view['signupComplete']='views/signupComplete.php';
$view['manageaccount']='views/manageaccount.php';
$view['authordashboard']='views/authordashboard.php';
$view['newstory']='views/newstory.php';
$view['editpost']='views/editpost.php';
$view['addpost']='views/addpost.php';
$view['deleteaccount']='views/deleteaccount.php';

$role=array('user','reader','author','admin');

$actions=array('logout','deleteaccount','changepassword',
				'changedisplayname','changeprofilepic','login','signup',
				'home','showadventure','kickuser','deletepost','deletecomment',
				'deletephoto','addpost','editpost','vote','commentpost',
				'editcomment','deletecomment','search','manageaccount','dashboard' );

?>