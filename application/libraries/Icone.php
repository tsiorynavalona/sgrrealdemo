<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Icone
 *
 * @author mrandria
 */
class Icone {

    //put your code here
    private $id_icone;
    private $val;
    private $nom_icone;
    private $val_icone;
    private $mesure;

    function getId_icone() {
        return $this->id_icone;
    }

    function getVal() {
        return $this->val;
    }

    function setId_icone($id_icone) {
        $this->id_icone = $id_icone;
    }

    function setVal($val) {
        $this->val = $val;
    }

    function getNom_icone() {
        return $this->nom_icone;
    }

    function setNom_icone($nom_icone) {
        $this->nom_icone = $nom_icone;
    }

    function getVal_icone() {
        return $this->val_icone;
    }

    function setVal_icone($val_icone) {
        $this->val_icone = $val_icone;
    }

    function getMesure() {
        return $this->mesure;
    }

    function setMesure($mesure) {
        $this->mesure = $mesure;
    }

}
