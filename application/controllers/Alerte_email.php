<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Alerte_email
 *
 * @author mrandria
 */
class Alerte_email extends CI_Controller {

    function __construct() {
        parent::__construct();
        if ($this->session->userdata('site_lang') == null) {
            $this->session->set_userdata('site_lang', 'english');
        }
        $this->lang->load('index', $this->session->userdata('site_lang'));
        $this->lang->load('contact', $this->session->userdata('site_lang'));
        $this->lang->load('alerte_email', $this->session->userdata('site_lang'));
        $this->load->model('Type_Model');
        $this->load->model('Region_Model');
        $this->load->model('Statut_Model');
        $this->load->model('Statut_Model');
        $this->load->model('Sousregion_Model');
        $this->load->model('Alerte_Model');
        $this->load->model('Texte_Model');
        $this->load->model('Citation_Model');
        $this->load->model('Statut_Type_Model');
    }

    //put your code here
    public function index($success = null) {

        $posts = $this->input->post();
        if (empty($posts) && $success == null) {
            redirect(site_url("index"));
        }
        if ($success != null) {
            $posts = $this->session->flashdata('post');
        }
		
		if(isset($_POST["statut"])){
			$posts = $this->input->post();
			$temp = new Alerte();
			$temp->setNom_prenom($_POST['nom']);
			$temp->setEmail($_POST['email']);
			$temp->setType_bien($_POST['type']);
			$temp->setStatut($_POST['statut']);
			if (isset($_POST['sous_region']))
				$temp->setSous_region($_POST['sous_region']);
			if (isset($_POST['surf_min']))
				$temp->setSurf_min($_POST['surf_min']);
			if (isset($_POST['surf_max']))
				$temp->setSurf_max($_POST['surf_max']);
			if (isset($_POST['nbre_piece']))
				$temp->setNbre_piece($_POST['nbre_piece']);
			if (isset($_POST['prix_min']))
				$temp->setPrix_min($_POST['prix_min']);
			if (isset($_POST['prix_max']))
				$temp->setPrix_max($_POST['prix_max']);
			if (isset($_POST['remarque']))
				$temp->setRemarque($_POST['remarque']);
			$retour = $this->Alerte_Model->save($temp);
	         

                //send email
        $to = $posts['email'];
        $cc = 'dhankoolwant@gmail.com';
        $cc1 = 'lkdany0@gmail.com';//'lkdany0@gmail.com';
        $subject = 'Alerte Email'; //objet de l'email
        $headers = "From: sgrreal.com\r\n";
        $headers .= 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
        $headers .= "Bcc:" . $cc . "\r\n";
        $headers .= "Bcc:" . $cc1 . "\r\n";

        $message .= "<p>Full Name : " . $posts['nom'] . "</p>";
        $message .= "<p>Email : " . $posts['email'] . "</p>";
        $message .= "<p>Property status : " . $posts['statut'] . "</p>";
        $message .= "<p>Property type : " . $posts['type'] . "</p>";
        $message .= "<p>Minimum Surface Area (m2): " . $posts['surf_min'] . "</p>";
        $message .= "<p>Maximum Surface Area (m2) : " .$posts['surf_max'] . "</p>";
        $message .= "<p>Number of units : " . $posts['nbre_piece'] . "</p>";
        $message .= "<p>Select a region : " .$posts['sous_region'] . "</p>";
        $message .= "<p>Minimum price (Rs) : " .$posts['prix_min'] . "</p>";
        $message .= "<p>Maximum price (Rs) : " .$posts['prix_max'] . "</p>";
        $message .= "<p>Your message : " .$posts['remarque'] . "</p>";
        mail($to, $subject, $message, $headers);
            //send email
			$this->session->set_flashdata('post', $posts);
			if ($retour != false) {
				$success = "success";
				//redirect(site_url('http://patrickpatisserie.info/Alerte_email/index/success'));
				//header("Location:http://patrickpatisserie.info/sgr/Alerte_email/index/success");
			} else {
				$success = "fail";
				//redirect(site_url('http://patrickpatisserie.info/Alerte_email/index/fail'));
				//header("Location:http://patrickpatisserie.info/sgr/Alerte_email/index/fail");
			}
		}
		
		
		
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

        $data['langue'] = $this->session->userdata('site_lang');
        $data['Alerte_email'] = 'Contact';
        /* $data['nom'] = '';
          $data['prenom'] = '';
          $data['email'] = '';
          if ($success == null) { */
        $data['nom'] = $posts['nom'];
        $data['prenom'] = $posts['prenom'];
        $data['email'] = $posts['email'];
        //}
        $data['types'] = $this->Type_Model->getAll($this->session->userdata('site_lang'));
        $data['regions'] = $this->Region_Model->getAll($this->session->userdata('site_lang'));
        $data['statuts'] = $this->Statut_Model->getAll($this->session->userdata('site_lang'));
        $data['sousregions'] = $this->Sousregion_Model->getAll($this->session->userdata('site_lang'));

        $data['statut_type'] = $this->Statut_Type_Model->getAll($this->session->userdata('site_lang'));

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
        $data['text_intro'] = $this->lang->line("text_intro");
        $data['info_perso'] = $this->lang->line("Informations Personnelles");
        $data['nom_label'] = $this->lang->line("Nom Complet");
        $data['votre_slerte'] = $this->lang->line("Votre Alerte");
        $data['select_type'] = $this->lang->line("Sélectionnez un type de transaction");
        $data['select_type_bien'] = $this->lang->line("Sélectionnez un type de bien");
        $data['sur_min'] = $this->lang->line("sur_min");
        $data['sur_max'] = $this->lang->line("sur_max");
        $data['nb_piece'] = $this->lang->line("nb_piece");
        $data['select_ville'] = $this->lang->line("Sélectionnez une ville");
        $data['prix_min'] = $this->lang->line("prix_min");
        $data['prix_max'] = $this->lang->line("prix_max");
        $data['your_msg'] = $this->lang->line("your_msg");
        $data['Champs_obligatoires'] = $this->lang->line("Champs obligatoires");
        $data['envoyer'] = $this->lang->line("Envoyer");
		
		if(isset($_GET["suc"])){
			$success = $_GET["suc"];
		}
		
        if ($success == 'success') {
            $data['msg'] = $this->lang->line("Success");
        } else if ($success == 'fail') {
            $data['error'] = $this->lang->line("Fail");
        }
        $data['contents'] = 'content/alerte_email';
        $this->load->view('templates/template', $data);
    }

