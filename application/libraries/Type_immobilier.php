<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Type_immobilier
 *
 * @author mrandria
 */
class Type_immobilier {

    private $id_type;
    private $val;

//    private $id_langue;

    function getId_type() {
        return $this->id_type;
    }

    function getVal() {
        return $this->val;
    }

    function setId_type($id_type) {
        $this->id_type = $id_type;
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
