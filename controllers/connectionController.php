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
			
			global $rep, $view;
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

		// private function signUp(){
		// 	global $rep, $vues;
		// 	$Tmessages=array();
			
		// 	if(isset($_POST['signup'])){ // si on a déjà cliqué sur "s'inscrire"
		// 		$login = isset($_POST['login']) ? $_POST['login'] : '';
		// 		$password = isset($_POST['password'])? $_POST['password'] : '';
		// 		$password2 = isset($_POST['password2'])? $_POST['password2'] : '';
				
		// 		if(validation::val_conf_pwd($password,$password2)){
		// 			if(validation::val_login($login,$Tmessages)&Validation::val_password_inscription($password,$Tmessages)){
		// 				$usr=new User(nettoyage::cleanString($login),nettoyage::cleanString($password),'user');
		// 				modeleUser::inscription($usr,$Tmessages); //étant donné que l'inscription renvoie un bouléen, on pourrait implémenter un truc de cool ici
		// 			}
		// 		}
		// 		else{
		// 			$Tmessages[]="Les mots de passe ne sont pas identiques!";
		// 		}
		// 	}
		// 	require($rep.$vues['inscription']);
		// }

	
	}
	

?>