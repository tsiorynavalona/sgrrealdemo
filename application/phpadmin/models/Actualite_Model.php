<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Actualite_Model
 *
 * @author mrandria
 */
class Actualite_Model extends My_Model {

    function __construct() {
        parent::__construct();
        $this->load->library('Actualite');
        $this->load->model('Image_Model');
    }

    function getAll($langue) {
//        echo "SELECT * FROM `actualite` LEFT JOIN `actualite_trad` ON `actualite`.`id_actu` = `actualite_trad`.`id_actu` LEFT JOIN langue on actualite_trad.id_langue=langue.id_langue where langue='" . $langue . "'";
//        exit;
        $query = $this->db->query("SELECT * FROM `actualite` LEFT JOIN `actualite_trad` ON `actualite`.`id_actu` = `actualite_trad`.`id_actu` LEFT JOIN langue on actualite_trad.id_langue=langue.id_langue where langue='" . $langue . "'");
        $rset = $query->result();
        $rep = array();
        if (isset($rset) && !empty($rset)) {
            foreach ($rset as $rec) {
                $temp = new Actualite();
                $temp->setId_actu($rec->id_actu);
                $temp->setTitre($rec->titre);
                $temp->setDescription($rec->description);
                $temp->setDate_evenement($rec->date_evenement);
                $temp->setImage($this->Image_Model->getById($rec->id_image));
                $rep[] = $temp;
            }
        }
        return $rep;
    }

    function getById($id, $langue) {
        $query = $this->db->query("SELECT * FROM `actualite` LEFT JOIN `actualite_trad` ON `actualite`.`id_actu` = `actualite_trad`.`id_actu` LEFT JOIN langue on actualite_trad.id_langue=langue.id_langue where langue='" . $langue . "' and actualite.id_actu=" . $id);
        $rset = $query->result();
        $rep = new Actualite();
        if (isset($rset) && !empty($rset)) {
            $rset = $rset[0];
            $rep->setId_actu($rset->id_actu);
            $rep->setTitre($rset->titre);
            $rep->setDescription($rset->description);
            $rep->setDate_evenement($rset->date_evenement);
            $rep->setImage($this->Image_Model->getById($rset->id_image));
        }
        return $rep;
    }

    function save($actualite) {
        // insert into base image
        $image = new Image();
        $image->setNom_image($actualite->getImage()->getNom_image());
        $this->Image_Model->save($image);
        $id_image = $image->getId_image();

        $object = array('id_actu' => $actualite->getId_actu(), 'date_evenement' => $actualite->getDate_evenement(), 'id_image' => $id_image);
        $id = $this->create('actualite', $object, TRUE);
        if ($id != false) {
            $actualite->setId_actu($id);
            $object_trad = array('id_actu' => $id, 'id_langue' => 1, 'description' => $actualite->getDescription()[1], 'titre' => $actualite->getTitre()[1]);
            $this->create('actualite_trad', $object_trad, false);
            $object_trad_en = array('id_actu' => $id, 'id_langue' => 2, 'description' => $actualite->getDescription()[2], 'titre' => $actualite->getTitre()[2]);
            $this->create('actualite_trad', $object_trad_en, false);
        }
    }

    function modify($actualite) {
        $image = new Image();
        $image->setNom_image($actualite->getImage()->getNom_image());
        $this->Image_Model->save($image);
        $id_image = $image->getId_image();

        $id = $actualite->getId_actu();
        $where = array('id_actu' => $id);
        $object = array('date_evenement' => $actualite->getDate_evenement(), 'id_image' => $id_image);
        $this->update('actualite', $object, $where);

        $where = array('id_actu' => $actualite->getId_actu(), 'id_langue' => 1);
        $object_trad = array('description' => $actualite->getDescription()[1], 'titre' => $actualite->getTitre()[1]);
        $this->update('actualite_trad', $object_trad, $where);

        $where = array('id_actu' => $actualite->getId_actu(), 'id_langue' => 2);
        $object_trad_en = array('description' => $actualite->getDescription()[2], 'titre' => $actualite->getTitre()[2]);
        $this->update('actualite_trad', $object_trad_en, $where);
    }

    function remove($actualite) {
        $where = array('id_actu' => $actualite->getId_actu());
        $this->delete('actualite_trad', $where);
        $this->delete('actualite', $where);
    }

}
