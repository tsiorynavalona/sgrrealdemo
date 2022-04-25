<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Tag_Model
 *
 * @author mrandria
 */
class Tag_Model extends My_Model {

    function __construct() {
        parent::__construct();
        $this->load->library('Tag');
    }

    function getAll($langue) {
        $query = $this->db->query("SELECT * FROM `tag` LEFT JOIN `tag_trad` ON `tag`.`id_tag` = `tag_trad`.`id_tag` LEFT JOIN langue on tag_trad.id_langue=langue.id_langue where langue='" . $langue . "'");
        $rset = $query->result();
        $rep = array();
        if (isset($rset) && !empty($rset)) {
            foreach ($rset as $rec) {
                $temp = new Tag();
                $temp->setId_tag($rec->id_tag);
                $temp->setVal($rec->val);
                $rep[] = $temp;
            }
        }
        return $rep;
    }

    function getById($id, $langue) {
        $query = $this->db->query("SELECT * FROM `tag` LEFT JOIN `tag_trad` ON `tag`.`id_tag` = `tag_trad`.`id_tag` LEFT JOIN langue on tag_trad.id_langue=langue.id_langue where langue='" . $langue . "' and tag.id_tag=" . $id);
        $rset = $query->result();

        $rep = new Tag();
        if (isset($rset) && !empty($rset)) {
            $rset = $rset[0];
            $rep->setId_tag($rset->id_tag);
            $rep->setVal($rset->val);
        }
        return $rep;
    }

    function save($tag) {
        $object = array('id_tag' => $tag->getId_tag());
        $id = $this->create('tag', $object, TRUE);
        if ($id != false) {
            $tag->setId_tag($id);
            $object_trad = array('id_tag' => $id, 'id_langue' => 1, 'val' => $tag->getVal()[1]);
            $this->create('tag_trad', $object_trad, false);
            $object_trad_en = array('id_tag' => $id, 'id_langue' => 2, 'val' => $tag->getVal()[2]);
            $this->create('tag_trad', $object_trad_en, false);
        }
    }

    function modify($tag) {
        $id = $tag->getId_tag();

        $where = array('id_tag' => $id, 'id_langue' => 1);
        $object_trad = array('val' => $tag->getVal()[1]);
        $this->update('tag_trad', $object_trad, $where);

        $where = array('id_tag' => $id, 'id_langue' => 2);
        $object_trad_en = array('val' => $tag->getVal()[2]);
        $this->update('tag_trad', $object_trad_en, $where);
    }

    function remove($tag) {
        $annonces = $this->Annonce_Model->getByTag($tag->getId_tag());
        foreach ($annonces as $annonce) {
            $where = array('id_ann' => $annonce->getId_ann());
            $object = array('id_tag' => NULL);
            $this->update('annonce', $object, $where);
        }
        $where = array('id_tag' => $tag->getId_tag());
        $this->delete('tag_trad', $where);
        $this->delete('tag', $where);
    }

}
