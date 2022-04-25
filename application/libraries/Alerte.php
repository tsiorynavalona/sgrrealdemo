<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Alerte
 *
 * @author mrandria
 */
class Alerte {

    //put your code here
    private $id_alerte;
    private $nom_prenom;
    private $email;
    private $type_bien;
    private $statut;
    private $sous_region;
    private $surf_min;
    private $surf_max;
    private $nbre_piece;
    private $prix_min;
    private $prix_max;
    private $remarque;
	private $typid;

    function getId_alerte() {
        return $this->id_alerte;
    }
	function gettypid() {
        return $this->typid;
    }

    function getNom_prenom() {
        return $this->nom_prenom;
    }

    function getEmail() {
        return $this->email;
    }

    function getType_bien() {
        return $this->type_bien;
    }

    function getSurf_min() {
        return $this->surf_min;
    }

    function getSurf_max() {
        return $this->surf_max;
    }

    function getNbre_piece() {
        return $this->nbre_piece;
    }

    function getPrix_min() {
        return $this->prix_min;
    }

    function getPrix_max() {
        return $this->prix_max;
    }

    function getRemarque() {
        return $this->remarque;
    }

    function setId_alerte($id_alerte) {
        $this->id_alerte = $id_alerte;
    }
	function settypid($typid) {
        $this->typid = $typid;
    }
	
    function setNom_prenom($nom_prenom) {
        $this->nom_prenom = $nom_prenom;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setType_bien($type_bien) {
        $this->type_bien = $type_bien;
    }

    function setSurf_min($surf_min) {
        $this->surf_min = $surf_min;
    }

    function setSurf_max($surf_max) {
        $this->surf_max = $surf_max;
    }

    function setNbre_piece($nbre_piece) {
        $this->nbre_piece = $nbre_piece;
    }

    function setPrix_min($prix_min) {
        $this->prix_min = $prix_min;
    }

    function setPrix_max($prix_max) {
        $this->prix_max = $prix_max;
    }

    function setRemarque($remarque) {
        $this->remarque = $remarque;
    }

    function getStatut() {
        return $this->statut;
    }

    function getSous_region() {
        return $this->sous_region;
    }

    function setStatut($statut) {
        $this->statut = $statut;
    }

    function setSous_region($sous_region) {
        $this->sous_region = $sous_region;
    }

}
