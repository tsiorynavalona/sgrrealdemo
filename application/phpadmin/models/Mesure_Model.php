<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mesure_Model
 *
 * @author mrandria
 */
class Mesure_Model extends My_Model {

    function __construct() {
        parent::__construct();
        $this->load->library('Mesure');
    }

    function getAll($langue) {
        $query = $this->db->query("SELECT * FROM `mesure` LEFT JOIN `mesure_trad` ON `mesure`.`id_mesure` = `mesure_trad`.`id_mesure` LEFT JOIN langue on mesure_trad.id_langue=langue.id_langue where langue='" . $langue . "'");
        $rset = $query->result();
        $rep = array();
        if (isset($rset) && !empty($rset)) {
            foreach ($rset as $rec) {
                $temp = new Mesure();
                $temp->setId_mesure($rec->id_mesure);
                $temp->setNom_mesure($rec->nom_mesure);
                $temp->setVal_mesure($rec->val_mesure);
                $temp->setSymbole($rec->symbole);
                $rep[] = $temp;
            }
        }
        return $rep;
    }

    function getById($id, $langue) {
        $query = $this->db->query("SELECT * FROM `mesure` LEFT JOIN `mesure_trad` ON `mesure`.`id_mesure` = `mesure_trad`.`id_mesure` LEFT JOIN langue on mesure_trad.id_langue=langue.id_langue where langue='" . $langue . "' and mesure.id_mesure=" . $id);
        $rset = $query->result();
        if (isset($rset) && !empty($rset)) {
            $rset = $rset[0];
            $rep = new Mesure();
            $rep->setId_mesure($rset->id_mesure);
            $rep->setNom_mesure($rset->nom_mesure);
            $rep->setVal_mesure($rset->val_mesure);
            $rep->setSymbole($rset->symbole);
        }
        return $rep;
    }

    function save($mesure) {
        $object = array('id_mesure' => $mesure->getId_mesure(), 'nom_mesure' => $mesure->getNom_mesure(), 'val_mesure' => $mesure->getVal_mesure(), 'symbole' => $mesure->getSymbole());
        $id = $this->create('mesure', $object, TRUE);
        if ($id != false) {
            $mesure->setId_mesure($id);
        }
    }

    function modify($mesure) {
        $where = array('id_mesure' => $mesure->getId_mesure());
        $object = array('id_mesure' => $mesure->getId_mesure(), 'nom_mesure' => $mesure->getNom_mesure(), 'val_mesure' => $mesure->getVal_mesure(), 'symbole' => $mesure->getSymbole());
        return $this->update('mesure', $object, $where);
    }

    function remove($mesure) {
        $where = array('id_mesure' => $mesure->getId_mesure());
        return $this->delete('mesure', $where);
    }

    function convert($val_avant, $val_apres, $to_convert) {
        $val_apres_en_avant = $val_avant * $val_apres;
        if ($val_avant <= $val_apres) {
            $val_apres_en_avant = $val_avant / $val_apres;
        }
        return $to_convert * $val_apres_en_avant;
    }

}
