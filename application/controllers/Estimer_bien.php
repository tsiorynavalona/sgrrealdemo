<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Estimer_bien
 *
 * @author mrandria
 */
class Estimer_bien extends CI_Controller {

    function __construct() {
        parent::__construct();
        if ($this->session->userdata('site_lang') == null) {
            $this->session->set_userdata('site_lang', 'english');
        }
        $this->lang->load('index', $this->session->userdata('site_lang'));
        $this->lang->load('contact', $this->session->userdata('site_lang'));
        $this->lang->load('estimation', $this->session->userdata('site_lang'));
        $this->load->model('Type_Model');
        $this->load->model('Region_Model');
        $this->load->model('Statut_Model');
        $this->load->model('Statut_Type_Model');
        $this->load->model('Sousregion_Model');
        $this->load->model('Estimation_Model');
        $this->load->library('Estimation_bien');
        $this->load->model('Texte_Model');
        $this->load->model('Citation_Model');
        $this->load->model('Annonce_Model');
    }

    //put your code here
    public function index($success = null) {
		if(isset($_GET["suc"])){
			$success = $_GET["suc"];
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

        $data['types'] = $this->Type_Model->getAll($this->session->userdata('site_lang'));
        $data['regions'] = $this->Region_Model->getAll($this->session->userdata('site_lang'));
        $data['statuts'] = $this->Statut_Model->getAll($this->session->userdata('site_lang'));

        $data['statut_type'] = $this->Statut_Type_Model->getAll($this->session->userdata('site_lang'));

        $data['sousregions'] = $this->Sousregion_Model->getAll($this->session->userdata('site_lang'));
        $data['langue'] = $this->session->userdata('site_lang');
        $data['textes'] = $this->Texte_Model->getAll($this->session->userdata('site_lang'));
        $data['citations'] = $this->Citation_Model->getAll($this->session->userdata('site_lang'));
        $data['annonces_premieres'] = $this->Annonce_Model->getFeaturedProp($this->session->userdata('site_lang'));
        $data['annonces_nouveaute'] = $this->Annonce_Model->getNews($this->session->userdata('site_lang'));
        if ($success == 'success') {
            $data['msg'] = $this->lang->line("text_estimation");
        }
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
        $data['estimer_bien'] = $this->lang->line("Estimer un bien");
        $data['text_intro'] = $this->lang->line("text_intro");
        $data['nom_complet'] = $this->lang->line("nom_complet");
        $data['info_perso'] = $this->lang->line("Informations Personnelles");
        $data['your_property'] = $this->lang->line("Votre bien a estimer");
        $data['type_de_bien'] = $this->lang->line("Type de bien");
        $data['surface'] = $this->lang->line("Surface habitable");
        $data['nb_piece'] = $this->lang->line("nb_piece");
        $data['your_message'] = $this->lang->line("Precisez votre demande");
        $data['required_fields'] = $this->lang->line("Champs obligatoires");
        $data['envoyer'] = $this->lang->line("Envoyer");

        $data['contents'] = 'content/estimer_bien';
        $this->load->view('templates/template', $data);
    }

    public function envoyer() {
		
        $posts = $this->input->post();
        $temp = new Estimation_bien();
        $temp->setNom_prenom($posts['nom']);
        $temp->setEmail($posts['email']);
        $temp->setFax($posts['fax']);
        $temp->setTel($posts['telephone']);
        $temp->setType_bien($posts['type']);
        $temp->setLocalisation($posts['sousregion']);
        $temp->setSurface($posts['surface']);
        $temp->setRemarque($posts['desc']);
        $temp->setNbre_piece($posts['nb_piece']);

        $this->Estimation_Model->save($temp);
		
		
        $to = $posts['email'];
		$to2 = "dhankoolwant@gmail.com"; 
//        $cc = 'miangaly.randriamifidy@gmail.com';
        $cc = 'lkdany0@gmail.com';
        $cc1 = 'dhan@sgrreal.com';//'lkdany0@gmail.com';
        $cc2 = 'info@wnv-solutions.com';
        $subject = 'Estimate property'; //objet de l'email
        $headers = "From: sgrreal.com\r\n";
        $headers .= 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
        $headers .= "Bcc:" . $cc . "\r\n";
        $headers .= "Bcc:" . $cc1 . "\r\n";
	    $headers .= "Bcc:" .$cc2. "\r\n";

        $message .= "<p>Full Name : " . $posts['nom'] . "</p>";
        $message .= "<p>Email : " . $posts['email'] . "</p>";
        $message .= "<p>Fax : " . $posts['fax'] . "</p>";
        $message .= "<p>Telephone : " . $posts['telephone'] . "</p>";
        $message .= "<p>Property type: " . $posts['sousregion'] . "</p>";
        $message .= "<p>Living Area (m2) : " .$posts['surface'] . "</p>";
        $message .= "<p>Number of units : " . $posts['nb_piece'] . "</p>";
        $message .= "<p>Your message : " .$posts['desc'] . "</p>";

//        echo '<pre>';
//        print_r($message);
//        echo '<pre>';
//        exit;
         mail($to, $subject, $message, $headers);
         mail($to2, $subject, $message, $headers);
		$url = site_url() . "Estimer_bien/index/success";
		echo "<script>window.location.assign('". $url ."')</script>";
        //redirect(site_url('Estimer_bien/index/success'));
    }

    public function delete($id) {
        $estimation = new Estimation_bien();
        $estimation->setId_estimation($id);
        $this->Estimation_Model->remove($estimation);
        redirect('back_ctrl/Estimer_bien');
    }

}
