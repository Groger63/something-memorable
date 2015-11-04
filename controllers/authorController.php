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

		protected function vote(){//$post don't vote for own post
			global $rep, $view;
			$data=array();
			$data[0]="We're sorry, something somewhere went wrong...";
			$data[1]="Can't vote yet";
			$data[2]="Author";
			require_once ($view['error']);
		}


	}
?>