<?php 
	//homeController.php
	class homeController{
		function __construct($action) {

				global $rep, $view;
			switch ($action) {//Suivant le rôle, on définit les actions possibles
				case 'home':
					$page=isset($_REQUEST['page']) ? $_REQUEST['page'] : 1 ;
					$data=postModel::getSomePosts($page);
					require_once ($view['home']);
					break;

				default:

					$data=array();
					$data[0]="We're sorry, something somewhere went wrong...";
					$data[1]="This must be a 404";
					require_once ($view['error']);
					break;
			}
		}
	}

?>