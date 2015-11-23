<?php
	class commentModel{
		public static function getCommentbypost($postID){
			return DAL::getCommentbypost($postID);
		}
		
		public static function addComment($username,$post_id,$in_reply_to, $message){
			return DAL::addComment($username,$post_id,$in_reply_to, $message);
		}


	}
?>