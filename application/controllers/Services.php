<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Contact
 *
 * @author mrandria
 */
class Services extends CI_Controller {

    function __construct() {
        parent::__construct();
        if ($this->session->userdata('site_lang') == null) {
            $this->session->set_userdata('site_lang', 'english');
        }
         $this->lang->load('index', $this->session->userdata('site_lang'));
        $this->lang->load('contact', $this->session->userdata('site_lang'));
        $this->lang->load('annonce', $this->session->userdata('site_lang'));
        $this->load->model('Type_Model');
        $this->load->model('Region_Model');
        $this->load->model('Statut_Model');
        $this->load->model('Statut_Type_Model');
        $this->load->model('Annonce_Model');
        $this->load->model('Mesure_Model');
        $this->load->model('Devise_Model');
        $this->load->model('Texte_Model');
        $this->load->model('Citation_Model');
        $this->load->model('Actualite_Model');
    }

    //put your code here
    public function index($success = null) {
        $data['url_annonce'] = $this->lang->line("annonce");
        $data['mois'] = $this->lang->line("mois");
        $data['agence'] = $this->lang->line("SGR Estate Agency");
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
		
		$data['mesures'] = $this->Mesure_Model->getAll($this->session->userdata('site_lang'));
        $data['devises'] = $this->Devise_Model->getAll($this->session->userdata('site_lang'));
        $data['textes'] = $this->Texte_Model->getAll($this->session->userdata('site_lang'));
        $data['citations'] = $this->Citation_Model->getAll($this->session->userdata('site_lang'));
        $data['annonces_premieres'] = $this->Annonce_Model->getFeaturedProp($this->session->userdata('site_lang'));
        $data['annonces_nouveaute'] = $this->Annonce_Model->getNews($this->session->userdata('site_lang'));
        $data['actus'] = $this->Actualite_Model->getAll($this->session->userdata('site_lang'));
        $data['statut_type'] = $this->Statut_Type_Model->getAll($this->session->userdata('site_lang'));
		
        $data['statuts'] = $this->Statut_Model->getAll($this->session->userdata('site_lang'));

        $data['statut_type'] = $this->Statut_Type_Model->getAll($this->session->userdata('site_lang'));

        $data['langue'] = $this->session->userdata('site_lang');
        //$data['textes'] = $this->Texte_Model->getAll($this->session->userdata('site_lang'));
       // $data['citations'] = $this->Citation_Model->getAll($this->session->userdata('site_lang'));
       // $data['annonces_premieres'] = $this->Annonce_Model->getFeaturedProp($this->session->userdata('site_lang'));
       // $data['annonces_nouveaute'] = $this->Annonce_Model->getNews($this->session->userdata('site_lang'));

        // side bar //
			$data['alerte_email'] = $this->lang->line("Alerte Email");
			$data['nom'] = $this->lang->line("Nom");
			$data['prenom'] = $this->lang->line("Prenom");
			$data['envoyer'] = $this->lang->line("Envoyer");
			$data['actu_evenement'] = $this->lang->line("Actu/Evenement");
			$data['conversion_metrique'] = $this->lang->line("Conversion Métrique");
			$data['convertir_de'] = $this->lang->line("Convertir de");
			$data['en'] = $this->lang->line("en");
			$data['valeur_a_convertir'] = $this->lang->line("Valeur à convertir");
			$data['resultat'] = $this->lang->line("Resultat");
			$data['convertir'] = $this->lang->line("Convertir");
			$data['conversion_devise'] = $this->lang->line("Conversion Devise");
		
		// content
			$data['url_annonce'] = $this->lang->line("annonce");
			$data['estimer_bien'] = $this->lang->line("estimer_bien");
			$data['text_result'] = $this->lang->line("text_result");
			$data['nb_piece_label'] = $this->lang->line("nb_piece");
			$data['type_bien'] = $this->lang->line("Type de bien");
			$data['type_de_transaction'] = $this->lang->line("Type de transaction");
			$data['reference'] = $this->lang->line("reference");
			$data['sous_region'] = $this->lang->line("sous_region");
			$data['more'] = $this->lang->line("de details");
			$data['url_estimate_property'] = $this->lang->line("estimate_property");
        
		$v = '';
		if(isset($_GET["v"])){
			$v = $_GET["v"];
		}
		
		if($v == "syndic-management-of-co-propriety"){
			//$data['contents'] = 'content/' . $v;
		}else{
			//$data['contents'] = 'content/property-management';
		}
		$data['contents'] = 'content/' . $v;
        
        $this->load->view('templates/template', $data);
    }

}
