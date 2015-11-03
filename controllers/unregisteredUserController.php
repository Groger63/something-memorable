<?php
	class unregisteredUserController extends userController{
		protected  $SPECIFIC_ACTION=array('login','signup');

		protected function login(){
			
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

		function signup(){
		//do something
			global $rep, $view;
			$data=array();
			$data[0]="We're sorry, something somewhere went wrong...";
			$data[1]="You can't register yet";
			require_once ($view['error']);
		}



	}
?>