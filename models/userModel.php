<?php 
	class userModel{
		static public function getUsers()
		{
			return DAL::getUsers();
		}

		static public function getUser($username,$pwd)
		{
			$pwd_hash=hash ( "md5", $pwd);
			return DAL::getUser($username,$pwd_hash);
		}				

		static public function changedisplaynameUser($username,$displayname)
		{
			DAL::changedisplaynameUser($username,$displayname);
		}

		static public function changepicUser($username,$pic)
		{
			DAL::changepicUser($username,$pic);
		}	

		static public function changepassUser($username,$pwd)
		{
			$pwd_hash=hash ( "md5", $pwd);
			DAL::changepassUser($username,$pwd_hash);
		}		

		static public function deleteUser($username)
		{
			//delete picture
			$usr=self::getUserWithoutPassword($username);
			if($usr->getProfile_pic()!="images/users/default.jpg"){
				$dir='images/users/'.$username;
				$files = array_diff(scandir($dir), array('.','..')); 
				foreach ($files as $file) { 
				    (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file"); 
				} 
				rmdir($dir); 
			}
			DAL::deleteUser($username);
		}

		static public function getUserWithoutPassword($username)
		{
			return DAL::getUserWithoutPwd($username);
		}

		static public function existUser($username)
		{
			$user=DAL::getUserWithoutPwd($username);
			return isset($user);
		}

		static public function addUser($username,$displayname,$role,$password,$profilepic)
		{
			DAL::addUser($username,$displayname,$role,$password,$profilepic);
		}
	}

?>