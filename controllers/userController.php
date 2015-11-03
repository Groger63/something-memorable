<?php
	abstract class userController{

		protected  $USER_ACTION	=array('home');

		public function __construct($action='home'){
			if(in_array($action, $this->USER_ACTION)) 
				$this->$action();
			elseif (in_array($action, $this->SPECIFIC_ACTION ))
				$this->$action();
			else $this->error();
		}

		protected function home(){
			global $rep, $view;

			$page=isset($_REQUEST['page']) ? $_REQUEST['page'] : 1 ;
					$data=postModel::getSomePosts($page);
					require_once ($view['home']);
		}

		protected function error(){
			global $rep, $view;
			$data[0]='unknown action';
			require_once ($view['error']);
		}

	}
?>