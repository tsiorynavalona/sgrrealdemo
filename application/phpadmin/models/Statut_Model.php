<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Statut_Model
 *
 * @author mrandria
 */
class Statut_Model extends My_Model {

    function __construct() {
        parent::__construct();
        $this->load->library('Statut');
    }

    function getAll($langue) {
        $query = $this->db->query("SELECT * FROM `statut` LEFT JOIN `statut_trad` ON `statut`.`id_statut` = `statut_trad`.`id_statut` LEFT JOIN langue on statut_trad.id_langue=langue.id_langue where langue='" . $langue . "'");
        $rset = $query->result();
        $rep = array();
        if (isset($rset) && !empty($rset)) {
            foreach ($rset as $rec) {
                $temp = new Statut();
                $temp->setId_statut($rec->id_statut);
                $temp->setVal($rec->val);
                $rep[] = $temp;
            }
        }
        return $rep;
    }

    function getById($id, $langue) {
        $query = $this->db->query("SELECT * FROM `statut` LEFT JOIN `statut_trad` ON `statut`.`id_statut` = `statut_trad`.`id_statut` LEFT JOIN langue on statut_trad.id_langue=langue.id_langue where langue='" . $langue . "' and statut.id_statut=" . $id);
        $rset = $query->result();
        $rep = new Statut();
        if (isset($rset) && !empty($rset)) {
            $rset = $rset[0];
            $rep->setId_statut($rset->id_statut);
            $rep->setVal($rset->val);
        }
        return $rep;
    }

    function save($statut) {
        $object = array('id_statut' => $statut->getId_statut());
        $id = $this->create('statut', $object, TRUE);
        if ($id != false) {
            $statut->setId_statut($id);
            $object_trad = array('id_statut' => $id, 'id_langue' => 1, 'val' => $statut->getVal()[1]);
            $this->create('statut_trad', $object_trad, false);
            $object_trad_en = array('id_statut' => $id, 'id_langue' => 2, 'val' => $statut->getVal()[2]);
            $this->create('statut_trad', $object_trad_en, false);
        }
    }

    function modify($statut) {
        $id = $statut->getId_statut();

        $where = array('id_statut' => $id, 'id_langue' => 1);
        $object_trad = array('val' => $statut->getVal()[1]);
        $this->update('statut_trad', $object_trad, $where);

        $where = array('id_statut' => $id, 'id_langue' => 2);
        $object_trad_en = array('val' => $statut->getVal()[2]);
        $this->update('statut_trad', $object_trad_en, $where);
    }

    function remove($statut) {
        $annonces = $this->Annonce_Model->getByStatut($statut->getId_statut());
        foreach ($annonces as $annonce) {
            $this->Annonce_Model->remove($annonce);
            $this->Annonce_Model->removeTrash($annonce);
        }
        $where = array('id_statut' => $statut->getId_statut());
        $this->delete('statut_type', $where);
        $this->delete('statut_trad', $where);
        $this->delete('statut', $where);
    }

}
