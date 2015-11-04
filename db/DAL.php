<?php 

class DAL{

	///USERS
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

	static function  getUser($username,$pwd)
	{
		$req='SELECT * FROM user WHERE username=? AND password_hash=?';
		$param  = array(0 => array($username, PDO::PARAM_STR) , 1 => array($pwd, PDO::PARAM_STR));
		$res= BD::getInstance()->prepareAndExecuteQueryWithResult($req,$param);
		$user=NULL;
		foreach ($res as $data) {
			$user=new user($data["username"],$data["display_name"],$data["role"],$data["password_hash"],$data["salt"]);
		}
		return $user;
	}

	static function addUser($username,$displayname,$role,$password,$salt){
		$req='INSERT INTO user VALUES(?,?,?,?,?)';
		$param  = array(0 => array($username, PDO::PARAM_STR) , 1 => array($salt, PDO::PARAM_STR),2 => array($password, PDO::PARAM_STR),3 => array($displayname, PDO::PARAM_STR),4 => array($role, PDO::PARAM_STR));
		BD::getInstance()->prepareAndExecuteQueryWithResult($req,$param);
	}
	
	static function deleteUser($login){
		$req='DELETE FROM user WHERE username=?';
		$param  = array(0 => array($login, PDO::PARAM_STR));
		BD::getInstance()->prepareAndExecuteQueryWithoutResult($req,$param);
	}
	
	static function changePwd($login,$newPwd){
		$req='UPDATE user SET password_hash = ? WHERE username=?';
		$param  = array(0 => array($newPwd, PDO::PARAM_STR),1 => array($login, PDO::PARAM_STR));
		BD::getInstance()->prepareAndExecuteQueryWithoutResult($req,$param);
	}
	

	///POSTS

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

	static function getPost($post_id){
		$req='SELECT * FROM post WHERE post_id=?';
		$param  = array(0  => array($post_id, PDO::PARAM_STR));

		$res= BD::getInstance()->prepareAndExecuteQueryWithResult($req,$param);
		$post = array();
		foreach ($res as $post) {
			$post=new post($post['post_id'],$post['username'],$post['post_title'],$post['post_content'],$post['date_time_posted']);
		}
		return $post;
	}


}


?>