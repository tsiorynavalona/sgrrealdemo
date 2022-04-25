<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Region_Model
 *
 * @author mrandria
 */
class Region_Model extends My_Model {

    function __construct() {
        parent::__construct();
        $this->load->library('Region');
    }

    function getAll($langue) {
        $query = $this->db->query("SELECT * FROM `region` LEFT JOIN `region_trad` ON `region`.`id_region` = `region_trad`.`id_region` LEFT JOIN langue on region_trad.id_langue=langue.id_langue where langue='" . $langue . "'");

        $rset = $query->result();
        $rep = array();
        if (isset($rset) && !empty($rset)) {
            foreach ($rset as $rec) {
                $temp = new Region();
                $temp->setId_region($rec->id_region);
                $temp->setVal($rec->val);
                $rep[] = $temp;
            }
        }
        return $rep;
    }

    function getById($id, $langue) {
        $query = $this->db->query("SELECT * FROM `region` LEFT JOIN `region_trad` ON `region`.`id_region` = `region_trad`.`id_region` LEFT JOIN langue on region_trad.id_langue=langue.id_langue where langue='" . $langue . "' and region.id_region=" . $id);
        $rset = $query->result();

        if (isset($rset) && !empty($rset)) {
            $rset = $rset[0];
            $rep = new Region();
            $rep->setId_region($rset->id_region);
            $rep->setVal($rset->val);
        }
        return $rep;
    }

    function save($region) {
        $object = array('id_region' => $region->getId_region());
        $id = $this->create('region', $object, TRUE);
        if ($id != false) {
            $region->setId_region($id);
            $object_trad = array('id_region' => $id, 'id_langue' => 1, 'val' => $region->getVal()[1]);
            $this->create('region_trad', $object_trad, false);
            $object_trad_en = array('id_region' => $id, 'id_langue' => 2, 'val' => $region->getVal()[2]);
            $this->create('region_trad', $object_trad_en, false);
        }
    }

    function modify($region) {
        $id = $region->getId_region();

        $where = array('id_region' => $id, 'id_langue' => 1);
        $object_trad = array('val' => $region->getVal()[1]);
        $this->update('region_trad', $object_trad, $where);

        $where = array('id_region' => $id, 'id_langue' => 2);
        $object_trad_en = array('val' => $region->getVal()[2]);
        $this->update('region_trad', $object_trad_en, $where);
    }

    function remove($region) {
        $where = array('id_region' => $region->getId_region());
        $sousregions = $this->Sousregion_Model->getByIdregion($region->getId_region());
        foreach ($sousregions as $sousregion) {
            $this->Sousregion_Model->remove($sousregion);
        }
        $this->delete('region_trad', $where);
        $this->delete('region', $where);
    }

}
