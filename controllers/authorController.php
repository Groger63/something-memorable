<?php
	 class authorController extends registeredUserController{
	 	public $AUTHOR_ACTION=array('addpost','editpost','vote');

		public function __construct($action){
			$this->SPECIFIC_ACTION=array_merge ($this->SPECIFIC_ACTION,$this->AUTHOR_ACTION);
			parent::__construct($action);
		}

		protected function addpost(){//$post
			global $rep, $view;
			$data=array();
			$data[0]="We're sorry, something somewhere went wrong...";
			$data[1]="Can't add psot yet";
			$data[2]="Author";
			require_once ($view['error']);
		}


		protected function editpost(){//$post
			global $rep, $view;
			$data=array();
			$data[0]="We're sorry, something somewhere went wrong...";
			$data[1]="Can't edit post yet";
			$data[2]="Author";
			require_once ($view['error']);
		}

		public function vote(){
			global $rep, $view;

			$post_id=isset($_REQUEST['id_adv']) ? $_REQUEST['id_adv'] : NULL ;
			$username=isset($_SESSION['username']) ? $_SESSION['username'] : NULL ;

			if(postModel::getPost($post_id)==NULL){
				$data=array();
				$data[0]="We're sorry, something somewhere went wrong...";
				$data[1]="The post you're trying to vote for doesn't exist!";
				require_once ($view['error']);
			}
			if(postModel::getPost($post_id)->getUsername()==$username){
				$data=array();
				$data[0]="We're sorry, something somewhere went wrong...";
				$data[1]="You can't vote for your own post!";
				require_once ($view['error']);
			}
			elseif ($username==NULL) {
				$data=array();
				$data[0]="We're sorry, something somewhere went wrong...";
				$data[1]="Please login first";
				require_once ($view['error']);
			}
			else{

				$vote=vote_postModel::existVote_post($post_id,$username);
				if($vote){
					vote_postModel::unsetVote_post($post_id,$username);
				}
				else {
					vote_postModel::setVote_post($post_id,$username);
				}
				$this->showadventure();
			}

		}


	}
?>