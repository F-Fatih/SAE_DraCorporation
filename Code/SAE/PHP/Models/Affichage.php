<?php
    session_start();

    class Affichage{

        private $result;

        private $model;

        private function __construct(){
            $this->model = Model::getModel();
            
        }

        /**
         * Méthode permettant de récupérer un modèle car le constructeur est privé (Implémentation du Design Pattern Singleton)
         */
        public static function getAffichage()
        {
            if (self::$instance === null) {
                self::$instance = new self();
            }
            return self::$instance;
        }


        public function getPersonneInfo($tconst){
            $data = array();

            try{

                $data['personne'] = $this->model->getPersonneInformation($tconst);


            }catch (Exception $e){
                echo 'Exception reçue : '. $e->getMessage(). "\n";

            }

            return $data;
        }

        public function getTitleInfo($nconst){
            $data = array();

            try{

                $data['titre'] = $this->model->getTitleInformation($nconst);


            }catch (Exception $e){
                echo 'Exception reçue : '.  $e->getMessage(). "\n";

            }

            return $data;
        }

        public function getInformation($recherche){
            $data = array();

            try{
                
                $dataPersonnes = array();
                $dataTitres = array();
                if (isset($recherche['personnes'])){
                    foreach ($recherche['personnes'] as $personne){
                        $dataUniquePersonne = $this->model->getPersonneInformation($personne);
                        $dataPersonnes[] = $dataUniquePersonne;
                    }
                    $data['personnes'] = $dataPersonnes;
                }
                
                if (isset($recherche['titres'])){
                    foreach ($recherche['titres'] as $titre){
                        $dataUniqueTitre = $this->model->getTitleInformation($titre);
                        $dataTitres[] = $dataUniqueTitre;
                    }
                    $data['titres'] = $dataTitres;
                }
                
            }catch (Exception $e){
                echo 'Exception reçue : '.  $e->getMessage(). "\n";

            }

            return $data;
            
        }

    }

