<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin
 *
 * @author mrandria
 */
class Admin {

    //put your code here
    private $id_admin;
    private $nom;
    private $prenom;
    private $email;
    private $mdp;

    function getId_admin() {
        return $this->id_admin;
    }

    function getNom() {
        return $this->nom;
    }

    function getPrenom() {
        return $this->prenom;
    }

    function getEmail() {
        return $this->email;
    }

    function getMdp() {
        return $this->mdp;
    }

    function setId_admin($id_admin) {
        $this->id_admin = $id_admin;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setMdp($mdp) {
        $this->mdp = $mdp;
    }

}
