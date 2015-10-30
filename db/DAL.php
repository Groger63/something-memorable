<?php 

class DAL{

	static function  getUsers()
	{
		$req='SELECT * FROM user';
		$res= BD::getInstance()->prepareAndExecuteQueryWithResult($req,'');
		$users = array();
		foreach ($res as $user) {
			$users[]=new user($user["username"],$user["display_name"],$user['role'],$user['password_hash'],$user['salt']);
		}
		return $users;
	}

	static function getAllposts(){
		$req='SELECT * FROM post';
		$res= BD::getInstance()->prepareAndExecuteQueryWithResult($req,'');
		$posts = array();
		foreach ($res as $post) {
			$posts[]=new post($post["post_id"],$post["username"],$post['post_title'],$post['post_content'],$post['date_time_posted']);
		}
		return $posts;
	}
	static function getImagesPost($post_id){
		$req='SELECT * FROM image WHERE post_id=?';
		$param  = array(0  => array($post_id, PDO::PARAM_STR));
		$res= BD::getInstance()->prepareAndExecuteQueryWithResult($req,$param);
		$images = array();
		foreach ($res as $image) {
			$images[]=new image($image["img_id"],$image["username"],$image["post_id"],$image["caption"],$image["file_path"],$image["location"],$image["coordinates"]);
		}
		return $images;


	}


}


?>