<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Estimation_bien
 *
 * @author mrandria
 */
class Estimation_bien {

    //put your code here
    private $id_estimation;
    private $nom_prenom;
    private $tel;
    private $fax;
    private $email;
    private $type_bien;
    private $localisation;
    private $surface;
    private $remarque;
    private $nbre_piece;

    function getId_estimation() {
        return $this->id_estimation;
    }

    function getNom_prenom() {
        return $this->nom_prenom;
    }

    function getTel() {
        return $this->tel;
    }

    function getFax() {
        return $this->fax;
    }

    function getEmail() {
        return $this->email;
    }

    function getType_bien() {
        return $this->type_bien;
    }

    function getLocalisation() {
        return $this->localisation;
    }

    function getSurface() {
        return $this->surface;
    }

    function getRemarque() {
        return $this->remarque;
    }

    function setId_estimation($id_estimation) {
        $this->id_estimation = $id_estimation;
    }

    function setNom_prenom($nom_prenom) {
        $this->nom_prenom = $nom_prenom;
    }

    function setTel($tel) {
        $this->tel = $tel;
    }

    function setFax($fax) {
        $this->fax = $fax;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setType_bien($type_bien) {
        $this->type_bien = $type_bien;
    }

    function setLocalisation($localisation) {
        $this->localisation = $localisation;
    }

    function setSurface($surface) {
        $this->surface = $surface;
    }

    function setRemarque($remarque) {
        $this->remarque = $remarque;
    }

    function getNbre_piece() {
        return $this->nbre_piece;
    }

    function setNbre_piece($nbre_piece) {
        $this->nbre_piece = $nbre_piece;
    }

}
