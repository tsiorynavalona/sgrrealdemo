<?php
error_reporting(0);
ini_set('display_errors', 0);
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Index
 *
 * @author mrandria
 */
class Index extends CI_Controller {

    function __construct() {
        parent::__construct();
        if ($this->session->userdata('site_lang') == null) {
            $this->session->set_userdata('site_lang', 'french');
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

	public function index($page = null) {
		
        $data['url'] = 'index/index';
        if ($page == null || $page == "") {
            $page = 1;
        }
        $data['nb_donnees_afficher'] = 19;

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
        $data['mois'] = $this->lang->line("mois");

        $data['langue'] = $this->session->userdata('site_lang');
        $data['types'] = $this->Type_Model->getAll($this->session->userdata('site_lang'));
        $data['regions'] = $this->Region_Model->getAll($this->session->userdata('site_lang'));
        $data['sousregions'] = $this->Sousregion_Model->getAll($this->session->userdata('site_lang'));
        $data['statuts'] = $this->Statut_Model->getAll($this->session->userdata('site_lang'));

        $data['statut_type'] = $this->Statut_Type_Model->getAll($this->session->userdata('site_lang'));

        $data['mesures'] = $this->Mesure_Model->getAll($this->session->userdata('site_lang'));
        $data['devises'] = $this->Devise_Model->getAll($this->session->userdata('site_lang'));
        $data['textes'] = $this->Texte_Model->getAll($this->session->userdata('site_lang'));
        $data['citations'] = $this->Citation_Model->getAll($this->session->userdata('site_lang'));
        $data['total_annonces_premieres'] = $this->Annonce_Model->getFeaturedProp($this->session->userdata('site_lang'));
        $data['annonces_premieres'] = $this->Annonce_Model->getFeaturedProp($this->session->userdata('site_lang'), $data['nb_donnees_afficher'], $page);
        $data['annonces_nouveaute'] = $this->Annonce_Model->getNews($this->session->userdata('site_lang'));
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
        $data['recherche_rapide'] = $this->lang->line("Rechercher");

        // content
        $data['propriete_en_premiere'] = $this->lang->line("Propriété en Première");
        $data['nouveaute'] = $this->lang->line("Nouveauté");
        $data['more'] = $this->lang->line("de details");
        $data['url_annonce'] = $this->lang->line("annonce");
        $data['nb_piece_label'] = $this->lang->line("nb_piece");

        $data['page'] = $page;
//        $nbr_total_donnees = count(array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 1, 2, 3, 4)); //pour num pagination
        $nbr_total_donnees = count($data['total_annonces_premieres']);
        if ($nbr_total_donnees % $data['nb_donnees_afficher'] == 0) {
            $data['nb_page'] = intval($nbr_total_donnees / $data['nb_donnees_afficher']);
        } else {
            $data['nb_page'] = intval($nbr_total_donnees / $data['nb_donnees_afficher'] + 1);
        }

        $data['contents'] = 'content/index';
        $this->load->view('templates/template', $data);
    }
	
	

    public function recherche_multicritere($page = null) {
        $data['url'] = 'index/recherche_multicritere';
        $data['nb_donnees_afficher'] = 10;
        $criteres = $this->input->get();
        if ($page == null || $page == "") {
            $page = 1;
            $this->session->set_userdata('criteres', $criteres);
        }
        else{
            $criteres = $_SESSION['criteres'];
        }
        if (!isset($criteres['id_type'])) {
            $criteres['id_type'] = '';
        }
        if (!isset($criteres['id_statut'])) {
            $criteres['id_statut'] = '';
        }
        if (!isset($criteres['id_sousregion'])) {
            $criteres['id_sousregion'] = '';
        }
//        $critInCols = array("id_type" => $posts["id_type"], "id_statut" => $posts["id_statut"], "id_region" => $posts["id_region"], "annonce.reference" => $posts["reference"]);
//        $and = array("prix>=" => $posts['prix_min'], "prix<=" => $posts['prix_max'], "nom_icone" => "Chambre", "icone.val" => $posts["chambre"]);
//        $or = array("prix>=" => $posts['prix_min'], "prix<=" => $posts['prix_max'], "nom_icone" => "Chambre", "icone.val" => $posts["chambre"]);
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
        $data['sousregions'] = $this->Sousregion_Model->getAll($this->session->userdata('site_lang'));
        $data['statuts'] = $this->Statut_Model->getAll($this->session->userdata('site_lang'));
        $data['mesures'] = $this->Mesure_Model->getAll($this->session->userdata('site_lang'));
        $data['devises'] = $this->Devise_Model->getAll($this->session->userdata('site_lang'));
        $data['textes'] = $this->Texte_Model->getAll($this->session->userdata('site_lang'));
        $data['citations'] = $this->Citation_Model->getAll($this->session->userdata('site_lang'));
        $data['annonces_premieres'] = $this->Annonce_Model->getFeaturedProp($this->session->userdata('site_lang'));
        $data['annonces_nouveaute'] = $this->Annonce_Model->getNews($this->session->userdata('site_lang'));
        $data['actus'] = $this->Actualite_Model->getAll($this->session->userdata('site_lang'));
        $data['statut_type'] = $this->Statut_Type_Model->getAll($this->session->userdata('site_lang'));

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
        $data['region_label'] = $this->lang->line("Région");
        $data['par_reference'] = $this->lang->line("Par référence");
        $data['type_de_transaction'] = $this->lang->line("Type de transaction");
        $data['surface_habitable'] = $this->lang->line("Surface habitable");
        $data['chambres'] = $this->lang->line("Chambres");
        $data['rechercher'] = $this->lang->line("Rechercher");

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

//echo '<pre>';print_r($criteres);echo '</pre>';exit;
        $data['total_results'] = $this->Annonce_Model->searchByCrit($criteres, $this->session->userdata('site_lang'));
        $data['results'] = $this->Annonce_Model->searchByCrit($criteres, $this->session->userdata('site_lang'), $data['nb_donnees_afficher'], $page);
//        $data['results'][] = $data['results'][0];
        $data['page'] = $page;
//        $nbr_total_donnees = count(array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 1, 2, 3, 4)); //pour num pagination
        $nbr_total_donnees = count($data['total_results']);
        if ($nbr_total_donnees % $data['nb_donnees_afficher'] == 0) {
            $data['nb_page'] = intval($nbr_total_donnees / $data['nb_donnees_afficher']);
        } else {
            $data['nb_page'] = intval($nbr_total_donnees / $data['nb_donnees_afficher'] + 1);
        }

        $data['contents'] = 'content/resultat_recherche';
        $this->load->view('templates/template', $data);
    }

    public function search($page = null) {
        $data['url'] = 'index/search';
        if ($page == null || $page == "") {
            $page = 1;
        }
        $data['nb_donnees_afficher'] = 10;

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
        $data['sousregions'] = $this->Sousregion_Model->getAll($this->session->userdata('site_lang'));
        $data['statuts'] = $this->Statut_Model->getAll($this->session->userdata('site_lang'));
        $data['mesures'] = $this->Mesure_Model->getAll($this->session->userdata('site_lang'));
        $data['devises'] = $this->Devise_Model->getAll($this->session->userdata('site_lang'));
        $data['textes'] = $this->Texte_Model->getAll($this->session->userdata('site_lang'));
        $data['citations'] = $this->Citation_Model->getAll($this->session->userdata('site_lang'));
        $data['annonces_premieres'] = $this->Annonce_Model->getFeaturedProp($this->session->userdata('site_lang'));
        $data['annonces_nouveaute'] = $this->Annonce_Model->getNews($this->session->userdata('site_lang'));
        $data['actus'] = $this->Actualite_Model->getAll($this->session->userdata('site_lang'));
        $data['statut_type'] = $this->Statut_Type_Model->getAll($this->session->userdata('site_lang'));

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
        $data['region_label'] = $this->lang->line("Région");
        $data['par_reference'] = $this->lang->line("Par référence");
        $data['type_de_transaction'] = $this->lang->line("Type de transaction");
        $data['surface_habitable'] = $this->lang->line("Surface habitable");
        $data['chambres'] = $this->lang->line("Chambres");
        $data['rechercher'] = $this->lang->line("Rechercher");

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

        $keywords = $this->input->get('search');
        $data['total_results'] = $this->Annonce_Model->searchByKeywords($keywords, $this->session->userdata('site_lang'));
        $data['results'] = $this->Annonce_Model->searchByKeywords($keywords, $this->session->userdata('site_lang'), $data['nb_donnees_afficher'], $page);
//        $data['results'][] = $data['results'][0];
        $data['page'] = $page;
//        $nbr_total_donnees = count(array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 1, 2, 3, 4)); //pour num pagination
        $nbr_total_donnees = count($data['total_results']);
        if ($nbr_total_donnees % $data['nb_donnees_afficher'] == 0) {
            $data['nb_page'] = intval($nbr_total_donnees / $data['nb_donnees_afficher']);
        } else {
            $data['nb_page'] = intval($nbr_total_donnees / $data['nb_donnees_afficher'] + 1);
        }

        $data['contents'] = 'content/resultat_recherche';
        $this->load->view('templates/template', $data);
    }

    public function searchMenu($idtype, $idstatut, $page = null) {
        $menu = $this->Statut_Model->getById($idstatut, $this->session->userdata('site_lang'));
        $sousmenu = $this->Type_Model->getById($idtype, $this->session->userdata('site_lang'));
        if (!isset($menu) || !isset($sousmenu)) {
            redirect(site_url('index'));
        }
        $data['menu'] = $menu->getVal();
        $data['sousmenu'] = $sousmenu->getVal();

        $data['url'] = 'menu/' . url_title(convert_accented_characters($data['menu']), '-', true) . '/' . url_title(convert_accented_characters($data['sousmenu']), '-', true) . '-' . $idtype . '-' . $idstatut;
        if ($page == null || $page == "") {
            $page = 1;
        }
        $data['nb_donnees_afficher'] = 10;

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

        $data['textes'] = $this->Texte_Model->getAll($this->session->userdata('site_lang'));
        $data['citations'] = $this->Citation_Model->getAll($this->session->userdata('site_lang'));
        $data['langue'] = $this->session->userdata('site_lang');
        $data['types'] = $this->Type_Model->getAll($this->session->userdata('site_lang'));
        $data['regions'] = $this->Region_Model->getAll($this->session->userdata('site_lang'));
        $data['sousregions'] = $this->Sousregion_Model->getAll($this->session->userdata('site_lang'));
        $data['statuts'] = $this->Statut_Model->getAll($this->session->userdata('site_lang'));
        $data['mesures'] = $this->Mesure_Model->getAll($this->session->userdata('site_lang'));
        $data['devises'] = $this->Devise_Model->getAll($this->session->userdata('site_lang'));
        $data['annonces_premieres'] = $this->Annonce_Model->getFeaturedProp($this->session->userdata('site_lang'));
        $data['annonces_nouveaute'] = $this->Annonce_Model->getNews($this->session->userdata('site_lang'));
        $data['actus'] = $this->Actualite_Model->getAll($this->session->userdata('site_lang'));
        $data['statut_type'] = $this->Statut_Type_Model->getAll($this->session->userdata('site_lang'));

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
        $data['region_label'] = $this->lang->line("Région");
        $data['par_reference'] = $this->lang->line("Par référence");
        $data['type_de_transaction'] = $this->lang->line("Type de transaction");
        $data['surface_habitable'] = $this->lang->line("Surface habitable");
        $data['chambres'] = $this->lang->line("Chambres");
        $data['rechercher'] = $this->lang->line("Rechercher");

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

        $data['total_results'] = $this->Annonce_Model->searchMenu($idtype, $idstatut, $this->session->userdata('site_lang'));
        $data['results'] = $this->Annonce_Model->searchMenu($idtype, $idstatut, $this->session->userdata('site_lang'), $data['nb_donnees_afficher'], $page);
//        $data['results'][] = $data['results'][0];

        $data['page'] = $page;
//        $nbr_total_donnees = count(array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 1, 2, 3, 4)); //pour num pagination
        $nbr_total_donnees = count($data['total_results']);
        if ($nbr_total_donnees % $data['nb_donnees_afficher'] == 0) {
            $data['nb_page'] = intval($nbr_total_donnees / $data['nb_donnees_afficher']);
        } else {
            $data['nb_page'] = intval($nbr_total_donnees / $data['nb_donnees_afficher'] + 1);
        }

        $data['contents'] = 'content/resultat_recherche';
        $this->load->view('templates/template', $data);
    }

    public function searchByRegion($idregion, $page = null) {
        $data['url'] = '/region';
        if ($page == null || $page == "") {
            $page = 1;
        }
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

        $data['textes'] = $this->Texte_Model->getAll($this->session->userdata('site_lang'));
        $data['citations'] = $this->Citation_Model->getAll($this->session->userdata('site_lang'));
        $data['langue'] = $this->session->userdata('site_lang');
        $data['types'] = $this->Type_Model->getAll($this->session->userdata('site_lang'));
        $data['regions'] = $this->Region_Model->getAll($this->session->userdata('site_lang'));
        $data['sousregions'] = $this->Sousregion_Model->getAll($this->session->userdata('site_lang'));
        $data['statuts'] = $this->Statut_Model->getAll($this->session->userdata('site_lang'));
        $data['mesures'] = $this->Mesure_Model->getAll($this->session->userdata('site_lang'));
        $data['devises'] = $this->Devise_Model->getAll($this->session->userdata('site_lang'));
        $data['annonces_premieres'] = $this->Annonce_Model->getFeaturedProp($this->session->userdata('site_lang'));
        $data['annonces_nouveaute'] = $this->Annonce_Model->getNews($this->session->userdata('site_lang'));
        $data['actus'] = $this->Actualite_Model->getAll($this->session->userdata('site_lang'));
        $data['statut_type'] = $this->Statut_Type_Model->getAll($this->session->userdata('site_lang'));

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
        $data['region_label'] = $this->lang->line("Région");
        $data['par_reference'] = $this->lang->line("Par référence");
        $data['type_de_transaction'] = $this->lang->line("Type de transaction");
        $data['surface_habitable'] = $this->lang->line("Surface habitable");
        $data['chambres'] = $this->lang->line("Chambres");
        $data['rechercher'] = $this->lang->line("Rechercher");

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

        $menu = $this->Region_Model->getById($idregion, $this->session->userdata('site_lang'));
        $data['menu'] = $menu->getVal();
        $data['nb_donnees_afficher'] = 10;
        $data['total_results'] = $this->Annonce_Model->searchByRegion($idregion, $this->session->userdata('site_lang'));
        $data['results'] = $this->Annonce_Model->searchByRegion($idregion, $this->session->userdata('site_lang'), $data['nb_donnees_afficher'], $page);

        $data['page'] = $page;
//        $nbr_total_donnees = count(array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 1, 2, 3, 4)); //pour num pagination
        $nbr_total_donnees = count($data['total_results']);
        if ($nbr_total_donnees % $data['nb_donnees_afficher'] == 0) {
            $data['nb_page'] = intval($nbr_total_donnees / $data['nb_donnees_afficher']);
        } else {
            $data['nb_page'] = intval($nbr_total_donnees / $data['nb_donnees_afficher'] + 1);
        }

        $data['contents'] = 'content/resultat_recherche';
        $this->load->view('templates/template', $data);
    }

    public function quickSearch($page = null) {
        $data['url'] = 'index/quickSearch';
        if ($page == null || $page == "") {
            $page = 1;
        }
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

        $data['textes'] = $this->Texte_Model->getAll($this->session->userdata('site_lang'));
        $data['citations'] = $this->Citation_Model->getAll($this->session->userdata('site_lang'));
        $data['langue'] = $this->session->userdata('site_lang');
        $data['types'] = $this->Type_Model->getAll($this->session->userdata('site_lang'));
        $data['regions'] = $this->Region_Model->getAll($this->session->userdata('site_lang'));
        $data['sousregions'] = $this->Sousregion_Model->getAll($this->session->userdata('site_lang'));
        $data['statuts'] = $this->Statut_Model->getAll($this->session->userdata('site_lang'));
        $data['mesures'] = $this->Mesure_Model->getAll($this->session->userdata('site_lang'));
        $data['devises'] = $this->Devise_Model->getAll($this->session->userdata('site_lang'));
        $data['annonces_premieres'] = $this->Annonce_Model->getFeaturedProp($this->session->userdata('site_lang'));
        $data['annonces_nouveaute'] = $this->Annonce_Model->getNews($this->session->userdata('site_lang'));
        $data['actus'] = $this->Actualite_Model->getAll($this->session->userdata('site_lang'));
        $data['statut_type'] = $this->Statut_Type_Model->getAll($this->session->userdata('site_lang'));

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
        $data['region_label'] = $this->lang->line("Région");
        $data['par_reference'] = $this->lang->line("Par référence");
        $data['type_de_transaction'] = $this->lang->line("Type de transaction");
        $data['surface_habitable'] = $this->lang->line("Surface habitable");
        $data['chambres'] = $this->lang->line("Chambres");
        $data['rechercher'] = $this->lang->line("Rechercher");

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

        $data['nb_donnees_afficher'] = 10;
        $posts = $this->input->get();
        $data['total_results'] = $this->Annonce_Model->quickSearch($posts, $this->session->userdata('site_lang'));
        $data['results'] = $this->Annonce_Model->quickSearch($posts, $this->session->userdata('site_lang'), $data['nb_donnees_afficher'], $page);
//        $data['results'][] = $data['results'][0];
        $data['page'] = $page;
//        $nbr_total_donnees = count(array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 1, 2, 3, 4)); //pour num pagination
        $nbr_total_donnees = count($data['total_results']);
        if ($nbr_total_donnees % $data['nb_donnees_afficher'] == 0) {
            $data['nb_page'] = intval($nbr_total_donnees / $data['nb_donnees_afficher']);
        } else {
            $data['nb_page'] = intval($nbr_total_donnees / $data['nb_donnees_afficher'] + 1);
        }

        $data['contents'] = 'content/resultat_recherche';
        $this->load->view('templates/template', $data);
    }

    public function convert_metric() {
        $posts = $this->input->post();
        echo $this->Mesure_Model->convert($posts['avant'], $posts['apres'], $posts['to_convert']);
    }

    public function convert_devise() {
        $posts = $this->input->post();
        echo $this->Devise_Model->convert($posts['avant'], $posts['apres'], $posts['to_convert']);
    }

    function switchLanguage($language = "") {
        $this->session->set_userdata('site_lang', $language);
		/*
		echo "<script>window.location.assign('http://www.rpc-ea.com/')</script>";
        //redirect(site_url("index"));
		*/
		redirect(site_url("index"));
    }

}
