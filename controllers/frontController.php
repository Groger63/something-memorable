<?php
	class frontController{

			
		function __construct() {


			global $rep, $view,$actions;


			session_start();

			$action=isset($_REQUEST['action']) ? $_REQUEST['action'] : 'home' ;
			if(in_array($action, $actions)){
				$role = isset($_SESSION['role']) ? $_SESSION['role'] : 'unregisteredUser' ;
				$controller=$role.'Controller';
				$cont=new $controller($action);
			}
			else $this->error404();


		}
		private function error404(){
		
			global $rep, $view,$actions;
			$data[0]="We're sorry, something somewhere went wrong...";
			$data[1]="This is a 404";
			$data[2]="Page not found";
			require_once ($view['error']);
		}

	}
?>