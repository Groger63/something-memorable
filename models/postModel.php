<?php
	class postModel{
		static public function updatePost($postId,$post_title,$post_content){
			DAL::updatePost($postId,$post_title,$post_content);
		}
		static public function getAllposts()
		{
			return DAL::getAllposts();
		}

		static public function getPostsByUsername($author)
		{
			return DAL::getPostsByUsername($author);
		}

		static public function getPostsByTitle($title)
		{
			return DAL::getPostsByTitle($title);
		}

		public static function getSomePosts($p){
			$posts=array();
			$limit=2;
			$start=($p-1)*$limit;
			$end=$start + $limit;
			$nbTotalPosts=self::getnbTotalposts();
			if($end>$nbTotalPosts){
				$end=$nbTotalPosts;
			}
			if($start<0){
				$start=0;
			}
			$allPosts=self::getAllposts();
			for($i=$start;$i<$end;$i++) {
				$posts[]=$allPosts[$i];
			}
			return $posts;
		}

		public static function getnbTotalposts(){
			return count(self::getAllposts());
		}


		public static function getPost($post_id){
			return DAL::getPost($post_id);
		}

		public static function deletePost($post_id){
			//delete img
			//first get the post
			$post=self::getPost($post_id);
			//post->getImg
			$img=$post->getImagesPost();
			//foreach img delete img in the DB 
			if($img!=NULL){
				foreach ($img as $image) {
					DAL::deleteImg($image->getImg_id());
				}
				//then in the files (somthing like rmdir /images/posts/$postid -R) !!!this section might rise errors...
				$dir='images/posts/'.$post->getPost_id();
				$files = array_diff(scandir($dir), array('.','..')); 
			    foreach ($files as $file) { 
			      (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file"); 
			    } 
			    rmdir($dir); 
			}
			//then get votes
		    $votes=$post->getVote_post();
			//foreach vote, unset it
			if($votes!=NULL){
				foreach ($votes as $vote) {
					DAL::unsetVote_post($vote->getPost_id(),$vote->getUser()->getUsername() );
				}
			}
			DAL::deletePost($post_id);
		}
	}
?>