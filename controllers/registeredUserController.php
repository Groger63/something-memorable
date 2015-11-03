<?php
	class registeredUserController extends userController{
		protected  $SPECIFIC_ACTION=array('logout');

	
		protected function logout(){
			session_unset ();
			session_destroy();
			$_REQUEST['action']=NULL;
			header('Location: index.php');
		}

	}
?>