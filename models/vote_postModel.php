<?php
	class vote_postModel{
		static function setVote_post($post_id,$username){
			DAL::setVote_post($post_id,$username);
		}

		static function unsetVote_post($post_id,$username){
			DAL::unsetVote_post($post_id,$username);
		}

		static function existVote_post($post_id,$username){
			return DAL::existVote_post($post_id,$username);
		}


	}
?>