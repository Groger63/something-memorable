<?php
	class unregisteredUserController extends userController{
		protected  $SPECIFIC_ACTION=array('login','signup');

		public function login(){
			//do something that can be done by every other kind of user
		}

	}
?>