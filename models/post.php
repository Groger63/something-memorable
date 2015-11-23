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
		private $date_last_edited;
		public function getDate_last_edited(){
			return $this->date_last_edited;
		}
		private $images;
		public function getImagesPost(){
			return $this->images;
		}
		private $votes;
		public function getVote_post(){
			return $this->votes;
		}
		private $comments;
		public function getComments(){
			return $this->comments;
		}

		function __construct($id,$un,$pt,$pc,$dt,$img,$votes,$date_last_edited,$comments){
			$this->post_id=$id;
			$this->username=$un;
			$this->post_title=$pt;
			$this->post_content=$pc;
			$this->date_time_posted=$dt;
			$this->images=$img;
			$this->votes=$votes;
			$this->comments=$comments;
			$this->date_last_edited=$date_last_edited;
		}



	}
?>