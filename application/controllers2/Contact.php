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
class Contact extends CI_Controller {

    function __construct() {
        parent::__construct();
        if ($this->session->userdata('site_lang') == null) {
            $this->session->set_userdata('site_lang', 'french');
        }
        $this->lang->load('index', $this->session->userdata('site_lang'));
        $this->lang->load('contact', $this->session->userdata('site_lang'));
        $this->load->model('Type_Model');
        $this->load->model('Statut_Type_Model');
        $this->load->model('Region_Model');
        $this->load->model('Statut_Model');
        $this->load->model('Texte_Model');
        $this->load->model('Citation_Model');
        $this->load->model('Annonce_Model');
    }

    //put your code here
    public function index($success = null) {
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
        $data['nouveaute'] = $this->lang->line("Nouveauté");
        $data['annonce_vedette'] = $this->lang->line("Annonce vedette");
        $data['more'] = $this->lang->line("de details");

        //content
        $data['contact_form'] = $this->lang->line("Formulaire de contact");
        $data['infos_perso'] = $this->lang->line("Informations Personnelles");
        $data['content'] = $this->lang->line("content");
        $data['m'] = $this->lang->line("M");
        $data['mme'] = $this->lang->line("Mme");
        $data['mlle'] = $this->lang->line("Mlle");
        $data['nom'] = $this->lang->line("Nom");
        $data['prenom'] = $this->lang->line("Prenom");
        $data['votre_message'] = $this->lang->line("Votre message");
        $data['champs_obligatoires'] = $this->lang->line("Champs obligatoires");
        $data['sujet'] = $this->lang->line("Sujet");
        $data['envoyer'] = $this->lang->line("Envoyer");
        $data['adresse_postale'] = $this->lang->line("Adresse Postale");
        $data['map'] = $this->lang->line("Map de localisation");
        if ($success == 'success') {
            $data['msg'] = $this->lang->line("Success");
        } else if ($success == 'fail') {
            $data['error'] = $this->lang->line("Fail");
        }

        $data['contents'] = 'content/contact';
        $this->load->view('templates/template', $data);
    }

    public function envoyer() {
        $posts = $this->input->post();
        $sender = $posts['email'];
        $nom = $posts['nom'];

        $prenom = '';
        if (isset($posts['prenom']))
            $prenom = $posts['prenom'];

        if (isset($posts['titre']))
            $titre = $posts['titre'];

        if ($sender == NULL || $sender == "") {

            return 0;
        }

        $msg = $posts['message'];

        $to = 'contact@rpc-ea.com';
//        $cc = 'miangaly.randriamifidy@gmail.com';
        $cc = ' info@wnv-solutions.com';
        $subject = 'Contact form enquiry'; //objet de l'email
        $headers = "From: " . $sender . "\r\n";
        $headers .= 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
        $headers .= "Bcc:" . $cc . "\r\n";

        $message = "<p>" . $titre . "</p>";
        $message .= "<p>Nom : " . $nom . "</p>";
        $message .= "<p>Prenom : " . $prenom . "</p>";
        $message .= "<p>Email : " . $sender . "</p>";
        $message .= "<p>Telephone : " . $posts['telephone'] . "</p>";
        $message .= "<p>Mobile : " . $posts['mobile'] . "</p>";
        $message .= "<p>Fax : " . $posts['fax'] . "</p>";
        $message .= "<p>Adresse postale : " . $posts['adresse_postale'] . "</p>";
        $message .= "<p>Sujet : " . $posts['sujet'] . "</p>";
        $message .= "<p>Message : " . $msg . "</p>";

//        echo '<pre>';
//        print_r($message);
//        echo '<pre>';
//        exit;
        $retour = mail($to, $subject, $message, $headers);
        if ($retour == 1) {
            redirect(site_url('Contact/index/success'));
        } else {
            redirect(site_url('Contact/index/fail'));
        }
    }

}
