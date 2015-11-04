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
			global $rep, $view;
			$data=array();
			$data[0]="We're sorry, something somewhere went wrong...";
			$data[1]="404";
			$data[2]="TG SALPUT";
			require_once ($view['error']);
		}

	}
?>