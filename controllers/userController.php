<?php
	abstract class userController{

		protected  $USER_ACTION	=array('home','showadventure','search');

		public function __construct($action='home'){
			if(in_array($action, $this->USER_ACTION)){
				$this->$action();
			}
			elseif (in_array($action, $this->SPECIFIC_ACTION ))
				$this->$action();
			else $this->error403();
		}

		


		protected function search(){
			global $rep, $view;
			$research_types=array('keyword','author','tag');



			if(isset($_POST['search']))
			{
				$researchtype=isset($_POST['searchtype']) ? $_POST['searchtype'] : 'keyword' ;
				$researchtag=isset($_POST['searchtags']) ? $_POST['searchtags'] : '' ;

				$host  = $_SERVER['HTTP_HOST'];
				$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
				$extra = 'search/'.$researchtype."/".$researchtag;

				header("Location: http://$host$uri/$extra");
			}
			else
			{
				$researchtype=isset($_GET['arg1']) ? $_GET['arg1'] : 'keyword' ;
				$researchtag=isset($_GET['arg2']) ? $_GET['arg2'] : '' ;

				if(in_array($researchtype, $research_types)){
					switch($researchtype){
						case 'author' :
							if($researchtag=='') $data['data']=postModel::getAllposts();
							else{
								$data['data']=postModel::getPostsByUsername($researchtag);
							}
							require_once ($view['search']);
							break;
						case 'keyword' :
							if($researchtag=='') $data['data']=postModel::getAllposts();
							else{
								$data['data']=postModel::getPostsByTitle($researchtag);
							}
							require_once ($view['search']);
							break;
						case 'tag':
							break;
					}
				}
			}
			require_once ($view['search']);
		}		

		protected function home(){
			global $rep, $view;
			$nbpostsPerPage=2;
			$nbTotal = postModel::getnbTotalposts();//posts
			$nbPages = ceil($nbTotal/$nbpostsPerPage);
			$page=isset($_REQUEST['arg1']) ? $_REQUEST['arg1'] : 1 ;
			if($page<1) $page=1;
			if($page>$nbPages) $page=$nbPages;
			$data['data']=postModel::getSomePosts($page);
			$data['pages']=$nbPages;
			require_once ($view['home']);
		}

		protected function showadventure(){

			global $rep, $view;
			$id_adv = $_REQUEST['arg1'];
			$post = postModel::getPost($id_adv);
			if($post==NULL){
				header($_SERVER["SERVER_PROTOCOL"]." 404 Page not found");
				$data[0]="We're sorry, something somewhere went wrong...";
				$data[1]="The adventure you're looking for doesn't exist (anymore?)";
				require_once ($view['error']);
			}
			else require_once($view['adventure']);
				
		}

		protected function error403(){
			global $rep, $view;

			header($_SERVER["SERVER_PROTOCOL"]." 403 Forbidden access");
			$data[0]="We're sorry, something somewhere went wrong...";
			$data[1]="This is a 403";
			$data[2]="You must log in to access this page";
			require_once ($view['error']);
		}

	}
?>