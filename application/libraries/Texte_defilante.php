<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Texte_defilante
 *
 * @author mrandria
 */
class Texte_defilante {

    private $id_texte;
    private $val;

    function getId_texte() {
        return $this->id_texte;
    }

    function getVal() {
        return $this->val;
    }

    function setId_texte($id_texte) {
        $this->id_texte = $id_texte;
    }

    function setVal($val) {
        $this->val = $val;
    }

}
