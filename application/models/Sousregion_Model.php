<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Sousregion_Model
 *
 * @author mrandria
 */
class Sousregion_Model extends My_Model {

    function __construct() {
        parent::__construct();
        $this->load->library('Sous_region');
        $this->load->model('Region_Model');
    }

    function getAll($langue) {
        $query = $this->db->query("SELECT * FROM `sous_region` LEFT JOIN `sous_region_trad` ON `sous_region`.`id_sousregion` = `sous_region_trad`.`id_sousregion` LEFT JOIN langue on sous_region_trad.id_langue = langue.id_langue where langue = '" . $langue . "'");

        $rset = $query->result();
        $rep = array();
        if (isset($rset) && !empty($rset)) {
            foreach ($rset as $rec) {
                $temp = new Sous_region();
                $temp->setId_sousregion($rec->id_sousregion);
                $temp->setVal($rec->val);
                $temp->setRegion($this->Region_Model->getById($rec->id_region, $langue));
                $rep[] = $temp;
            }
        }
        return $rep;
    }

    function getById($id, $langue) {
        $query = $this->db->query("SELECT * FROM `sous_region` LEFT JOIN `sous_region_trad` ON `sous_region`.`id_sousregion` = `sous_region_trad`.`id_sousregion` LEFT JOIN langue on sous_region_trad.id_langue = langue.id_langue where langue = '" . $langue . "' and sous_region.id_sousregion=" . $id);
//echo $this->db->last_query().'<br>';
        $rset = $query->result();

        $rep = null;
        if (isset($rset) && !empty($rset)) {
            $rset = $rset[0];
            $rep = new Sous_region();
            $rep->setId_sousregion($rset->id_sousregion);
            $rep->setVal($rset->val);
            $rep->setRegion($this->Region_Model->getById($rset->id_region, $langue));
        }
        //print_r($rep);exit;
        return $rep;
    }

    function getByIdregion($id) {
        $where = array("id_region" => $id);
        $rset = $this->read('sous_region', '*', $where);
        $rep = array();
        if (isset($rset) && !empty($rset)) {
            foreach ($rset as $rec) {
                $temp = new Sous_region();
                $temp->setId_sousregion($rec->id_sousregion);
                $rep[] = $temp;
            }
        }
        return $rep;
    }

    function save($sousregion) {
        $object = array('id_sousregion' => $sousregion->getId_sousregion(), 'id_region' => $sousregion->getRegion()->getId_region());
        $id = $this->create('sous_region', $object, TRUE);
        if ($id != false) {
            $sousregion->setId_sousregion($id);
            $object_trad = array('id_sousregion' => $id, 'id_langue' => 1, 'val' => $sousregion->getVal()[1]);
            $this->create('sous_region_trad', $object_trad, false);
            $object_trad_en = array('id_sousregion' => $id, 'id_langue' => 2, 'val' => $sousregion->getVal()[2]);
            $this->create('sous_region_trad', $object_trad_en, false);
        }
    }

    function modify($sousregion) {
        $id = $sousregion->getId_sousregion();
        $where = array('id_sousregion' => $id);
        $object = array('id_region' => $sousregion->getRegion()->getId_region());
        $this->update('sous_region', $object, $where);

        $where = array('id_sousregion' => $id, 'id_langue' => 1);
        $object_trad = array('val' => $sousregion->getVal()[1]);
        $this->update('sous_region_trad', $object_trad, $where);

        $where = array('id_sousregion' => $id, 'id_langue' => 2);
        $object_trad_en = array('val' => $sousregion->getVal()[2]);
        $this->update('sous_region_trad', $object_trad_en, $where);
    }

    function remove($sousregion) {
        $annonces = $this->Annonce_Model->getBySousregion($sousregion->getId_sousregion());
        foreach ($annonces as $annonce) {
            $this->Annonce_Model->remove($annonce);
            $this->Annonce_Model->removeTrash($annonce);
        }
        $where = array('id_sousregion' => $sousregion->getId_sousregion());
        $this->delete('sous_region_trad', $where);
        $this->delete('sous_region', $where);
    }

}
