<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Type_Model
 *
 * @author mrandria
 */
class Type_Model extends MY_Model {

    function __construct() {
        parent::__construct();
        $this->load->library('Type_immobilier');
    }

    function getAll($langue) {
        $query = $this->db->query("SELECT * FROM `type_immobilier` LEFT JOIN `type_trad` ON `type_immobilier`.`id_type` = `type_trad`.`id_type` LEFT JOIN langue on type_trad.id_langue=langue.id_langue where langue='" . $langue . "'");
        $rset = $query->result();
        $rep = array();
        if (isset($rset) && !empty($rset)) {
            foreach ($rset as $rec) {
                $temp = new Type_immobilier();
                $temp->setId_type($rec->id_type);
                $temp->setVal($rec->val);
                $rep[] = $temp;
            }
        }
        return $rep;
    }

    function getById($id, $langue) {
        $query = $this->db->query("SELECT * FROM `type_immobilier` LEFT JOIN `type_trad` ON `type_immobilier`.`id_type` = `type_trad`.`id_type` LEFT JOIN langue on type_trad.id_langue = langue.id_langue where langue = '" . $langue . "' and type_immobilier.id_type = " . $id);
        $rset = $query->result();
        $rep = new Type_immobilier();
        if (isset($rset) && !empty($rset)) {
            $rset = $rset[0];
            $rep->setId_type($rset->id_type);
            $rep->setVal($rset->val);
        }
        return $rep;
    }

    function save($type) {
        $object = array('id_type' => $type->getId_type());
        $id = $this->create('type_immobilier', $object, TRUE);
        if ($id != false) {
            $type->setId_type($id);
            $object_trad = array('id_type' => $id, 'id_langue' => 1, 'val' => $type->getVal()[1]);
            $this->create('type_trad', $object_trad, false);
            $object_trad_en = array('id_type' => $id, 'id_langue' => 2, 'val' => $type->getVal()[2]);
            $this->create('type_trad', $object_trad_en, false);
        }
    }

    function modify($type) {
        $id = $type->getId_type();

        $where = array('id_type' => $id, 'id_langue' => 1);
        $object_trad = array('val' => $type->getVal()[1]);
        $this->update('type_trad', $object_trad, $where);

        $where = array('id_type' => $id, 'id_langue' => 2);
        $object_trad_en = array('val' => $type->getVal()[2]);
        $this->update('type_trad', $object_trad_en, $where);
    }

    function remove($type) {
        $where = array('id_type' => $type->getId_type());
        $this->delete('statut_type', $where);
        $this->delete('type_trad', $where);
        $this->delete('type_immobilier', $where);
    }

}
