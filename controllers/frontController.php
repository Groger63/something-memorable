<?php
	class frontController{

			
		function __construct() {


			global $rep, $view;


			session_start();

			$action=isset($_REQUEST['action']) ? $_REQUEST['action'] : 'home' ;

			$cont=new homeController($action);


		}


	}
?>