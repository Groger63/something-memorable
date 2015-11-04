<?php
	class vote_post{
		private $post_id;
		public function getPost_id(){
			return $this->post_id;
		}
		private $user;
		public function getUser(){
			return $this->user;
		}

		function __construct($id,$un){
			$this->post_id=$id;
			$this->user=$un;
		}
	}
?>