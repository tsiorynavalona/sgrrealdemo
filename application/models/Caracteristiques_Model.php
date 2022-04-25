<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Caracteristiques_Model
 *
 * @author mrandria
 */
class Caracteristiques_Model extends My_Model {

    function __construct() {
        parent::__construct();
        $this->load->library('Caracteristiques');
    }

    function getAll($langue) {
        $query = $this->db->query("SELECT * FROM `caracteristiques` LEFT JOIN `car_trad` ON `caracteristiques`.`id_car` = `car_trad`.`id_car` LEFT JOIN langue on car_trad.id_langue=langue.id_langue where langue='" . $langue . "'");
        $rset = $query->result();
        $rep = array();
        if (isset($rset) && !empty($rset)) {
            foreach ($rset as $rec) {
                $temp = new Caracteristiques();
                $temp->setId_car($rec->id_car);
                $temp->setVal($rec->val);
                $rep[] = $temp;
            }
        }
        return $rep;
    }

    function getById($id, $langue) {
        $query = $this->db->query("SELECT * FROM `caracteristiques` LEFT JOIN `car_trad` ON `caracteristiques`.`id_car` = `car_trad`.`id_car` LEFT JOIN langue on car_trad.id_langue=langue.id_langue where langue='" . $langue . "' and caracteristiques.id_car=" . $id);
        $rset = $query->result();
        if (isset($rset) && !empty($rset)) {
            $rec = $rset[0];
            $rep = new Caracteristiques();
            $rep->setId_car($rec->id_car);
            $rep->setVal($rec->val);
        }
        return $rep;
    }

    function save($car) {
        $object = array('id_car' => $car->getId_car());
        $id = $this->create('caracteristiques', $object, TRUE);
        if ($id != false) {
            $car->setId_car($id);
            $object_trad = array('id_car' => $id, 'id_langue' => 1, 'val' => $car->getVal()[1]);
            $this->create('car_trad', $object_trad, false);
            $object_trad_en = array('id_car' => $id, 'id_langue' => 2, 'val' => $car->getVal()[2]);
            $this->create('car_trad', $object_trad_en, false);
        }
    }

    function modify($car) {
        $id = $car->getId_car();

        $where = array('id_car' => $id, 'id_langue' => 1);
        $object_trad = array('val' => $car->getVal()[1]);
        $this->update('car_trad', $object_trad, $where);

        $where = array('id_car' => $id, 'id_langue' => 2);
        $object_trad_en = array('val' => $car->getVal()[2]);
        $this->update('car_trad', $object_trad_en, $where);
    }

    function remove($car) {
        $where = array('id_car' => $car->getId_car());
        $this->delete('car_trad', $where);
        $this->delete('caracteristiques', $where);
    }

}
