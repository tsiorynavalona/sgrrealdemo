<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Agent
 *
 * @author mrandria
 */
class Agent {

    //put your code here
    private $id_agent;
    private $nom;
    private $prenom;
    private $tel;
    private $email;
    private $etat;
    private $image;

    function getId_agent() {
        return $this->id_agent;
    }

    function getNom() {
        return $this->nom;
    }

    function getPrenom() {
        return $this->prenom;
    }

    function getTel() {
        return $this->tel;
    }

    function getEmail() {
        return $this->email;
    }

    function getEtat() {
        return $this->etat;
    }

    function setId_agent($id_agent) {
        $this->id_agent = $id_agent;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    function setTel($tel) {
        $this->tel = $tel;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setEtat($etat) {
        $this->etat = $etat;
    }

    function getImage() {
        return $this->image;
    }

    function setImage($image) {
        $this->image = $image;
    }

}
