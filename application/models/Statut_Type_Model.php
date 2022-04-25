<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Statut_Type_Model
 *
 * @author raoul
 */
class Statut_Type_Model extends MY_Model {

    function __construct() {
        parent::__construct();
        $this->load->library('Statut_Type');
    }

    function getAll($langue) {
        $query = $this->db->query("SELECT menu_order, id_statut_type, statut_trad.id_statut, type_trad.id_type, statut_trad.val AS val_statut, type_trad.val AS val_type FROM `statut_type` LEFT JOIN `statut_trad` ON `statut_type`.`id_statut` = `statut_trad`.`id_statut` LEFT JOIN `type_trad` ON `statut_type`.`id_type` = `type_trad`.`id_type` LEFT JOIN langue ON statut_trad.id_langue = langue.id_langue AND type_trad.id_langue = langue.id_langue WHERE langue = '".$langue."' ORDER BY menu_order ASC ");
        $rset = $query->result();
        $rep = array();
        if (isset($rset) && !empty($rset)) {
            foreach ($rset as $rec) {
                $temp = new Statut_Type();
                $temp->setId_statut_type($rec->id_statut_type);
                $temp->setId_statut($rec->id_statut);
                $temp->setId_type($rec->id_type);
                $temp->setVal_Statut($rec->val_statut);
                $temp->setVal_type($rec->val_type);
                $temp->setVal_menu_order($rec->menu_order);
                $rep[] = $temp;
            }
        }
        return $rep;
    }

    function getById($id, $langue) {
        $query = $this->db->query("SELECT menu_order,id_statut_type, statut_trad.id_statut, type_trad.id_type, statut_trad.val AS val_statut, type_trad.val AS val_type FROM `statut_type` LEFT JOIN `statut_trad` ON `statut_type`.`id_statut` = `statut_trad`.`id_statut` LEFT JOIN `type_trad` ON `statut_type`.`id_type` = `type_trad`.`id_type` LEFT JOIN langue ON statut_trad.id_langue = langue.id_langue AND type_trad.id_langue = langue.id_langue WHERE langue = '".$langue."' and statut_type.id_statut_type = " . $id);
        $rset = $query->result();
        $rep = new Statut_Type();
        if (isset($rset) && !empty($rset)) {
            $rset = $rset[0];
            $rep->setId_statut_type($rset->id_statut_type);
            $rep->setId_statut($rset->id_statut);
            $rep->setId_type($rset->id_type);
            $rep->setVal_Statut($rset->val_statut);
            $rep->setVal_type($rset->val_type);
            $rep->setVal_menu_order($rset->menu_order);
        }
        return $rep;
    }

    function save($statuttype) {
        $object = array('id_statut' => $statuttype->getId_statut(),'id_type' => $statuttype->getId_type());
        $id= $this->create('statut_type', $object, TRUE);
        if ($id != false) {
            $statuttype->setId_statut_type($id);
            $object_s_t = array('id_statut_type' => $id, 'id_type' => $statuttype->getId_type(), 'id_statut' => $statuttype->getId_statut());
            $this->create('statut_type', $object_s_t, false);
       }
    }

    function modify($statuttype) {
        $id = $statuttype->getId_statut_type();

        $where = array('id_statut_type' => $id);
        $object_trad = array('id_statut' => $statuttype->getId_statut(), 'id_type' => $statuttype->getId_type(), 'menu_order' => $statuttype->getVal_menu_order());
        $this->update('statut_type', $object_trad, $where);
    }

    function remove($statuttype) {
        $where = array('id_statut_type' => $statuttype->getId_statut_type());
        $this->delete('statut_type', $where);
    }

}
