<?php
	abstract class registeredUserController extends userController{
		protected  $SPECIFIC_ACTION=array('logout','deleteaccount','changepassword','changedisplayname','changeprofilepic','manageaccount');

	
		protected function logout(){
			session_unset ();
			session_destroy();
			$_REQUEST['action']=NULL;
			header('Location: index.php');
		}

		protected function deleteaccount(){
		//do something
			global $rep, $view;
			$data=array();
			$data[0]="We're sorry, something somewhere went wrong...";
			$data[1]="You can't delete your account yet";
			$data[2]="registered user";
			require_once ($view['error']);
		}

		protected function changepassword(){
			global $rep, $view;
			$data=array();
			$data[0]="We're sorry, something somewhere went wrong...";
			$data[1]="You can't change your password yet";
			$data[2]="registered user";
			require_once ($view['error']);
		}

		protected function changedisplayname(){
			global $rep, $view;
			$data=array();
			$data[0]="We're sorry, something somewhere went wrong...";
			$data[1]="You can't change your displayname yet";
			$data[2]="registered user";
			require_once ($view['error']);
		}

		protected function changeprofilepic(){
			global $rep, $view;
			$data=array();
			$data[0]="We're sorry, something somewhere went wrong...";
			$data[1]="You can't change your profile picture yet";
			$data[2]="registered user";
			require_once ($view['error']);
		}

		protected function manageaccount(){
			global $rep, $view;
			$data=array();
			
			
			require_once ($view['manageaccount']);
		}

	}
?>