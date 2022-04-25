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
            $this->session->set_userdata('site_lang', 'english');
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
     	public function success()
	{
		echo "hello";
	 //$data['contents'] = 'content/success';
     //$this->load->view('templates/template', $data);
	}
    public function envoyer() {
		$posts = $this->input->post();
		if(isset($posts['sendmessage']))
		{
			$lang="english";
			$id=$posts['proid'];
       $query = $this->db->query("SELECT * FROM `annonce` LEFT JOIN annonce_trad on annonce_trad.id_ann=annonce.id_ann LEFT JOIN langue on annonce_trad.id_langue=langue.id_langue where langue='".$lang."' and etat=1 and annonce.id_ann=" . $id)->row();		
		  $message2='<table border="0" cellpadding="0" cellspacing="0" width="100%"> 
 <tr>
<td style="padding: 10px 0 30px 0;">
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc; border-collapse: collapse;">
				   <tr>
                        <td align="center" bgcolor="#70bbd9" style="padding: 10px 0 10px 0; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;">
                            <h3 style="margin:20px 0px; color:#fff;"> '.ucfirst($query->titre_annonce).' </h3>
                        </td>
                    </tr>				   
				   <tr>  
                    </tr>				   
                    <tr>
                        <td bgcolor="#ffffff" style=" padding: 0px 30px 40px 30px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
								 <tr>
                                    <td style=" padding: 10px 20px 10px 20px; color: #153643; font-family: Arial, sans-serif; font-size: 14px;">
                                        <p style="color:#000; margin:10px 0px; font-size:20px; text-align:center;">has caught the interest of a visiter on <a href="https://sgrreal.com/" style="text-decoration:none;">www.sgrreal.com</a></p>
										
                                    </td>
                                </tr>								
								 <tr>
              <td style="padding: 10px 0 10px 0; color: #153643; font-family: Arial, sans-serif; font-size: 14px;">
                                      
<table width="100%"  cellpadding="5" cellspacing="0">
                                    <thead>
                                        <tr style="color: #153643; font-family: Arial, sans-serif; ">
                                         <td width="50%" style="text-align:left;margin0px;
										 padding:0px;">										 										 
										 <img src="'.base_url('assets/images/'.$query->image).'" width="100%">										 										 
										 </td>
										 <td width="50%" vertical-align="top" style="padding:10px 10px;text-align:left;">
										 <h2 style="color:#005ac5;"><a href="'.$posts['curl'].'">'.ucfirst($query->titre_annonce).'</a></h2>
										 <p>'.ucfirst($query->adresse_propriete).'</p>
										 <p>'.substr($query->description_annonce,0,70).'....<a href="'.$posts['curl'].'">Read more</a>
                                            <br>
                                            Ref : '.$query->reference.'
                                         </p>
										 <h2 style="color:#005ac5;">Rs '.$query->prix.'</h2>
										 </td>  
                                        </tr>
                                    </thead>
                                    <tbody>                                        										 										
                                    </tbody>
                                </table>									  
                                    </td>
                                </tr>													
<tr>
<td style="padding: 0px 0 0px 0; color: #153643; font-family: Arial, sans-serif; font-size: 14px;text-align:center;">                                     
<table width="100%"  cellpadding="5" cellspacing="0">
                                    <thead>
                                        <tr style="color: #153643; font-family: Arial, sans-serif; ">
                                         <td width="100%" style="padding:10px 10px;text-align:center;;">										 
										 <p> Here is all the information about this contact</p>
										 <p> Full Name : '.$posts['nom'].'</p>
										 <p> Phone : '.$posts['prenom'].'</p>
										 <p> Email : '.$posts['email'].'</p>
                                         <p> Visitor\'s message : '.$posts['message'] .'</p>
										 </td>  
                                        </tr>
                                    </thead>
                                    <tbody>	
                                    </tbody>
                                </table>									  
                                    </td>
                                </tr>															                             
                            </table>
                        </td>
                    </tr>                    
                </table>
            </td>
        </tr>
    </table>';	
       
        $to = 'dhankoolwant@gmail.com';
        $cc = 'lkdany0@gmail.com';
        $cc1 = 'dhan@sgrreal.com';//'lkdany0@gmail.com';
        $subject = 'Property contact'; //objet de l'email
        $subject2 = 'New lead on the advert ref: '.$query->reference.''; 
        $headers = "From: " . $posts['email'] . "\r\n";
        $headers .= 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
        $headers .= "Bcc:" . $cc . "\r\n";
        $headers .= "Bcc:" . $cc1 . "\r\n";
        $message = "<p>" . $titre . "</p>";
        $message .= "<p>Full name : " . $posts['nom'] . "</p>";
        $message .= "<p>Phone : " . $posts['prenom'] . "</p>";
        $message .= "<p>Email : " . $posts['email'] . "</p>";
        $message .= "<p>Address : " . $posts['address'] . "</p>";
        $message .= "<p>Message : " . $posts['message'] . "</p>";
        $retour = mail($to, $subject2, $message2, $headers);
		      if ($retour == 1) {
			$this->session->set_flashdata('msg', 'success');	  
            redirect($posts['curl'].'#contact_message');
        } else {
			$this->session->set_flashdata('msg', 'fail');
            redirect($posts['curl'].'#contact_message');
        }
		
		}
		else{
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

        $to = 'dhan@sgrreal.com';
		
//        $cc = 'miangaly.randriamifidy@gmail.com';
        $cc = 'lkdany0@gmail.com';
        $cc1 = 'dhankoolwant@gmail.com';//'lkdany0@gmail.com';
        $subject = 'Contact form enquiry'; //objet de l'email
        $headers = "From: " . $sender . "\r\n";
        $headers .= 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
        $headers .= "Bcc:" . $cc . "\r\n";
        $headers .= "Bcc:" . $cc1 . "\r\n";

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
            redirect(base_url('/Contact/index/success'));
        } else {
            redirect(base_url('/Contact/index/fail'));
        }
	}
    }


}
