<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Alerte_Model
 *
 * @author mrandria
 */
class Alerte_Model extends My_Model {

    function __construct() {
        parent::__construct();
        $this->load->library('Alerte');
        $this->load->model('Annonce_Model');
        $this->load->model('Type_Model');
        $this->load->model('Statut_Model');
        $this->load->model('Sousregion_Model');
    }

    function getById($id, $langue) {
        $where = array('id_alerte' => $id);
        $rset = $this->read('alerte_email', '*', $where);
        $rep = array();
        if (isset($rset) && !empty($rset)) {
            $rec = $rset[0];
            $temp = new Alerte();
            $temp->setId_alerte($rec->id_alerte);
            $temp->setNom_prenom($rec->nom_prenom);
            $temp->setEmail($rec->email);
            $temp->setType_bien($this->Type_Model->getById($rec->type_bien, $langue));
            $temp->setStatut($this->Statut_Model->getById($rec->statut, $langue));
            $temp->setSous_region($this->Sousregion_Model->getById($rec->sous_region, $langue));
            $temp->setSurf_min($rec->surf_min);
            $temp->setSurf_max($rec->surf_max);
            $temp->setNbre_piece($rec->nbre_piece);
            $temp->setPrix_min($rec->prix_min);
            $temp->setPrix_max($rec->prix_max);
            $temp->setRemarque($rec->remarque);
            $rep = $temp;
        }
        return $rep;
    }

    function getAll($langue) {
        $rset = $this->read('alerte_email', '*');
        $rep = array();
        if (isset($rset) && !empty($rset)) {
            foreach ($rset as $rec) {
                $temp = new Alerte();
                $temp->setId_alerte($rec->id_alerte);
                $temp->setNom_prenom($rec->nom_prenom);
                $temp->setEmail($rec->email);
                $temp->setType_bien($this->Type_Model->getById($rec->type_bien, $langue));
                $temp->setStatut($this->Statut_Model->getById($rec->statut, $langue));
                $temp->setSous_region($this->Sousregion_Model->getById($rec->sous_region, $langue));
                $temp->setSurf_min($rec->surf_min);
                $temp->setSurf_max($rec->surf_max);
                $temp->setNbre_piece($rec->nbre_piece);
                $temp->setPrix_min($rec->prix_min);
                $temp->setPrix_max($rec->prix_max);
                $temp->setRemarque($rec->remarque);
                $rep[] = $temp;
            }
        }
        return $rep;
    }

    function save($alerte) {
        $object = array('nom_prenom' => $alerte->getNom_prenom(), 'email' => $alerte->getEmail(), 'type_bien' => $alerte->getType_bien(), 'statut' => $alerte->getStatut(), 'sous_region' => $alerte->getSous_region(), 'surf_min' => $alerte->getSurf_min(), 'surf_max' => $alerte->getSurf_max(), 'nbre_piece' => $alerte->getNbre_piece(), 'prix_min' => $alerte->getPrix_min(), 'prix_max' => $alerte->getPrix_max(), 'remarque' => $alerte->getRemarque());
        $id = $this->create('alerte_email', $object, TRUE);
        if ($id != false) {
            $alerte->setId_alerte($id);
        }
    }

    function modify($alerte) {
        $where = array('id_alerte' => $alerte->getId_alerte());
        $object = array('nom_prenom' => $alerte->getNom_prenom(), 'email' => $alerte->getEmail(), 'type_bien' => $alerte->getType_bien(), 'statut' => $alerte->getStatut(), 'sous_region' => $alerte->getSous_region(), 'surf_min' => $alerte->getSurf_min(), 'surf_max' => $alerte->getSurf_max(), 'nbre_piece' => $alerte->getNbre_piece(), 'prix_min' => $alerte->getPrix_min(), 'prix_max' => $alerte->getPrix_max(), 'remarque' => $alerte->getRemarque());
        return $this->update('alerte_email', $object, $where);
    }

    function remove($alerte) {
        $where = array('id_alerte' => $alerte->getId_alerte());
        return $this->delete('alerte_email', $where);
    }

    function checkAlert($annonce) {
        $surface = $this->Annonce_Model->getIcone($annonce, "Surface");
        $nombre_piece = $this->Annonce_Model->getCar($annonce, "Nombre de pieces", 'french');
        if ($surface) {
            $where = array("type_bien" => $annonce->getType()->getId_type(), "statut" => $annonce->getStatut()->getId_statut(), "sous_region" => $annonce->getSousregion()->getId_sousregion(), "nbre_piece" => $nombre_piece, "surf_min<" => $surface, "surf_max>" => $surface, "prix_min<" => $annonce->getPrix(), "prix_max>" => $annonce->getPrix());
			//echo $this->db->last_query()."<br>";
            $rset = $this->read('alerte_email', '*', $where);
            if (count($rset) > 0) {
                return $rset;
            }
        }
        return false;
    }

}
