<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Image
 *
 * @author mrandria
 */
class Image {

    //put your code here
    private $id_image;
    private $nom_image;

    function getId_image() {
        return $this->id_image;
    }

    function getNom_image() {
        return $this->nom_image;
    }

    function setId_image($id_image) {
        $this->id_image = $id_image;
    }

    function setNom_image($nom_image) {
        $this->nom_image = $nom_image;
    }

}
