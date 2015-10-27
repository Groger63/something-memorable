<?php
class frontController{

		
	function __construct() {


				global $rep, $view;


				$data=DAL::getSomething();
				$errorView[] =	"ceci est une réussite!";
				require_once ($view['error']);


		}
	}



?>