<?php

class Controller_recherche extends Controller {

    public function action_default() {
        $this->action_recherche();
    }

    public function action_recherche() {
        if (isset($_GET['search'])){
            $recherche = Recherche::getRecherche();
            $dataConst = $recherche->search($_GET['search']);
            $affichage = Affichage::getAffichage();
            $result = $affichage->getInformation($dataConst);
            $this->render('recherche',$result);
        }else{
            $this->action_error('Pas de recherche fourni');
        }
    }

    public function action_ajouter(){
        if (!isset($_SESSION['resultatRecherche'])){
            if(!isset($_GET['type'])){
                $_SESSION['resultatRecherche'] = new RechercheCommun('Personne');
            }else{
                $_SESSION['resultatRecherche'] = new RechercheCommun($_GET['type']);
            }
        }

        if (!isset($_GET['ajouter'])){
            $dataConst = $_SESSION['resultatRecherche'] -> ajouterRecherche($_GET['ajouter']);
        }
        
        $affichage = Affichage::getAffichage();
        $result = $affichage->getInformation($dataConst);

        $this->render('recherche',$result);


    }

    public function action_supprimer(){

        $dataConst = array();
        if (!isset($_SESSION['resultatRecherche'])){
            if(!isset($_GET['type'])){
                $_SESSION['resultatRecherche'] = new RechercheCommun('Personne');
            }else{
                $_SESSION['resultatRecherche'] = new RechercheCommun($_GET['type']);
            }
        } else{
            if (!isset($_GET['supprimer'])){
                $dataConst = $_SESSION['resultatRecherche'] -> supprimerRecherche($_GET['supprimer']);
            }
        }
        $affichage = Affichage::getAffichage();
        $result = $affichage->getInformation($dataConst);

        $this->render('recherche',$result);


    }

    public function action_changementRecherche(){

        $dataConst = array();
        if (!isset($_SESSION['resultatRecherche'])){
            if(!isset($_GET['type'])){
                $_SESSION['resultatRecherche'] = new RechercheCommun('Personne');
            }else{
                $_SESSION['resultatRecherche'] = new RechercheCommun($_GET['type']);
            }
        }else{
            $_SESSION['resultatRecherche'] -> changementType();
        }
        $affichage = Affichage::getAffichage();
        $result = $affichage->getInformation($dataConst);

        $this->render('recherche',$result);


    }

    public function action_affichage(){
        if(isset($_GET['affichage'])){
            $affichage = Affichage::getAffichage();
            if (preg_match('/^tt.*/',$_GET['affichage'])){
                $result = $affichage->getTitreInfo($_GET['affichage']);
                $this->render('affichage',$result);
            }elseif(preg_match('/^nm.*/',$_GET['affichage'])){
                $result = $affichage->getPersonneInfo($_GET['affichage']);
                $this->render('affichage',$result);

            } else{
                $this->action_error('L\'argument n\'est pas un titre ni une personne');
            }
        }else{
            $this->action_error('Pas d\'argument fourni');
        }
    }



}