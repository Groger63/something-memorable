<?php
	class frontController{

			
		function __construct() {


			global $rep, $view,$actions;


			session_start();

			if(empty($_FILES) && empty($_POST) && isset($_SERVER['REQUEST_METHOD']) && strtolower($_SERVER['REQUEST_METHOD']) == 'post'){ //catch file overload error...
			    $postMax = ini_get('post_max_size'); //grab the size limits...
			    $data[0]="<p style=\"color: #F00;\">\nPlease note files larger than {$postMax} will result in this error!<br>Please be advised this is not a limitation in the Website, This is a limitation of the hosting server.<br>For various reasons they limit the max size of uploaded files, if you have access to the php ini file you can fix this by changing the post_max_size setting.<br> If you can't then please ask your host to increase the size limits, or use the FTP uploaded form</br>Have a nice day, and don't forget your towel.</p>"; // echo out error and solutions...
        		require_once ($view['error']);
			}



			$action=isset($_REQUEST['action']) ? $_REQUEST['action'] : 'home' ;
			
			if(in_array($action, $actions)){
				$role = isset($_SESSION['role']) ? $_SESSION['role'] : 'unregisteredUser' ;
				$controller=$role.'Controller';
				$cont=new $controller($action);
			}
			else $this->error404();


		}
		private function error404(){
		
			global $rep, $view,$actions;

			header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
			$data[0]="We're sorry, something somewhere went wrong...";
			$data[1]="This is a 404";
			$data[2]="Page not found";
			require_once ($view['error']);
		}

	}
?>