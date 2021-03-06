<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Annonce_Ctrl
 *
 * @author mrandria
 */
class Annonce_Ctrl extends CI_Controller {

    function __construct() {
        parent::__construct();
        if ($this->session->userdata('site_lang') == null) {
            $this->session->set_userdata('site_lang', 'french');
        }
        $this->lang->load('index', $this->session->userdata('site_lang'));
        $this->lang->load('annonce', $this->session->userdata('site_lang'));
        $this->load->model('Type_Model');
        $this->load->model('Region_Model');
        $this->load->model('Statut_Model');
        $this->load->model('Sousregion_Model');
        $this->load->model('Statut_Type_Model');
        $this->load->model('Annonce_Model');
        $this->load->model('Texte_Model');
        $this->load->model('Citation_Model');
        $this->load->model('Actualite_Model');
        $this->load->model('Mesure_Model');
        $this->load->model('Devise_Model');
    }

    //put your code here
    public function index($id) {
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

        $data['langue'] = $this->session->userdata('site_lang');
        $data['types'] = $this->Type_Model->getAll($this->session->userdata('site_lang'));
        $data['regions'] = $this->Region_Model->getAll($this->session->userdata('site_lang'));
        $data['statuts'] = $this->Statut_Model->getAll($this->session->userdata('site_lang'));
        $data['statut_type'] = $this->Statut_Type_Model->getAll($this->session->userdata('site_lang'));
        $data['sousregions'] = $this->Sousregion_Model->getAll($this->session->userdata('site_lang'));
        $data['mesures'] = $this->Mesure_Model->getAll($this->session->userdata('site_lang'));
        $data['devises'] = $this->Devise_Model->getAll($this->session->userdata('site_lang'));
        $data['textes'] = $this->Texte_Model->getAll($this->session->userdata('site_lang'));
        $data['citations'] = $this->Citation_Model->getAll($this->session->userdata('site_lang'));
        $data['actus'] = $this->Actualite_Model->getAll($this->session->userdata('site_lang'));

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

        // Search
        $data['type_de_bien'] = $this->lang->line("Type de bien");
        $data['region'] = $this->lang->line("Région");
        $data['par_reference'] = $this->lang->line("Par référence");
        $data['type_de_transaction'] = $this->lang->line("Type de transaction");
        $data['surface_habitable'] = $this->lang->line("Surface habitable");
        $data['chambres'] = $this->lang->line("Chambres");
        $data['rechercher'] = $this->lang->line("Rechercher");

        // Content
        $data['type_de_bien'] = $this->lang->line("Type de bien");
        $data['accueil'] = $this->lang->line("accueil");
        $data['imprimer'] = $this->lang->line("imprimer");
        $data['version_pdf'] = $this->lang->line("version_pdf");
        $data['caracteristique'] = $this->lang->line("caracteristique");
        $data['google_map'] = $this->lang->line("google_map");
        $data['region'] = $this->lang->line("Région");
        $data['sous_region'] = $this->lang->line("sous_region");
        $data['prix'] = $this->lang->line("prix");
        $data['agent_a_contacter'] = $this->lang->line("agent_a_contacter");
        $data['reference'] = $this->lang->line("reference");

        $data['annonce'] = $this->Annonce_Model->getById($id, $this->session->userdata('site_lang'));

        $data['contents'] = 'content/annonce';
        $this->load->view('templates/template', $data);
    }

    function createPdf($id) {
        $data['langue'] = $this->session->userdata('site_lang');
        $data['types'] = $this->Type_Model->getAll($this->session->userdata('site_lang'));
        $data['regions'] = $this->Region_Model->getAll($this->session->userdata('site_lang'));
        $data['statuts'] = $this->Statut_Model->getAll($this->session->userdata('site_lang'));
        $data['sousregions'] = $this->Sousregion_Model->getAll($this->session->userdata('site_lang'));
        $data['mesures'] = $this->Mesure_Model->getAll($this->session->userdata('site_lang'));
        $data['devises'] = $this->Devise_Model->getAll($this->session->userdata('site_lang'));
        $data['textes'] = $this->Texte_Model->getAll($this->session->userdata('site_lang'));
        $data['citations'] = $this->Citation_Model->getAll($this->session->userdata('site_lang'));

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

        // Search
        $data['type_de_bien'] = $this->lang->line("Type de bien");
        $data['region'] = $this->lang->line("Région");
        $data['par_reference'] = $this->lang->line("Par référence");
        $data['type_de_transaction'] = $this->lang->line("Type de transaction");
        $data['surface_habitable'] = $this->lang->line("Surface habitable");
        $data['chambres'] = $this->lang->line("Chambres");
        $data['rechercher'] = $this->lang->line("Rechercher");

        $data['annonce'] = $this->Annonce_Model->getById($id, $this->session->userdata('site_lang'));
        $this->load->library('Pdf');
        $this->load->view('pdf_view', $data);
    }

}
