<?php
	abstract class userController{

		protected  $USER_ACTION	=array('home','showadventure');

		public function __construct($action='home'){
			if(in_array($action, $this->USER_ACTION)){
				$this->$action();
			}
			elseif (in_array($action, $this->SPECIFIC_ACTION ))
				$this->$action();
			else $this->error403();
		}

		protected function home(){
			global $rep, $view;
			$nbpostsPerPage=2;
			$nbTotal = postModel::getnbTotalposts();//posts
			$nbPages = ceil($nbTotal/$nbpostsPerPage);
			$page=isset($_REQUEST['page']) ? $_REQUEST['page'] : 1 ;
			$data['data']=postModel::getSomePosts($page);
			$data['pages']=$nbPages;
			require_once ($view['home']);
		}

		protected function showadventure(){

			global $rep, $view;
			$id_adv = $_REQUEST['id_adv'];
			$post = postModel::getPost($id_adv);
			require_once($view['adventure']);
				
		}

		protected function error403(){
			global $rep, $view;
			$data[0]="We're sorry, something somewhere went wrong...";
			$data[1]="This is a 403";
			$data[2]="You must log in to access this page";
			require_once ($view['error']);
		}

	}
?>