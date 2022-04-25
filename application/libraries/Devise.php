<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Devise
 *
 * @author mrandria
 */
class Devise {

    //put your code here

    private $id_devise;
    private $nom_devise;
    private $montant_devise;
    private $symbole;
    private $left_symbole;

    function getId_devise() {
        return $this->id_devise;
    }

    function getNom_devise() {
        return $this->nom_devise;
    }

    function getMontant_devise() {
        return $this->montant_devise;
    }

    function setId_devise($id_devise) {
        $this->id_devise = $id_devise;
    }

    function setNom_devise($nom_devise) {
        $this->nom_devise = $nom_devise;
    }

    function setMontant_devise($montant_devise) {
        $this->montant_devise = $montant_devise;
    }

    function getSymbole() {
        return $this->symbole;
    }

    function setSymbole($symbole) {
        $this->symbole = $symbole;
    }

    function getLeft_symbole() {
        return $this->left_symbole;
    }

    function setLeft_symbole($left_symbole) {
        $this->left_symbole = $left_symbole;
    }

}
