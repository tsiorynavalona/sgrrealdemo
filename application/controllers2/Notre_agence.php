<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Notre_agence
 *
 * @author mrandria
 */
class Notre_agence extends CI_Controller {

    function __construct() {
        parent::__construct();
        if ($this->session->userdata('site_lang') == null) {
            $this->session->set_userdata('site_lang', 'french');
        }
        $this->lang->load('index', $this->session->userdata('site_lang'));
        $this->lang->load('contact', $this->session->userdata('site_lang'));
        $this->lang->load('notre_agence', $this->session->userdata('site_lang'));
        $this->load->model('Type_Model');
        $this->load->model('Region_Model');
        $this->load->model('Statut_Type_Model');
        $this->load->model('Statut_Model');
        $this->load->model('Texte_Model');
        $this->load->model('Citation_Model');
        $this->load->model('Annonce_Model');
    }

    //put your code here
    public function index() {
        $data['url_annonce'] = $this->lang->line("annonce");
        $data['mois'] = $this->lang->line("mois");
        $data['agence'] = $this->lang->line("RPC Estate Agency");
        $data['droit'] = $this->lang->line("All rights reserved");
        $data['contact_us'] = $this->lang->line("Contactez Nous");
        $data['adresse'] = $this->lang->line("adresse");
        $data['search_placeholder'] = $this->lang->line("Recherche par mots clés");
        $data['our_agency_text_1'] = $this->lang->line("our_agency_text_1");
        $data['our_agency_text_2'] = $this->lang->line("our_agency_text_2");
        $data['design'] = $this->lang->line("Designed by");
        $data['notre_agence'] = $this->lang->line("Our agency");
        $data['information'] = $this->lang->line("Information");
        $data['header_text'] = $this->lang->line("header_text");
        $data['header_text_bottom'] = $this->lang->line("header_text_bottom");
        $data['url_infos_utiles'] = $this->lang->line("useful_info");
        $data['url_notre_agence'] = $this->lang->line("our_agency");

        $data['types'] = $this->Type_Model->getAll($this->session->userdata('site_lang'));
        $data['regions'] = $this->Region_Model->getAll($this->session->userdata('site_lang'));
        $data['sousregions'] = $this->Sousregion_Model->getAll($this->session->userdata('site_lang'));
        $data['statuts'] = $this->Statut_Model->getAll($this->session->userdata('site_lang'));

        $data['statut_type'] = $this->Statut_Type_Model->getAll($this->session->userdata('site_lang'));

        $data['langue'] = $this->session->userdata('site_lang');
        $data['textes'] = $this->Texte_Model->getAll($this->session->userdata('site_lang'));
        $data['citations'] = $this->Citation_Model->getAll($this->session->userdata('site_lang'));
        $data['annonces_premieres'] = $this->Annonce_Model->getFeaturedProp($this->session->userdata('site_lang'));
        $data['annonces_nouveaute'] = $this->Annonce_Model->getNews($this->session->userdata('site_lang'));

        // side bar //
        $data['recherche_rapide'] = $this->lang->line("Recherche rapide");
        $data['reference'] = $this->lang->line("Numero de reference");
        $data['type_de_transaction'] = $this->lang->line("Type de transaction");
        $data['region_label'] = $this->lang->line("Région");
        $data['type_de_bien'] = $this->lang->line("Type de bien");
        $data['rechercher'] = $this->lang->line("Lancer la recherche");
        $data['annonce_vedette'] = $this->lang->line("Annonce vedette");
        $data['nouveaute'] = $this->lang->line("Nouveauté");
        $data['propriete_en_premiere'] = $this->lang->line("Propriété en Première");
        $data['more'] = $this->lang->line("de details");

        //content
        $data['nom'] = $this->lang->line("Nom");
        $data['prenom'] = $this->lang->line("Prenom");
        $data['votre_message'] = $this->lang->line("Votre message");
        $data['champs_obligatoires'] = $this->lang->line("Champs obligatoires");
        $data['sujet'] = $this->lang->line("Sujet");
        $data['envoyer'] = $this->lang->line("Envoyer");
        $data['adresse_postale'] = $this->lang->line("Adresse Postale");
        $data['map'] = $this->lang->line("Map de localisation");
        $data['content'] = $this->lang->line("content");

        $data['contents'] = 'content/notre_agence';
        $this->load->view('templates/template', $data);
    }

}
