<?php
class frontController{

		
	function __construct() {


				global $rep, $view;


				$data=DAL::getSomething();
				$errorView[] =	$data;
				require_once ($view['error']);


		}
	}



?>