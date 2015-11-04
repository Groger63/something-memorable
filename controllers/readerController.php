<?php
	 class readerController extends registeredUserController{
		public  $READER_ACTION=array('likepost','commentpost','editcomment','deletecomment');

		public function __construct($action){
			$this->SPECIFIC_ACTION=array_merge ($this->SPECIFIC_ACTION,$this->READER_ACTION);
			parent::__construct($action);
		}


		public function likepost(){
			//do something that can be done by reader
			global $rep, $view;
			$data=array();
			$data[0]="We're sorry, something somewhere went wrong...";
			$data[1]="Can't like post yet";
			$data[2]="reader";
			require_once ($view['error']);
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