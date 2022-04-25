<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Actualite
 *
 * @author mrandria
 */
class Actualite {

    //put your code here
    private $id_actu;
    private $titre;
    private $description;
    private $date_evenement;
    private $image;

//    private $id_langue;

    function getId_actu() {
        return $this->id_actu;
    }

    function setId_actu($id_actu) {
        $this->id_actu = $id_actu;
    }

    function getTitre() {
        return $this->titre;
    }

    function getDescription() {
        return $this->description;
    }

    function getDate_evenement() {
        return $this->date_evenement;
    }

    function setTitre($titre) {
        $this->titre = $titre;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setDate_evenement($date_evenement) {
        $this->date_evenement = $date_evenement;
    }

    function getImage() {
        return $this->image;
    }

    function setImage($image) {
        $this->image = $image;
    }

}
