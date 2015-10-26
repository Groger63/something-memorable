<?php

/**
 * Description of BD.
 * SINGLETON car on veut qu'une seule instance de la base de données.
 * @author Cyril
 * un peu modifié par Roger
 */
final class BD {
    // Variables de la classe BD :
    
    private $dbh = null; // PDO Statement = l'etat de la base. car la connexion retourne un etat que l'on va stocker ici.
    
    private $db_host;
    private $db_base;
    private $db_user;
    private $db_password;
    private static $instance = null; // initialement null.
    
    
    /*
     * Constructeur qui crée l'instance de PDO, méthode qui se connecte à la base passée en arg.
     */
    // public static function __construct() 
  private function __construct(){
        //recupere les variables du fichier config
        global $user, $password, $base, $host ;
        
        $this->db_user = $user;
        $this->db_password = $password;
        $this->db_base =  $base;
        $this->db_host =$host;
        
        //Création de l'instance  de PDO
        try {
          // $this->dbh = new PDO($this->db_host.$this->db_base, $this->db_user, $this->db_password);
            $this->dbh = new PDO("mysql:host=".$this->db_host.";dbname=".$this->db_base, $this->db_user, $this->db_password);
            return $this->dbh;
            
        } catch (PDOException $e) {
            echo "<p> Erreur de connexion à la base de données. </br></p>";
            echo $e->getMessage();
            die();
        }
        echo "connexion reussie";
    }

    /*
     * SINGLETON
     * Fonction qui vérifie qu'il n'y a pas deja d'instance de cette base avant de l'instancier.
     */
  
   public static function getInstance() {
 
     if(is_null(self::$instance)) {
       self::$instance = new BD();  
     }
 
     return self::$instance;
   }
   
    
    /*
     * Fonction qui prepare et execute une requete. 
     * La requete est passée en parametre ainsi que les params à remplacer dans la requete.
     */
   public function prepareAndExecuteQueryWithResult($requete,$param)
   {       
        //Preparation de la requete, retourne un etat :
        $statement = $this->dbh->prepare($requete);
        //Test s'il y a des params
        if (!empty($param))
        {
            //S'il y en a, remplace les " ? " de la requete par nos parametres
            for ($i = 0; $i < count($param); $i++)
            {
                $statement->bindValue($i+1,$param[$i][0],intval($param[$i][1]));
            }
        }
        //Execute la requete
        $statement->execute();

        //Recupère les resultats
        $result = $statement->fetchAll();
           
        // On les retourne
        return $result;       
   }

        /*
     * Fonction qui prepare et execute une requete. 
     * La requete est passée en parametre ainsi que les params à remplacer dans la requete.
     */
   public function prepareAndExecuteQueryWithoutResult($requete,$param)
   {       
       //Preparation de la requete, retourne un etat :
       $statement = $this->dbh->prepare($requete);
       
       //Test s'il y a des params
        if (!empty($param))
        {
            //S'il y en a, remplace les " ? " de la requete par nos parametres
            for ($i = 0; $i < count($param); $i++)
            {
                $statement->bindValue($i+1,$param[$i][0],$param[$i][1]);
            }
        }
        //Execute la requete
        $statement->execute();
       
   }
    
   /*
    * OBLIGATOIRE
    * Fonction qui detruit les resultats obtenus
    */
   public function destroyQueryResults($result)
   {

       $result->closeCursor();
   }
  
   
   /*
    * Fonction qui se deconnecte de la base de donnée en mettant l'etat à null.
    */
   public function destruct()
   {
       $dbh = null;
   }
  
}

?>