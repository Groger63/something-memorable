<?php 

class DAL{

	///USERS

	///get

	static function  getUsers()
	{
		$req='SELECT * FROM user';
		$res= BD::getInstance()->prepareAndExecuteQueryWithResult($req,'');
		$users = array();
		foreach ($res as $user) {
			$users[]=new user($user["username"],$user["display_name"],$user['role'],$user['password_hash'],$user['profile_pic']);
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
			$user=new user($data["username"],$data["display_name"],$data["role"],$data['profile_pic']);
		}
		return $user;
	}

	static function  getUserWithoutPwd($username)
	{
		$req='SELECT * FROM user WHERE username=?';
		$param  = array(0 => array($username, PDO::PARAM_STR));
		$res= BD::getInstance()->prepareAndExecuteQueryWithResult($req,$param);
		$user=NULL;
		foreach ($res as $data) {
			$user=new user($data["username"],$data["display_name"],$data["role"],$data['profile_pic']);
		}
		return $user;
	}

	///add 
	static function addUser($username,$displayname,$role,$password,$profile_pic){
		// echo $username.$displayname.$role.$password.$profile_pic;
		$req='INSERT INTO user VALUES(?,?,?,?,?)';
		$param  = array(0 => array($username, PDO::PARAM_STR) ,1 => array($password, PDO::PARAM_STR),2 => array($displayname, PDO::PARAM_STR),3 => array($role, PDO::PARAM_STR),4 => array($profile_pic, PDO::PARAM_STR));
		BD::getInstance()->prepareAndExecuteQueryWithoutResult($req,$param);
	}

	///delete
	
	static function deleteUser($login){
		$req='DELETE FROM user WHERE username=?';
		$param  = array(0 => array($login, PDO::PARAM_STR));
		BD::getInstance()->prepareAndExecuteQueryWithoutResult($req,$param);
	}
		
	///edit

	static function changepassUser($login,$newPwd){
		$req='UPDATE user SET password_hash = ? WHERE username=?';
		$param  = array(0 => array($newPwd, PDO::PARAM_STR),1 => array($login, PDO::PARAM_STR));
		BD::getInstance()->prepareAndExecuteQueryWithoutResult($req,$param);
	}

	static public function changedisplaynameUser($username,$displayname){
		$req='UPDATE user SET display_name = ? WHERE username=?';
		$param  = array(0 => array($displayname, PDO::PARAM_STR),1 => array($username, PDO::PARAM_STR));
		BD::getInstance()->prepareAndExecuteQueryWithoutResult($req,$param);
	}
	

	static public function changepicUser($username,$pic){
		$req='UPDATE user SET profile_pic = ? WHERE username=?';
		$param  = array(0 => array($pic, PDO::PARAM_STR),1 => array($username, PDO::PARAM_STR));
		BD::getInstance()->prepareAndExecuteQueryWithoutResult($req,$param);
	}


	///POSTS

	///get

	static function getAllposts(){
		$req='SELECT * FROM post ORDER BY date_time_posted ';
		$res= BD::getInstance()->prepareAndExecuteQueryWithResult($req,'');
		$posts = array();
		foreach ($res as $post) {
			$posts[]=new post($post['post_id'],$post['username'],$post['post_title'],$post['post_content'],$post['date_time_posted'],self::getImagesPost($post['post_id']),self::getVote_post($post['post_id']),$post['date_last_edited'],self::getCommentbypost($post['post_id']));
		}
		return $posts;
	}

	static function getPost($post_id){
		$req='SELECT * FROM post WHERE post_id=?';
		$param  = array(0  => array($post_id, PDO::PARAM_STR));

		$res= BD::getInstance()->prepareAndExecuteQueryWithResult($req,$param);
		$post = array();
		foreach ($res as $post) {
			$post=new post($post['post_id'],$post['username'],$post['post_title'],$post['post_content'],$post['date_time_posted'],self::getImagesPost($post['post_id']),self::getVote_post($post['post_id']),$post['date_last_edited'],self::getCommentbypost($post['post_id']));		}
		return $post;
	}

