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

		static public function getUserWithoutPassword($username)
		{
			return DAL::getUserWithoutPwd($username);
		}

		static public function existUser($username)
		{
			$user=DAL::getUserWithoutPwd($username);
			return isset($user);
		}

		static public function addUser($username,$displayname,$role,$password,$salt)
		{
			DAL::addUser($username,$displayname,$role,$password,$salt);
		}
	}

?>