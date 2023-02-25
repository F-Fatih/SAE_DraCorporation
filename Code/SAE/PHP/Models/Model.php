<?php

class Model {

    private $bd;

    private $omdbApi;

    private static $instance = null;

    private function __construct() {
        include_once ("credentials.php");
        $this->bd = new PDO($dsn, $login, $mdp);
        $this->omdbApi = $omdb_key;
        $this->bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->bd->query("SET nameS 'utf8'");
    }

    public static function getModel() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    // MyDataBase
    public function getPersonneByTconst($tconst) {
         $req = $this->bd->prepare('SELECT DISTINCT nconst FROM titleprincipals where tconst= :tconst');
         $req->bindValue(":tconst", $tconst);
         $req->execute();
         return $req->fetchall();
    }
    
    public function getTitreByNconst($nconst) {
         $req = $this->bd->prepare('SELECT DISTINCT tconst FROM titleprincipals where nconst= :nconst');
         $req->bindValue(":nconst", $nconst);
         $req->execute();
         return $req->fetchall();
    }

    public function getActorInformationByNconst($nconst) {
        $req = $this->bd->prepare('SELECT * FROM namebasics where nconst= :nconst');
        $req->bindValue(':nconst',$nconst);
        $req->execute();
        return $req->fetchall();
    }

    public function getMovieInformationByTconst($tconst) {
        $req = $this->bd->prepare("SELECT * FROM titlebasics where tconst= :tconst");
        $req->bindValue(":tconst",$tconst);
        $req->execute();
        return $req->fetchall();
    }

    public function getMovieAndRatingInformationByTconst($tconst) {
        $req = $this->bd->prepare("SELECT * FROM titlebasics JOIN titleratings ON titlebasics.tconst=titleratings.tconst where titlebasics.tconst= :tconst");
        $req->bindValue(":tconst", $tconst);
        $req->execute();
        return $req->fetchall();
    }


    // OMDB API
    public function getOmdbDescription(String $tconst){
        $getContentsOmdb = file_get_contents('http://www.omdbapi.com/?i=' . $tconst . '&plot=full&apikey=' . $this->omdbApi);
        $omdb = json_decode($getContentsOmdb, TRUE);
        
        if ($omdb != null){
            
            if ($omdb["Plot"] == "N/A") {
                return "Description non disponible";
            } else {
                return $omdb["Plot"];
            }

        }

    }

    public function getOmdbAwards(String $tconst){
        $getContentsOmdb = file_get_contents('http://www.omdbapi.com/?i=' . $tconst . '&plot=full&apikey=' . $this->omdbApi);
        $omdb = json_decode($getContentsOmdb, TRUE);

        if ($omdb != null){

            if ($omdb["Awards"] == "N/A") {
                return "Ce filmes n'a pas eu d'Awards";
            } else {
                return $omdb["Awards"];
            }
        
        }

    }

    public function getOmdbPoster(String $tconst){
        $getContentsOmdb = file_get_contents('http://www.omdbapi.com/?i=' . $tconst . '&plot=full&apikey=' . $this->omdbApi);
        $omdb = json_decode($getContentsOmdb, TRUE);
        
        if ($omdb != null){

            if ($omdb["Poster"] == "N/A") {
                return "Content/img/NoImageAvailable.png";
            } else {
                return $omdb["Poster"];
            }

        }

    }

    //Wikipedia affiche
    public function getActorPoster(String $nconst){
        require_once("PATH.php");

        $id = $this->bd->prepare("SELECT nconst, lien FROM afficheacteurs WHERE nconst= :nconst");
        $id->execute(['nconst' => $nconst]);
            
        if ($id->rowCount() > 0) {
            $lien = $id->fetch();
            if ($lien['lien'] != ""){
                return $lien['lien'];
            } else {
                return "Content/img/NoPictureAvailable.png";
            }
        } else {
            $pnconst = array("nconst" => $nconst);
            $json = json_encode($pnconst);
            file_put_contents($JSON_DIR . $nconst . ".json", $json);

            $command = "$PYTHON_EXE $PYTHON_DIR\\AfficheActeurs.py 2>&1";

            try {
                exec($command, $output, $status);
                /*if ($status !== 0) {
                    echo "Erreur lors de l'exécution de la commande: $command";
                    var_dump($output);
                    exit();
                }*/
                
             } catch (Exception $e) {
                echo 'Erreur lors de l\'exécution du script Python : ',  $e->getMessage(), "\n";
             }
                
            $reponse = file_get_contents($JSON_DIR . $nconst . '_resultat' . '.json');
            $resultat = str_replace(array('[', ']', '"'), '', $reponse);

            if(file_exists($JSON_DIR . $nconst . ".json")){unlink($JSON_DIR . $nconst . '.json');}
            if(file_exists($JSON_DIR . $nconst . '_resultat' . '.json')){unlink($JSON_DIR . $nconst . '_resultat' . '.json');}
 
            return $resultat;

        }
        
    }

}