	static function getPostsByUsername($username){
		$req='SELECT * FROM post WHERE username=?';
		$param  = array(0  => array($username, PDO::PARAM_STR));

		$res= BD::getInstance()->prepareAndExecuteQueryWithResult($req,$param);
		$posts = array();
		foreach ($res as $post) {
			$posts[]=new post($post['post_id'],$post['username'],$post['post_title'],$post['post_content'],$post['date_time_posted'],self::getImagesPost($post['post_id']),self::getVote_post($post['post_id']),$post['date_last_edited'],self::getCommentbypost($post['post_id']));		}
		return $posts;
	}

	static function getPostsByTitle($title){
		$title='%'.$title."%";
		$req='SELECT * FROM post WHERE post_title LIKE ?';
		$param  = array(0  => array($title, PDO::PARAM_STR));

		$res= BD::getInstance()->prepareAndExecuteQueryWithResult($req,$param);
		$posts = array();
		foreach ($res as $post) {
			$posts[]=new post($post['post_id'],$post['username'],$post['post_title'],$post['post_content'],$post['date_time_posted'],self::getImagesPost($post['post_id']),self::getVote_post($post['post_id']),$post['date_last_edited'],self::getCommentbypost($post['post_id']));		}
		return $posts;
	}	


	///others get to be done: the one by keyword should test the whole thing: title content + tags, even user name

	///update

	static function updatePost($postId,$post_title,$post_content){
		$tmpeditdate=getdate(); //strptime marche pas
		$day=$tmpeditdate['mday'];
		$month=$tmpeditdate['mon'];
		$year=$tmpeditdate['year'];
		$editdate=$year."-".$month."-".$day;//conversion fr->ISO (format bdd)

		$req='UPDATE post SET post_title = ?, post_content=?,date_last_edited=? WHERE post_id=?';
		$param  = array(0 => array($post_title, PDO::PARAM_STR),1 => array($post_content, PDO::PARAM_STR),2 => array($editdate, PDO::PARAM_STR),3 => array($postId, PDO::PARAM_STR));
		BD::getInstance()->prepareAndExecuteQueryWithoutResult($req,$param);
	}

	///delete

	static function deletePost($postId){

		$req='DELETE FROM post WHERE post_id=?';
		$param  = array(0 => array($postId, PDO::PARAM_STR));
		BD::getInstance()->prepareAndExecuteQueryWithoutResult($req,$param);
	}

	///add
	
	static function addPost($username,$post_title,$post_content){
		$tmpeditdate=getdate(); //strptime marche pas
		$day=$tmpeditdate['mday'];
		$month=$tmpeditdate['mon'];
		$year=$tmpeditdate['year'];
		$editdate=$year."-".$month."-".$day;//conversion fr->ISO (format bdd)

		$req='INSERT INTO post (username, post_title, post_content, date_time_posted,date_last_edited )VALUES(?,?,?,?,?)';
		$param  = array(0 => array($username, PDO::PARAM_STR),1 => array($post_title, PDO::PARAM_STR),2 => array($post_content, PDO::PARAM_STR),3 => array($editdate, PDO::PARAM_STR),4 => array($editdate, PDO::PARAM_STR));
		BD::getInstance()->prepareAndExecuteQueryWithoutResult($req,$param);
		return BD::getInstance()->lastInsertId();
	}



	///VOTES

	///get

	static function getVote_post($post_id){

		$req='SELECT * FROM vote_post WHERE post_id=?';
		$param  = array(0  => array($post_id, PDO::PARAM_STR));

		$res= BD::getInstance()->prepareAndExecuteQueryWithResult($req,$param);
		$vote_posts = array();
		foreach ($res as $vote_post) {
			$vote_posts[]=new vote_post($vote_post['post_id'],self::getUserWithoutPwd($vote_post['username']));
		}
		return $vote_posts;
	}

	static function existVote_post($post_id, $username){

		$req='SELECT * FROM vote_post WHERE post_id=? AND username=?';
		$param  = array(0 => array($post_id, PDO::PARAM_STR), 1 => array($username, PDO::PARAM_STR));

		if($res= BD::getInstance()->prepareAndExecuteQueryWithResult($req,$param)==NULL){
			return NULL;
		}
		return true;
	}

	///add

