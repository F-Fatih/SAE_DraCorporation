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
         return $req->fetchAll(PDO::FETCH_ASSOC);
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
         return $req->fetchAll(PDO::FETCH_ASSOC);
     }

     /**
      * Retourne les titre que la personne a participé
      * @return [array] Contient les tconst que le nconst a participé
      */
     public function getTitleInformation($tconst){
        $req = $this->bd->prepare('SELECT tconst, titleType, primaryTitle, originalTitle, isAdult, startYear, endYear, runtimeMinutes, genres FROM titlebasics where tconst= :tconst');
        $req->bindValue("tconst",$tconst);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);

     }

     public function getPersonneInformation($nconst){
        $req = $this->bd->prepare('SELECT tconst, titleType, primaryTitle, originalTitle, isAdult, startYear, endYear, runtimeMinutes, genres FROM titlebasics where tconst= :tconst');
        $req->bindValue("tconst",$tconst);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
     }

     public function rechercheTitreAvecArgu($arguRecherche){
            $queryFilm ="SELECT tconst, primarytitle FROM titlebasics WHERE similarity(lower(unaccent(primarytitle)), lower(unaccent(:arg))) > 0.4";
            $resultFilms = $this->bd->prepare($queryFilm);
            $resultFilms->bindValue(':arg', $this->bd->quote($arguRecherche));
            $resultFilms->execute();
            return $resultFilms->fetchAll(PDO::FETCH_ASSOC);
     }

     public function recherchePersonneAvecArgu($arguRecherche){
        $queryPerso = "SELECT nconst, primaryname FROM namebasics WHERE similarity(lower(unaccent(primaryname)), lower(unaccent(:arg))) > 0.4";
        $resultPerso = $this->bd->prepare($queryPerso);
        $resultPerso->bindValue(':arg', $this->bd->quote($arguRecherche));
        $resultPerso->execute();
        return $resultPerso->fetchAll(PDO::FETCH_ASSOC);
 }
}
