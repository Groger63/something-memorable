<?php
	class comment{
		private $comment_id; 
		public function getComment_id(){
			return $this->comment_id;
		}	
		private $user;
		public function getUser(){
			return $this->user;
		}	
		private $post_id;
		public function getPost_id(){
			return $this->post_id;
		}	
		private $in_reply_to;
		public function getIn_reply_to(){
			return $this->in_reply_to;
		}	
		private $message;
		public function getMessage(){ 
			return $this->message;
		}	
		private $date_time_posted;
		public function getDate_time_posted(){
			return $this->date_time_posted;
		}	

		function __construct($id,$user,$post_id,$msg,$date_posted,$in_reply_to=null){
			$this->comment_id=$id;
			$this->user=$user;
			$this->post_id=$post_id;
			$this->message=$msg;
			$this->date_posted=$date_posted;
			$this->in_reply_to=$in_reply_to;
		}
	}
	
?>