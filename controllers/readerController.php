<?php
	 class readerController extends registeredUserController{
		public  $READER_ACTION=array('vote','commentpost','editcomment','deletecomment');

		public function __construct($action){
			$this->SPECIFIC_ACTION=array_merge ($this->SPECIFIC_ACTION,$this->READER_ACTION);
			parent::__construct($action);
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

		protected function commentpost(){
			global $rep, $view;
			$data=array();
			$data[0]="We're sorry, something somewhere went wrong...";
			$data[1]="Cant comment post yet";
			$data[2]="reader";
			require_once ($view['error']);
		}

		protected function editcomment(){
			global $rep, $view;
			$data=array();
			$data[0]="We're sorry, something somewhere went wrong...";
			$data[1]="Cant edit comment yet";
			$data[2]="reader";
			require_once ($view['error']);
		}

		protected function deletecomment(){
			global $rep, $view;
			$data=array();
			$data[0]="We're sorry, something somewhere went wrong...";
			$data[1]="Cant delete commennt yet";
			$data[2]="reader";
			require_once ($view['error']);
		}
	}
?>