<?php
	abstract class userController{
		protected  $USER_ACTION;
		private  $SPECIFIC_ACTION=array();

		public function __construct($action='error'){
			$USER_ACTION = 	array('home','action2','action3');
			if(in_array($action, $USER_ACTION)) 
				$this->$action();
			elseif (in_array($action, $SPECIFIC_ACTION ))
				$this->$action();
		}
		public function home(){
			global $rep, $view;

			$page=isset($_REQUEST['page']) ? $_REQUEST['page'] : 1 ;
					$data=postModel::getSomePosts($page);
					require_once ($view['home']);
		}

	}
?>