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
            if (preg_match('/^nm.*/',$_GET['ajouter'])){
                $_SESSION['resultatRecherche'] = new RechercheCommun('titres');
            }elseif(preg_match('/^tt.*/',$_GET['ajouter'])){
                $_SESSION['resultatRecherche'] = new RechercheCommun('personnes');
            }else{
                $this->action_error('L\'argument n\'est pas un titre ni une personne');
            }
        }
        $dataConst = array();
        if (isset($_GET['ajouter'])){
            $dataConst = $_SESSION['resultatRecherche']-> ajouterRecherche($_GET['ajouter']);
        }
        $affichage = Affichage::getAffichage();
        $result = $affichage->getInformationCommun($dataConst);

        $this->render('recherche',$result);


    }

    public function action_supprimer(){

        $dataConst = array();
        if (!isset($_SESSION['resultatRecherche'])){
            if (preg_match('/^tt.*/',$_GET['supprimer'])){
                $_SESSION['resultatRecherche'] = new RechercheCommun('titres');
            }elseif(preg_match('/^nm.*/',$_GET['supprimer'])){
                $_SESSION['resultatRecherche'] = new RechercheCommun('personnes');
            }else{
                $this->action_error('L\'argument n\'est pas un titre ni une personne');
            }
        }
        if (!isset($_GET['supprimer'])){
            $dataConst = $rechercheCommun -> supprimerRecherche($_GET['supprimer']);
        }
        $affichage = Affichage::getAffichage();
        $result = $affichage->getInformationCommun($dataConst);

        $this->render('recherche',$result);


    }

    public function action_changementRecherche(){

        $dataConst = array();
        if (!isset($_SESSION['resultatRecherche'])){
            $_SESSION['resultatRecherche'] = new RechercheCommun('personnes');
        }else{
            $_SESSION['resultatRecherche']->changementType();
        }
        $affichage = Affichage::getAffichage();
        $result = $affichage->getInformationCommun($dataConst);

        $this->render('recherche',$result);


    }

    public function action_affichage(){
        if(isset($_GET['search'])){
            $affichage = Affichage::getAffichage();
            if (preg_match('/^tt.*/',$_GET['search'])){
                $result = $affichage->getTitreInfoComplet($_GET['search']);
                $this->render('film',$result);
            }elseif(preg_match('/^nm.*/',$_GET['search'])){
                $result = $affichage->getPersonneInfoComplet($_GET['search']);
                $this->render('acteur',$result);

            } else{
                $this->action_error('L\'argument n\'est pas un titre ni une personne');
            }
        }else{
            $this->action_error('Pas d\'argument fourni');
        }
    }



}