<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Statut_Type
 *
 * @author raoul
 */
class Statut_Type {

    private $id_statut_type;
    private $id_statut;
    private $id_type;
    private $val_statut;
    private $val_type;

    function getId_statut_type() {
        return $this->id_statut_type;
    }

    function setId_statut_type($id_statut_type) {
        $this->id_statut_type = $id_statut_type;
    }

    function getId_statut() {
        return $this->id_statut;
    }

    function setId_statut($id_statut) {
        $this->id_statut = $id_statut;
    }

    function getId_type() {
        return $this->id_type;
    }

    function setId_type($id_type) {
        $this->id_type = $id_type;
    }

    function getVal_statut() {
        return $this->val_statut;
    }

    function setVal_statut($val_statut) {
        $this->val_statut = $val_statut;
    }

    function getVal_type() {
        return $this->val_type;
    }

    function setVal_type($val_type) {
        $this->val_type = $val_type;
    }
}
