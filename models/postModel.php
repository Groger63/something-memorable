<?php
	class postModel{
		static public function getAllposts()
		{
			return DAL::getAllposts();
		}

		public static function  getSomePosts($p){
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
	}
?>