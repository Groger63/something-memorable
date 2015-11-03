<?php
	class frontController{

			
		function __construct() {


			global $rep, $view;


			session_start();

			$action=isset($_REQUEST['action']) ? $_REQUEST['action'] : 'home' ;


			$role = isset($_SESSION['role']) ? $_SESSION['role'] : 'unregisteredUser' ;
			$controller=$role.'Controller';
			$cont=new $controller($action);
			


		}


	}
?>