<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Caracteristiques
 *
 * @author mrandria
 */
class Caracteristiques {

    //put your code here
    private $id_car;
    private $val;
    private $val_car;

//    private $id_langue;

    function getId_car() {
        return $this->id_car;
    }

    function getVal() {
        return $this->val;
    }

    function getVal_car() {
        return $this->val_car;
    }

    function setId_car($id_car) {
        $this->id_car = $id_car;
    }

    function setVal($val) {
        $this->val = $val;
    }

    function setVal_car($val_car) {
        $this->val_car = $val_car;
    }

}
