<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Icone_Model
 *
 * @author mrandria
 */
class Icone_Model extends My_Model {

    function __construct() {
        parent::__construct();
        $this->load->library('Icone');
        $this->load->Model('Mesure_Model');
    }

    function getAll() {
        $rset = $this->read('icone', '*');
        $rep = array();
        if (isset($rset) && !empty($rset)) {
            foreach ($rset as $rec) {
                $temp = new Icone();
                $temp->setId_icone($rec->id_icone);
                $temp->setVal($rec->val);
                $temp->setNom_icone($rec->nom_icone);
                if ($rec->id_mesure != '') {
                    $temp->setMesure($this->Mesure_Model->getById($rec->id_mesure, 'french'));
                }
                $rep[] = $temp;
            }
        }
        return $rep;
    }

    function getById($id) {
        $where = array('id_icone' => $id);
        $rset = $this->read('icone', '*', $where);
        $rep = array();
        if (isset($rset) && !empty($rset)) {
            $rset = $rset[0];
            $rep = new Icone();
            $rep->setId_icone($rset->id_icone);
            $rep->setVal($rset->val);
            $rep->setNom_icone($rset->nom_icone);
            if ($rset->id_mesure != '') {
                $rep->setMesure($this->Mesure_Model->getById($rset->id_mesure, 'french'));
            }
        }
        return $rep;
    }

    function save($icone) {
        $object = array('id_icone' => $icone->getId_icone(), 'val' => $icone->getVal(), 'nom_icone' => $icone->getNom_icone());
        $id = $this->create('icone', $object, TRUE);
        if ($id != false) {
            $icone->setId_icone($id);
        }
    }

    function modify($icone) {
        $where = array('id_icone' => $icone->getId_icone());
        if ($icone->getMesure() != null) {
            $object = array('val' => $icone->getVal(), 'nom_icone' => $icone->getNom_icone(), 'id_mesure' => $icone->getMesure()->getId_mesure());
        } else {
            $object = array('val' => $icone->getVal(), 'nom_icone' => $icone->getNom_icone());
        }
        return $this->update('icone', $object, $where);
    }

    function remove($icone) {
        $where = array('id_icone' => $icone->getId_icone());
        return $this->delete('icone', $where);
    }

}
