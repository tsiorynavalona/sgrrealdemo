<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Client
 *
 * @author mrandria
 */
class Client {

    //put your code here  private $id_client          ;
    private $id_client;
    private $nom;
    private $prenom;
    private $nic;
    private $tel;
    private $fax;
    private $email;
    private $profession;
    private $adresse;
    private $etat;

    function getId_client() {
        return $this->id_client;
    }

    function setId_client($id_client) {
        $this->id_client = $id_client;
    }

    function getNom() {
        return $this->nom;
    }

    function getPrenom() {
        return $this->prenom;
    }

    function getNic() {
        return $this->nic;
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

    function getProfession() {
        return $this->profession;
    }

    function getAdresse() {
        return $this->adresse;
    }

    function getEtat() {
        return $this->etat;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    function setNic($nic) {
        $this->nic = $nic;
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

    function setProfession($profession) {
        $this->profession = $profession;
    }

    function setAdresse($adresse) {
        $this->adresse = $adresse;
    }

    function setEtat($etat) {
        $this->etat = $etat;
    }

}
