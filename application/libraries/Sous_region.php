<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Sous_region
 *
 * @author mrandria
 */
class Sous_region {

    //put your code here
    private $id_sousregion;
    private $region;
    private $val;

    function getId_sousregion() {
        return $this->id_sousregion;
    }

    function getRegion() {
        return $this->region;
    }

    function getVal() {
        return $this->val;
    }

    function setId_sousregion($id_sousregion) {
        $this->id_sousregion = $id_sousregion;
    }

    function setRegion($region) {
        $this->region = $region;
    }

    function setVal($val) {
        $this->val = $val;
    }

}
