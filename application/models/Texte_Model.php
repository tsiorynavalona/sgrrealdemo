<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Texte_Model
 *
 * @author mrandria
 */
class Texte_Model extends My_Model {

    function __construct() {
        parent::__construct();
        $this->load->library('Texte_defilante');
    }

    function getAll($langue) {
        $query = $this->db->query("SELECT * FROM `texte_defilante` LEFT JOIN `texte_trad` ON `texte_defilante`.`id_texte` = `texte_trad`.`id_texte` LEFT JOIN langue on texte_trad.id_langue=langue.id_langue where langue='" . $langue . "'");
        $rset = $query->result();
        $rep = array();
        if (isset($rset) && !empty($rset)) {
            foreach ($rset as $rec) {
                $temp = new Texte_defilante();
                $temp->setId_texte($rec->id_texte);
                $temp->setVal($rec->val);
                $rep[] = $temp;
            }
        }
        return $rep;
    }

    function getById($id, $langue) {
        $query = $this->db->query("SELECT * FROM `texte_defilante` LEFT JOIN `texte_trad` ON `texte_defilante`.`id_texte` = `texte_trad`.`id_texte` LEFT JOIN langue on texte_trad.id_langue=langue.id_langue where langue='" . $langue . "' and texte_defilante.id_texte=" . $id);
        $rset = $query->result();

        $rep = new Texte_defilante();
        if (isset($rset) && !empty($rset)) {
            $rset = $rset[0];
            $rep->setId_texte($rset->id_texte);
            $rep->setVal($rset->val);
        }
        return $rep;
    }

    function save($texte) {
        $object = array('id_texte' => $texte->getId_texte());
        $id = $this->create('texte_defilante', $object, TRUE);
        if ($id != false) {
            $texte->setId_texte($id);
            $object_trad = array('id_texte' => $id, 'id_langue' => 1, 'val' => $texte->getVal()[1]);
            $this->create('texte_trad', $object_trad, false);
            $object_trad_en = array('id_texte' => $id, 'id_langue' => 2, 'val' => $texte->getVal()[2]);
            $this->create('texte_trad', $object_trad_en, false);
        }
    }

    function modify($texte) {
        $id = $texte->getId_texte();

        $where = array('id_texte' => $id, 'id_langue' => 1);
        $object_trad = array('val' => $texte->getVal()[1]);
        $this->update('texte_trad', $object_trad, $where);

        $where = array('id_texte' => $id, 'id_langue' => 2);
        $object_trad_en = array('val' => $texte->getVal()[2]);
        $this->update('texte_trad', $object_trad_en, $where);
    }

    function remove($texte) {
        $where = array('id_texte' => $texte->getId_texte());
        $this->delete('texte_trad', $where);
        $this->delete('texte_defilante', $where);
    }

}
