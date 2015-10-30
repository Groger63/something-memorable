<?php
	class frontController{

			
		function __construct() {


			global $rep, $view;


			session_start();

			$action=isset($_REQUEST['action']) ? $_REQUEST['action'] : 'home' ;
			switch($action){
				case "connection" :
					$cont=new connectionController($action);
					break;				
				case "logOff" :
					$cont=new connectionController($action);
					break;
				default:
					$cont=new homeController($action);
			}

		}


	}
?>