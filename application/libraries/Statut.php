<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Statut
 *
 * @author mrandria
 */
class Statut {

    //put your code here
    private $id_statut;
    private $val;

//    private $id_langue;

    function getId_statut() {
        return $this->id_statut;
    }

    function getVal() {
        return $this->val;
    }

    function getDesce() {
        return $this->desce;
    }

    function setId_statut($id_statut) {
        $this->id_statut = $id_statut;
    }

    function setVal($val) {
        $this->val = $val;
    }

//    function getId_langue() {
//        return $this->id_langue;
//    }
//
//    function setId_langue($id_langue) {
//        $this->id_langue = $id_langue;
//    }
}
