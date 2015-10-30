<?php
	class connectionController{

			
		function __construct($action) {
			
			global $rep, $view;

			switch($action){
				case "connection" :
					$this->logIn();
					break;
				case "logOff":
					$this->logOff();
					break;
				default :
					require $view["error"];
					break;
			}

		}

		private function logIn(){
				$login = isset($_POST['username']) ? $_POST['username'] : '';
				$pwd = isset($_POST['password']) ? $_POST['password'] : '';//récupération des variables
			
			$user=userModel::getUser($login,$pwd);
			if(isset($user)){
				$_SESSION['username'] = $user->getUsername();
				$_SESSION['displayname'] = $user->getDisplayname();
				$_SESSION['salt'] = $user->getSalt();
				$_SESSION['role'] = $user->getRole();
				$_SESSION['logged'] = true;
				header('Location: index.php');
			}
			else {
				$data=array();
					$data[0]="We're sorry, something somewhere went wrong...";
					$data[1]="Username or password wrong";
					require_once ($view['error']);
			}
		}
		private function logOff(){
			session_unset ();
			session_destroy();
			$_REQUEST['action']=NULL;
			header('Location: index.php');
		}
	}
	

?>