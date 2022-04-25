<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Client_Model
 *
 * @author mrandria
 */
class Client_Model extends My_Model {

    function __construct() {
        parent::__construct();
        $this->load->library('Client');
    }

    function getAll() {
        $where = array('etat' => true);
        $rset = $this->read('client', '*', $where);
        $rep = array();
        if (isset($rset) && !empty($rset)) {
            foreach ($rset as $rec) {
                $temp = new Client();
                $temp->setId_client($rec->id_client);
                $temp->setNom($rec->nom);
                $temp->setPrenom($rec->prenom);
                $temp->setNic($rec->nic);
                $temp->setTel($rec->tel);
                $temp->setFax($rec->fax);
                $temp->setAdresse($rec->adresse);
                $temp->setEmail($rec->email);
                $temp->setProfession($rec->profession);
                $temp->setEtat($rec->etat);
                $rep[] = $temp;
            }
        }
        return $rep;
    }

    function getById($id) {
        $where = array('id_client' => $id);
        $rset = $this->read('client', '*', $where);
        $rep = null;
        if (isset($rset) && !empty($rset)) {
            $rset = $rset[0];
            $rep = new Client();
            $rep->setId_client($rset->id_client);
            $rep->setNom($rset->nom);
            $rep->setPrenom($rset->prenom);
            $rep->setNic($rset->nic);
            $rep->setTel($rset->tel);
            $rep->setFax($rset->fax);
            $rep->setAdresse($rset->adresse);
            $rep->setEmail($rset->email);
            $rep->setProfession($rset->profession);
            $rep->setEtat($rset->etat);
        }
        return $rep;
    }

    function save($client) {
        $object = array('id_client' => $client->getId_client(), 'nom' => $client->getNom(), 'prenom' => $client->getPrenom(), 'nic' => $client->getNic(), 'tel' => $client->getTel(), 'fax' => $client->getFax(), 'adresse' => $client->getAdresse(), 'email' => $client->getEmail(), 'profession' => $client->getProfession(), 'etat' => true);
        $id = $this->create('client', $object, TRUE);
        if ($id != false) {
            $client->setId_client($id);
        }
    }

    function modify($client) {
        $where = array('id_client' => $client->getId_client());
        $object = array('id_client' => $client->getId_client(), 'nom' => $client->getNom(), 'prenom' => $client->getPrenom(), 'nic' => $client->getNic(), 'tel' => $client->getTel(), 'fax' => $client->getFax(), 'adresse' => $client->getAdresse(), 'email' => $client->getEmail(), 'profession' => $client->getProfession(), 'etat' => true);
        return $this->update('client', $object, $where);
    }

    function remove($client) {
        $where = array('id_client' => $client->getId_client());
        $this->delete('client_annonce', $where);

        $where = array('id_client' => $client->getId_client());
        $object = array('etat' => false);
        return $this->update('client', $object, $where);
    }

}
