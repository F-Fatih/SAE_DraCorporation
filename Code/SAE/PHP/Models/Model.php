<?php

class Model
{
    /**
     * Attribut contenant l'instance PDO
     */
    private $bd;

    /**
     * Attribut statique qui contiendra l'unique instance de Model
     */
    private static $instance = null;

    /**
     * Constructeur : effectue la connexion à la base de données.
     */
    private function __construct()
    {
        include_once ("../credentials.php");
        $this->bd = new PDO($dsn, $login, $mdp);
        $this->bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->bd->query("SET nameS 'utf8'");
    }

    /**
     * Méthode permettant de récupérer un modèle car le constructeur est privé (Implémentation du Design Pattern Singleton)
     */
    public static function getModel()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
      * Retourne les personnes qui ont participé au Titre
      * @return [array] Contient les nconst qui ont participé au tconst
      */
     public function getPersonneByTconst($tconst)
     {
         $req = $this->bd->prepare('SELECT DISTINCT nconst FROM titleprincipals where tconst= :tconst');
         $req->bindValue("tconst",$tconst);
         $req->execute();
         return $req->fetchall();
     }
    
    
    /**
      * Retourne les titre que la personne a participé
      * @return [array] Contient les tconst que le nconst a participé
      */
     public function getTitreByNconst($nconst)
     {
         $req = $this->bd->prepare('SELECT DISTINCT tconst FROM titleprincipals where nconst= :nconst');
         $req->bindValue("nconst",$nconst);
         $req->execute();
         return $req->fetchall();
     }

}
