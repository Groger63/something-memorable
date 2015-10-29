<?php 

class DAL{

	static function  getUsers()
	{
		$req='SELECT * FROM user';
		$res= BD::getInstance()->prepareAndExecuteQueryWithResult($req,'');
		$users = array();
		foreach ($res as $user) {
			$users[]=new user($user["name"],$user["function"]);
		}


		return $users;
	}




}


?>