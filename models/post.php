<?php
	class post{
		private $post_id;
		public function getPost_id(){
			return $this->post_id;
		}
		private $username;
		public function getUsername(){
			return $this->username;
		}
		private $post_title;
		public function getPost_title(){
			return $this->post_title;
		}
		private $post_content;
		public function getPost_content(){
			return $this->post_content;
		}
		private $date_time_posted;
		public function getDate_time_posted(){
			return $this->date_time_posted;
		}
		private $images;
		public function getImagesPost(){
			return DAL::getImagesPost($this->post_id);
		}

		function __construct($id,$un,$pt,$pc,$dt){
			$this->post_id=$id;
			$this->username=$un;
			$this->post_title=$pt;
			$this->post_content=$pc;
			$this->date_time_posted=$dt;
		}



	}
?>