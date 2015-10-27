<?php 

class DAL{

	static function  getSomething()
	{
		$req='SELECT * FROM user';
		$res= BD::getInstance()->prepareAndExecuteQueryWithResult($req);
		return $res;
	}




}


?>