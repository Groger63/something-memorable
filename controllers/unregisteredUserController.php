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
				$this->home();
			}
			else {
				$data=array();
					$data[0]="We're sorry, something somewhere went wrong...";
					$data[1]="Username or password wrong";
					require_once ($view['error']);
			}
		}

		function signup(){
			global $rep, $view;

			if(isset($_POST['signup'])){
				switch($_POST['signup']){
					case 'step1':
						// if(/* !validate username */){
						// 	$data['username']='regexp';
						// }
						if(userModel::existUser($_POST['username'])){
							$data['username']='taken';
						}

						// if(/* !validate regexp password */){
						// 	$data['password']='regexp';
						// }
						if(!checkData::checkBothPassword($_POST['password'],$_POST['password2'])){
							$data['password']='notidentical';
						}
						if(isset($data)) require_once ($view['signupUnamePwd']);
						else{
							$data['password']=hash ( "md5", $_POST['password']);
							$data['username']=$_POST['username'];
							require_once ($view['signupMoreinfo']);
						}
						break;

					case 'step2':
						$username=$_POST['username'];
						if(userModel::existUser($_POST['username'])){
							$data=array();
							$data[0]="We're sorry, something somewhere went wrong...";
							$data[1]="This user has already been registered!";
							require_once ($view['error']);
						}
						$displayname=$_POST['displayname'];
						$pwd_hash=$_POST['password_hash'];
						$role='reader';
						$salt=1;
						userModel::addUser($username,$displayname,$role,$pwd_hash,$salt);
						$data['username']=$username;
						require_once ($view['signupComplete']);
						break;

				}

			}
			else require_once ($view['signupUnamePwd']);
			//require_once ($view['signupMoreinfo']);
			
		}



	}
?>