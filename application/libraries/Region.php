<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Region
 *
 * @author mrandria
 */
class Region {

    //put your code here
    private $id_region;
    private $val;

    function getId_region() {
        return $this->id_region;
    }

    function getVal() {
        return $this->val;
    }

    function setId_region($id_region) {
        $this->id_region = $id_region;
    }

    function setVal($val) {
        $this->val = $val;
    }

}
