<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mesure
 *
 * @author mrandria
 */
class Mesure {

//put your code here
    private $id_mesure;
    private $nom_mesure;
    private $val_mesure;
    private $symbole;

//    private $id_langue;

    function getId_mesure() {
        return $this->id_mesure;
    }

    function getNom_mesure() {
        return $this->nom_mesure;
    }

    function getVal_mesure() {
        return $this->val_mesure;
    }

    function setId_mesure($id_mesure) {
        $this->id_mesure = $id_mesure;
    }

    function setNom_mesure($nom_mesure) {
        $this->nom_mesure = $nom_mesure;
    }

    function setVal_mesure($val_mesure) {
        $this->val_mesure = $val_mesure;
    }

    function getSymbole() {
        return $this->symbole;
    }

    function setSymbole($symbole) {
        $this->symbole = $symbole;
    }

//    function getId_langue() {
//        return $this->id_langue;
//    }
//
//    function setId_langue($id_langue) {
//        $this->id_langue = $id_langue;
//    }
}
