<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Agent_Model
 *
 * @author mrandria
 */
class Agent_Model extends My_Model {

    function __construct() {
        parent::__construct();
        $this->load->library('Agent');
        $this->load->model('Image_Model');
    }

    function getAll() {
        $where = array("etat" => true);
        $join = array("image" => "id_image");

        $rset = $this->read('agent', '*', $where, $join);
//        echo $this->db->last_query();
//        exit;
        $rep = array();
        if (isset($rset) && !empty($rset)) {
            foreach ($rset as $rec) {
                $temp = new Agent();
                $temp->setId_agent($rec->id_agent);
                $temp->setNom($rec->nom);
                $temp->setPrenom($rec->prenom);
                $temp->setTel($rec->tel);
                $temp->setEmail($rec->email);
                $temp->setEtat($rec->etat);
                $temp->setImage($this->Image_Model->getById($rec->id_image));
                $rep[] = $temp;
            }
        }
        return $rep;
    }

    function getById($id) {
        $where = array('id_agent' => $id);
        $rset = $this->read('agent', '*', $where);
        $rep = null;
        if (isset($rset) && !empty($rset)) {
            $rset = $rset[0];
            $rep = new Agent();
            $rep->setId_agent($rset->id_agent);
            $rep->setNom($rset->nom);
            $rep->setPrenom($rset->prenom);
            $rep->setTel($rset->tel);
            $rep->setEmail($rset->email);
            $rep->setEtat($rset->etat);
            $rep->setImage($this->Image_Model->getById($rset->id_image));
        }
        return $rep;
    }

    function save($agent) {
        //ajout image
        //
        //
        $id_image = $agent->getImage()->getId_image();
        //
        //ajout image
        $object = array('id_agent' => $agent->getId_agent(), 'nom' => $agent->getNom(), 'prenom' => $agent->getPrenom(), 'tel' => $agent->getTel(), 'email' => $agent->getEmail(), 'etat' => true, 'id_image' => $id_image);
        $id = $this->create('agent', $object, TRUE);
        if ($id != false) {
            $agent->setId_agent($id);
        }
    }

    function modify($agent) {
        $id_image = $agent->getImage()->getId_image();
        $where = array('id_agent' => $agent->getId_agent());
        $object = array('id_agent' => $agent->getId_agent(), 'nom' => $agent->getNom(), 'prenom' => $agent->getPrenom(), 'tel' => $agent->getTel(), 'email' => $agent->getEmail(), 'etat' => true, 'id_image' => $id_image);
        return $this->update('agent', $object, $where);
    }

    function remove($agent) {
        $annonces = $this->Annonce_Model->getByAgent($agent->getId_agent());
        foreach ($annonces as $annonce) {
            $where = array('id_ann' => $annonce->getId_ann());
            $object = array('id_agent' => NULL);
            $this->update('annonce', $object, $where);
        }
        $where = array('id_agent' => $agent->getId_agent());
        $object = array('etat' => false);
        return $this->update('agent', $object, $where);
    }

}
