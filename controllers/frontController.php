<?php
	class frontController{

			
		function __construct() {


			global $rep, $view;


			session_start();

			$action=isset($_REQUEST['action']) ? $_REQUEST['action'] : 'home' ;

			$cont=new homeController($action);


		}


		private function deconnexion(){
			modeleUser::deconnexion();
			$_REQUEST['action']=NULL;//On instancie l'action à null pour pouvoir ensuite retourner sur l'accueil facilement
			$cont=new FrontController();
		}

		private function connexion(){
			global $rep, $view, $TmessagesConnexion;//+TmessagesConnexion car il est spécifique à la "vue" connexion
			$Terreurs=array();

			if(isset($_POST['connexion'])){ // si on a déjà cliqué sur "se connecter"
				$login = isset($_POST['login']) ? $_POST['login'] : '';
				$pwd = isset($_POST['password']) ? $_POST['password'] : '';//récupération des variables
				if(Validation::val_login_password($login,$pwd,$TmessagesConnexion)) {//vérification des variables
					if(modeleUser::connexion($login,$pwd));//appel de la connexion
				}
			}
			$cont=new ControleVisiteur('accueil');//Si les variables sont pas bonnes, idem, formulaire
		}

		//Fonction qui sert juste à vérifier si on est co
		private function isConnected(){
			if(!isset($_SESSION['logged']) || !$_SESSION['logged']){
				return false;
			}
			return true;
		}
	}
?>