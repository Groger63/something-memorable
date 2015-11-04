<?php
	 class adminController extends registeredUserController{
	 	public $ADMIN_ACTION=array('kickuser','deletepost','deletecomment','deletephoto');

		public function __construct($action){
			$this->SPECIFIC_ACTION=array_merge ($this->SPECIFIC_ACTION,$this->ADMIN_ACTION);
			parent::__construct($action);
		}


		protected function kickuser(){//$username
			global $rep, $view;
			$data=array();
			$data[0]="We're sorry, something somewhere went wrong...";
			$data[1]="Can't kick user yet";
			$data[2]="admin";
			require_once ($view['error']);
		}

		protected function deletepost(){//$post
			global $rep, $view;
			$data=array();
			$data[0]="We're sorry, something somewhere went wrong...";
			$data[1]="Can't deletepost yet";
			$data[2]="admin";
			require_once ($view['error']);
		}


		protected function deletecomment(){//$comment
			global $rep, $view;
			$data=array();
			$data[0]="We're sorry, something somewhere went wrong...";
			$data[1]="Can't deletecomment yet";
			$data[2]="admin";
			require_once ($view['error']);
		}

		protected function deletephoto(){//$post $photo ($photo = array())
			global $rep, $view;
			$data=array();
			$data[0]="We're sorry, something somewhere went wrong...";
			$data[1]="Can't deletephoto yet";
			$data[2]="admin";
			require_once ($view['error']);
		}

	}
?>