    public function envoyer() {
    
        $posts = $this->input->post();

        $temp = new Alerte();
        $temp->setNom_prenom($posts['nom']);
        $temp->setEmail($posts['email']);
        $temp->setType_bien($posts['type']);
        $temp->setStatut($posts['statut']);
        if (isset($posts['sous_region']))
            $temp->setSous_region($posts['sous_region']);
        if (isset($posts['surf_min']))
            $temp->setSurf_min($posts['surf_min']);
        if (isset($posts['surf_max']))
            $temp->setSurf_max($posts['surf_max']);
        if (isset($posts['nbre_piece']))
            $temp->setNbre_piece($posts['nbre_piece']);
        if (isset($posts['prix_min']))
            $temp->setPrix_min($posts['prix_min']);
        if (isset($posts['prix_max']))
            $temp->setPrix_max($posts['prix_max']);
        if (isset($posts['remarque']))
            $temp->setRemarque($posts['remarque']);
        $retour = $this->Alerte_Model->save($temp);            			
        $this->session->set_flashdata('post', $posts);
        if ($retour != false) {
            redirect(site_url('Alerte_email/index/success'));
        } else {
            redirect(site_url('Alerte_email/index/fail'));
        }
        /*
          if ($temp->getNom_prenom() == NULL || $temp->getNom_prenom() == "") {
          redirect(base_url());
          }

          $rq = $temp->getRemarque();

          //send mail
          //        $to = 'info@wnv-solutions.com';
          $to = 'miangaly.randriamifidy@gmail.com';
          //$to = ' info@rpc-ea.com';
          //$to = ' henintsoa.rasoloson@gmail.com';
          $subject = 'Send Mail Objet'; //objet de l'email
          $headers = "From: " . $temp->getEmail() . "\r\n";
          $headers .= 'MIME-Version: 1.0' . "\r\n";
          $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

          $message = "<p>Bonjour, je m'appelle " . $temp->getNom_prenom() . "</p>";
          $message .= "<p>Je suis à la recherche d'un immobilier</p> ... ";
          $message .= "<br>NB: " . $rq;

          //        print_r($message);

          $retour = mail($to, $subject, $message, $headers);

          if ($retour == 1) {
          redirect(site_url('Alerte_email/index/success'));
          } else {
          redirect(site_url('Alerte_email/index/fail'));
          } */
    }

}
