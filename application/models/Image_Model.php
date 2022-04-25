<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Image_Model
 *
 * @author mrandria
 */
class Image_Model extends My_Model {

    function __construct() {
        parent::__construct();
        $this->load->library('Image');
    }

    function getAll() {
        $rset = $this->read('image', '*');
        $rep = array();
        if (isset($rset) && !empty($rset)) {
            foreach ($rset as $rec) {
                $temp = new Image();
                $temp->setId_image($rec->id_image);
                $temp->setNom_image($rec->nom_image);
                $rep[] = $temp;
            }
        }
        return $rep;
    }

    function getById($id) {
        $where = array('id_image' => $id);
        $rset = $this->read('image', '*', $where);
        $rep = new Image();
        if (isset($rset) && !empty($rset)) {
            $rset = $rset[0];
            $rep->setId_image($rset->id_image);
            $rep->setNom_image($rset->nom_image);
        }
        return $rep;
    }

    function save($image) {
        $object = array('nom_image' => $image->getNom_image());
        $id = $this->create('image', $object, TRUE);
        if ($id != false) {
            $image->setId_image($id);
        }
    }

    function modify($image) {
        $where = array('id_image' => $image->getId_image());
        $object = array('id_image' => $image->getId_image(), 'nom_image' => $image->getNom_image());
        return $this->update('image', $object, $where);
    }

    function remove($image) {
        $where = array('id_image' => $image->getId_image());
        return $this->delete('image', $where);
    }

}
