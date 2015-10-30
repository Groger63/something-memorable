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
			}

?>