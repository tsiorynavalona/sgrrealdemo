<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Estimation_Model
 *
 * @author mrandria
 */
class Estimation_Model extends My_Model {

    function __construct() {
        parent::__construct();
        $this->load->library('Estimation_bien');
    }

    function getAll($id='') {
		
		$order = array('id_estimation'=>'desc');
        $rset = $this->read('estimation_bien', '*','','',$order);
        $rep = array();
        if (isset($rset) && !empty($rset)) {
            foreach ($rset as $rec) {
                $temp = new Estimation_bien();
                $temp->setId_estimation($rec->id_estimation);
                $temp->setNom_prenom($rec->nom_prenom);
                $temp->setTel($rec->tel);
                $temp->setFax($rec->fax);
                $temp->setEmail($rec->email);
                $temp->setType_bien($rec->type_bien);
                $temp->setLocalisation($rec->localisation);
                $temp->setSurface($rec->surface);
                $temp->setNbre_piece($rec->nbre_piece);
                $temp->setRemarque($rec->remarque);
                $rep[] = $temp;
            }
        }
        return $rep;
    }

    function getById($id = '') {
        $where = array('id_estimation' => $id);
        $rset = $this->read('estimation_bien', '*', $where);
        $rep = array();
        if (isset($rset) && !empty($rset)) {
            $rec = $rset[0];
            $temp = new Estimation_bien();
            $temp->setId_estimation($rec->id_estimation);
            $temp->setNom_prenom($rec->nom_prenom);
            $temp->setTel($rec->tel);
            $temp->setFax($rec->fax);
            $temp->setEmail($rec->email);
            $temp->setType_bien($rec->type_bien);
            $temp->setLocalisation($rec->localisation);
            $temp->setSurface($rec->surface);
            $temp->setNbre_piece($rec->nbre_piece);
            $temp->setRemarque($rec->remarque);
            $rep = $temp;
        }
        return $rep;
    }

    function save($estimation) {
        $object = array('nom_prenom' => $estimation->getNom_prenom(), 'tel' => $estimation->getTel(), 'fax' => $estimation->getFax(), 'email' => $estimation->getEmail(), 'type_bien' => $estimation->getType_bien(), 'localisation' => $estimation->getLocalisation(), 'surface' => $estimation->getSurface(), 'remarque' => $estimation->getRemarque(), 'nbre_piece' => $estimation->getNbre_piece());
        $id = $this->create('estimation_bien', $object, TRUE);
        if ($id != false) {
            $estimation->setId_estimation($id);
        }
    }

    function modify($estimation) {
        $where = array('id_estimation' => $estimation->getId_estimation());
        $object = array('nom_prenom' => $estimation->getNom_prenom(), 'tel' => $estimation->getTel(), 'fax' => $estimation->getFax(), 'email' => $estimation->getEmail(), 'type_bien' => $estimation->getType_bien(), 'localisation' => $estimation->getLocalisation(), 'surface' => $estimation->getSurface(), 'remarque' => $estimation->getRemarque());
        return $this->update('estimation', $object, $where);
    }

    function remove($estimation) {
        $where = array('id_estimation' => $estimation->getId_estimation());
        return $this->delete('estimation_bien', $where);
    }

}
