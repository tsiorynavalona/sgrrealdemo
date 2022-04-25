<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Tag
 *
 * @author mrandria
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Tag {

    //put your code here
    private $id_tag;
    private $val;

//    private $id_langue;

    function getId_tag() {
        return $this->id_tag;
    }

    function getVal() {
        return $this->val;
    }

    function setId_tag($id_tag) {
        $this->id_tag = $id_tag;
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