	static function setVote_post($post_id,$username){
		$req='INSERT INTO vote_post VALUES(?,?)';
		$param  = array(0 => array($post_id, PDO::PARAM_STR) , 1 => array($username, PDO::PARAM_STR));
		BD::getInstance()->prepareAndExecuteQueryWithoutResult($req,$param);
	}


	///delete

	static function unsetVote_post($post_id,$username){
		$req='DELETE FROM vote_post WHERE post_id = ? AND username = ?';
		$param  = array(0 => array($post_id, PDO::PARAM_INT), 1 => array($username, PDO::PARAM_STR));
		BD::getInstance()->prepareAndExecuteQueryWithoutResult($req,$param);
	}

	///IMAGES

	///get

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

	static public function getImage($img_id)
	{		
		$req='SELECT * FROM image WHERE img_id=?';
		$param  = array(0  => array($img_id, PDO::PARAM_STR));
		$res= BD::getInstance()->prepareAndExecuteQueryWithResult($req,$param);
		$img = array();
		foreach ($res as $image) {
			$img=new image($image["img_id"],$image["username"],$image["post_id"],$image["caption"],$image["file_path"],$image["location"],$image["coordinates"]);
		}
		return $img;
	}

	///add

	static function addimagePost($post_id,$username,$path,$caption='A pure beauty',$location='somewhere',$coordinates=NULL){
		$imgId=md5($post_id.$username.$path);

		$req='INSERT INTO image VALUES(?,?,?,?,?,?,?)';
		$param  = array(0 => array($imgId, PDO::PARAM_STR) ,
			1 => array($username, PDO::PARAM_STR), 
			2 => array($post_id	, PDO::PARAM_STR), 
			3 => array($caption	, PDO::PARAM_STR), 
			4 => array($path	, PDO::PARAM_STR),
			5 => array($location, PDO::PARAM_STR),
			6 => array($coordinates, PDO::PARAM_STR));
		BD::getInstance()->prepareAndExecuteQueryWithoutResult($req,$param);
	}

	///delete
	static function deleteImg($imgId){
		$req='DELETE FROM image WHERE img_id = ?';
		$param  = array(0 => array($imgId, PDO::PARAM_INT));
		BD::getInstance()->prepareAndExecuteQueryWithoutResult($req,$param);
	}


	///COMMENT 

	///get

	static function  getComment($id)
	{
		$req='SELECT * FROM comment WHERE comment_id=?';
		$param  = array(0 => array($id, PDO::PARAM_STR));
		$res= BD::getInstance()->prepareAndExecuteQueryWithResult($req,$param);
		$comment=NULL;
		foreach ($res as $data) {
			$comment=new comment($data["comment_id"],self::getUserWithoutPwd($data["username"]),$data["post_id"],$data['message'],$data['date_posted'],$data['in_reply_to']);
		}
		return $comment;
	}
	//by post
	
	static function  getCommentbypost($id)//postid
	{
		$req='SELECT * FROM comment WHERE post_id=?';
		$param  = array(0 => array($id, PDO::PARAM_STR));
		$res= BD::getInstance()->prepareAndExecuteQueryWithResult($req,$param);
		$comments=array();
		foreach ($res as $data) {
			$comments[]=new comment($data["comment_id"],self::getUserWithoutPwd($data["username"]),$data["post_id"],$data['message'],$data['date_time_posted'],$data['in_reply_to']);
		}
		return $comments;
	}

	///add

	static function  addComment($username,$post_id,$in_reply_to, $message)//postid
	{
		$tmpeditdate=getdate(); //strptime marche pas
		$day=$tmpeditdate['mday'];
		$month=$tmpeditdate['mon'];
		$year=$tmpeditdate['year'];
		$editdate=$year."-".$month."-".$day;//conversion fr->ISO (format bdd)

		$req='INSERT INTO comment (username, post_id, in_reply_to, message, date_time_posted )VALUES(?,?,?,?,?)';
		$param  = array(0 => array($username, PDO::PARAM_STR),1 => array($post_id, PDO::PARAM_STR),2 => array($in_reply_to, PDO::PARAM_STR),3 => array($message, PDO::PARAM_STR),4 => array($editdate, PDO::PARAM_STR));
		$res= BD::getInstance()->prepareAndExecuteQueryWithoutResult($req,$param);
		return BD::getInstance()->lastInsertId();
	}

	///delete

	///edit


}


?>