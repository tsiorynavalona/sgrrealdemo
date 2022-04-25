<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Devise_Model
 *
 * @author mrandria
 */
class Devise_Model extends My_Model {

    function __construct() {
        parent::__construct();
        $this->load->library('Devise');
    }

    function getAll($langue) {
        $query = $this->db->query("SELECT * FROM `devise` LEFT JOIN `devise_trad` ON `devise`.`id_devise` = `devise_trad`.`id_devise` LEFT JOIN langue on devise_trad.id_langue=langue.id_langue where langue='" . $langue . "'");
//        echo $this->db->last_query();
//        exit;
        $rset = $query->result();
        $rep = array();
        if (isset($rset) && !empty($rset)) {
            foreach ($rset as $rec) {
                $temp = new Devise();
                $temp->setId_devise($rec->id_devise);
                $temp->setNom_devise($rec->nom_devise);
                $temp->setMontant_devise($rec->montant_devise);
                $temp->setSymbole($rec->symbole);
                $temp->setLeft_symbole($rec->left_symbole);
                $rep[] = $temp;
            }
        }
        return $rep;
    }

    function getById($id, $langue) {
        $query = $this->db->query("SELECT * FROM `devise` LEFT JOIN `devise_trad` ON `devise`.`id_devise` = `devise_trad`.`id_devise` LEFT JOIN langue on devise_trad.id_langue=langue.id_langue where langue='" . $langue . "' and devise.id_devise=" . $id);
        $rset = $query->result();
        if (isset($rset) && !empty($rset)) {
            $rset = $rset[0];
            $rep = new Devise();
            $rep->setId_devise($rset->id_devise);
            $rep->setNom_devise($rset->nom_devise);
            $rep->setMontant_devise($rset->montant_devise);
            $rep->setLeft_symbole($rset->left_symbole);
            $rep->setSymbole($rset->symbole);
        }
        return $rep;
    }

    function save($devise) {
        $object = array('id_devise' => $devise->getId_devise(), 'montant_devise' => $devise->getMontant_devise(), 'symbole' => $devise->getSymbole(), 'left_symbole' => $devise->getLeft_symbole());
        $id = $this->create('devise', $object, TRUE);
        if ($id != false) {
            $devise->setId_devise($id);
            $object_trad = array('id_devise' => $id, 'id_langue' => 1, 'nom_devise' => $devise->getNom_Devise()[1]);
            $this->create('devise_trad', $object_trad, false);
            $object_trad_en = array('id_devise' => $id, 'id_langue' => 2, 'nom_devise' => $devise->getNom_Devise()[2]);
            $this->create('devise_trad', $object_trad_en, false);
        }
    }

    function modify($devise) {
        $id = $devise->getId_devise();
        $where = array('id_devise' => $id);
        $object = array('montant_devise' => $devise->getMontant_devise(), 'symbole' => $devise->getSymbole(), 'left_symbole' => $devise->getLeft_symbole());
        $this->update('devise', $object, $where);

        $where = array('id_devise' => $id, 'id_langue' => 1);
        $object_trad = array('nom_devise' => $devise->getNom_Devise()[1]);
        $this->update('devise_trad', $object_trad, $where);

        $where = array('id_devise' => $id, 'id_langue' => 2);
        $object_trad_en = array('nom_devise' => $devise->getNom_Devise()[2]);
        $this->update('devise_trad', $object_trad_en, $where);
    }

    function remove($devise) {
        $where = array('id_devise' => $devise->getId_devise());
        $this->delete('devise_trad', $where);
        $this->delete('devise', $where);
    }

    function convert($val_avant, $val_apres, $to_convert) {
        $val_apres_en_avant = $val_avant * $val_apres;

        if ($val_avant <= $val_apres) {
            $val_apres_en_avant = $val_avant / $val_apres;
        }

        return $to_convert * $val_apres_en_avant;
    }

}
