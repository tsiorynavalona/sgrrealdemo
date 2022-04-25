<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login_Model
 *
 * @author mrandria
 */
class Login_Model extends My_Model {

    function __construct() {
        parent::__construct();
        $this->load->library('Admin');
    }

    function login($admin) {
        $where = array('email' => $admin->getEmail(), 'mdp' => $admin->getMdp());
        $rset = $this->read('admin', '*', $where);
				
        if ($rset && count($rset) == 1) {
            $rset = $rset[0];
            return $rset->id_admin;
        }
        return null;
    }

    function getAdmin($id) {
        $where = array('id_admin' => $id);
        $rset = $this->read('admin', '*', $where);
        $rep = null;
        if (count($rset) == 1) {
            $rset = $rset[0];
            $rep = new Admin();
            $rep->setId_admin($rset->id_admin);
            $rep->setNom($rset->nom);
            $rep->setPrenom($rset->prenom);
        }
        return $rep;
    }

}
