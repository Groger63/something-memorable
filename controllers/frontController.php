<?php
class frontController{

		
	function __construct() {


				global $rep, $view;


				$data=userModel::getUsers();
				//$errorView[] =	$data;
				require_once ($view['error']);


		}
	}



?>