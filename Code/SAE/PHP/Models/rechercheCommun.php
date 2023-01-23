<?php

    class RechercheCommun {
        
        private $dataBase; //La connexion avec la base de données
        private $resultat; //Tableau avec le résultat final de la recherche
        private $resultatParRequete; //Tableau de resultat par requete tconst => [nconst] ou nconst => [tconst] selon le typeResultat
        private $typeResultat; // Film ou Personne

        public function __construct($type){
            /*
                Initialisation des variables
            */
            $this->dataBase = Model::Model();
            $this->resultat = array();
            $this->resultatParRequete = array();
            $this->type = $type;
        }


        public function ajoutRecherche($const){
            /*
                in : tconst ou nconst
                out : Tableau des films ou personnes commun
                Cette fonction récupèrera, selon le type, les films que la personne a joué ou les personnes qui ont joué dans le films puis ajoute dans resultatsParRequete
                Après avoir récupérer, s'il s'agit du permier argument alors il ajouetra directement dans le résultat sinon il fera une intersection entre le résultat et les données récupérées
                Si type == Personne alors il recherche les personnes par titre
                Sinon il recherche les titres par personnes 

            */
            $resultatParRequeteCopie = $this->resultatParRequete;
            $resulatCopie = $this->resultat;

            try{

                $first = false;
                if(empty($this->result)){ //Vérifie si celui-ci s'agit de la première Personne ou du premier film
                    $first = true;
                }elseif(isset($this->resultatParRequete[$const]) ){ //Vérifie si l'acteur est déjà recherché ou non
                    throw new Exception('La personne ou le film est présent dans la liste recherchée');
                }

                $this->resultatParRequete[$const] = [];
                if($this->type == 'Personne'){
                    $resultatRequete = $this->dataBase->getPersonneByTconst($const);//tableau : { indice => [nconst]}
                }else{
                    $resultatRequete = $this->dataBase->getTitreByNconst($const);//tableau : { indice => [tconst]}
                }
                
                foreach ($resultatRequete as $val ){ 
                    array_push($this->resultatParRequete[$const],$val[0]);
                }

                if($first){
                    $this->resultat = $this->resultatParRequete[$const];
                }else{
                    array_intersect($this->resultat,$this->resultatParRequete[$const]); //Intersection du résultat présent avec la nouvelle recherche
                }

            }catch (Exception $e){
                echo 'Exception reçue : ',  $e->getMessage(), "\n";
                $this->resultatParRequete = $resultatParRequeteCopie ;
                $this->resultat = $resulatCopie;

            }
            
            return $this->resultat;
        }



        public function supprimerRecherche($const){
            /*
                in : tconst ou nconst
                out : Tableau des films ou personnes commun
                Cette fonction enlève le const en arguement de resultatParRequete puis fait l'intersection entre les valeurs restantes dans resultatParRequete
            */

            try{

                if(empty($this->result)){ //Vérifie si celui-ci s'agit de la première Personne ou du premier film
                    throw new Exception('Aucune recherche effectuée');
                }elseif(!isset($this->resultatParRequete[$const]) ){ //Vérifie si l'acteur est déjà recherché ou non
                    throw new Exception('La personne ou le film n\'a pas été recherché');
                }

                unset($this->resultatParRequete[$const]);

                if(empty($this->resultatParRequete) ){
                    $this->resultat = [];
                }else{
                    $nouveauResultat = [];

                    foreach ($this->resultatParRequete as $resultatRequete){//Remet en place des resultats recherchés précedemment
                        if(empty($nouveauResultat)){
                            $this->nouveauResultat = $resultatRequete;
                        }else{
                            array_intersect($nouveauResultat,$resultatRequete); 
                        }
                    }
                    $this->resultat = $nouveauResultat;
                }


            }catch (Exception $e){
                echo 'Exception reçue : ',  $e->getMessage(), "\n";

            }

            return $this->resultat;

        }

        public function getRecherche(){
            /*
                Renvoie le résultat actuel des films ou personnes commun
            */
            return $this->resultat;
        }

        public function changementType($type){
            /*
                in : Personne ou Titre
                Change le type de recherche commun et remets tout à 0
            */
            try {
                if($type != 'Personne' && $type != 'Titre'){
                    throw new Exception('Veuillez désigner si celui-ci s\'agit d\'une recherche de Personne commun ou Acteur commun');
                }
                //Re-initialisation les variables
                $this->resultat = array();
                $this->resultatParRequete = array();
                $this->type = $type;
            }catch (Exception $e){
                echo 'Exception reçue : ',  $e->getMessage(), "\n";
            }
        }

    }

?>  