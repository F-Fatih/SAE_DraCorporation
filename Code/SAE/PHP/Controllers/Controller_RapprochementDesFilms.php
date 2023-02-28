<?php

class Controller_RapprochementDesFilms extends Controller{

    public function action_initialisation() {
        $data=[];
        $this->render("RapprochementDesFilms", $data);
    }
    
    public function action_default(){
        $this->action_initialisation();
    }
    
    public function action_RapprochementDesFilms(){

        //Parametrage
        require_once("PATH.php");
        ini_set('memory_limit', '10G');
        set_time_limit(480);

        //Connexion DB
        $db = Model::getModel();

        //Algorithme
        /*$start = $_POST['start'];
        $stop = $_POST['stop'];

        $recherche = array("start" => $start, "stop" => $stop);
        $json = json_encode($recherche);
        file_put_contents($JSON_DIR . $start . '_a_' . $stop . ".json", $json);

        $command = "$PYTHON_EXE $PYTHON_DIR\\Algorithme_Rapprochement_des_films.py";
        exec($command, $output, $status);

        if(file_exists($JSON_DIR . $start . '_a_' . $stop . ".json")){
            unlink($JSON_DIR . $start . '_a_' . $stop . ".json");
        }

        $resultat = file_get_contents($JSON_DIR . $start . '_resultat_' . $stop . '.json');
        $resultatAlgo = json_decode($resultat, true);

        if(file_exists($JSON_DIR . $start . '_resultat_' . $stop . '.json')){
            unlink($JSON_DIR . $start . '_resultat_' . $stop . '.json');
        }*/

        $resultatAlgo=array('tt1260582', 'nm0467558', 'tt0124971', 'nm0119876', 'tt3681484');

        $stockage = array();

        //Recuperation des données
        foreach ($resultatAlgo as $key => $value) {

            if ($value != null){

                echo $value;

                if (str_starts_with($value, 'nm')){
                    $nconstData = $db->getActorInformationByNconst($value);
                    $data = array(
                        'const' => $value, 
                        'primaryname' => $nconstData[0]['primaryname'],
                        'birthyear' => $nconstData[0]['birthyear'],
                        'deathyear' => $nconstData[0]['deathyear'],
                        'primaryprofession' => $nconstData[0]['primaryprofession'],
                        'knownfortitles' => array()
                    );
            
                    $knownfortitles = $nconstData[0]['knownfortitles'];
                    $knownfortitlesTconst = explode(",", str_replace(array('{', '}'), "", $knownfortitles)); 
                    foreach ($knownfortitlesTconst as $cle => $valeur) {
                        $tconstData = $db->getMovieInformationByTconst($valeur);
                        $data['knownfortitles'][$valeur] = $tconstData[0]['primarytitle'];
                    }
                
                }
            
                if (str_starts_with($value, 'tt')){
                  $tconstData = $db->getMovieAndRatingInformationByTconst($value);
                  $data = array(
                      'const' => $value,
                      'primarytitle' => $tconstData[0]['primarytitle'],
                      'startyear' => $tconstData[0]['startyear'],
                      'genres' => $tconstData[0]['genres'],
                      'averagerating' => $tconstData[0]['averagerating'],
                      'numvotes' => $tconstData[0]['numvotes'],
                      'description' => $db->getOmdbDescription($value),
                      'affiche' => $db->getOmdbPoster($value),
                  );

                }

                $stockage[$key]=$data;

            }
        
        }

        $finalData = array(
            "data" => $stockage,
        );

        $this->render("RapprochementDesFilms", $finalData);

    }

}

?>
