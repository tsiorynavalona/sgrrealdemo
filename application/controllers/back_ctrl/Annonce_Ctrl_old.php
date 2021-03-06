<?php

class Annonce_Ctrl extends CI_Controller {

    protected $_data = array();

    function __construct() {
        parent::__construct();
        $this->load->model('Type_Model');
        $this->load->model('Region_Model');
        $this->load->model('Statut_Model');
        $this->load->model('Devise_Model');
        $this->load->model('Sousregion_Model');
        $this->load->model('Agent_Model');
        $this->load->model('Client_Model');
        $this->load->model('Tag_Model');
        $this->load->model('Caracteristiques_Model');
        $this->load->model('Icone_Model');
        $this->load->model('Annonce_Model');
        $this->load->model('Image_Model');
        $this->load->model('Alerte_Model');
        $this->load->model('Login_Model');
        $this->load->model('Statut_Type_Model');
        $this->load->model('Mesure_Model');
        $this->load->library('upload');
    }

    /*
     * Charge page : header + content + footer
     */

    public function ChargerPage($ma_page) {
        $this->_data['menu'] = array('Bien', 'Type', 'Caracteristique', 'Agent', 'Tags', 'Statut', 'Client', 'Devise', 'Lieu', 'Menu');
        $this->_data['menu_actif'] = "Bien";
        $this->_data['admin'] = $this->Login_Model->getAdmin($this->session->userdata('admin'));
        $this->load->view('back_templates/template', $this->_data);
    }

    /*
     * Redirection vers l'index
     */

    public function Bien() {
        redirect("back_ctrl/Annonce_Ctrl");
    }

    /*
     * Redirection vers la liste des annonces
     */

    public function index($page = null) {
		
        if ($this->session->userdata('admin') != null) {
           //$this->_data['annoncesAll'] = $this->Annonce_Model->getAll('french');
		   
		   if(isset($_GET["page"])){
			  $page = $_GET["page"]; 
			  }
		   
		   if(isset($_GET["v"])){
			 $vew = $_GET["v"];
			 if($vew == "Menu"){
				 $this->_data['sous_menu_actif'] = "Menu";
					$this->_data['statut_type'] = $this->Statut_Type_Model->getAll('french');
					$this->_data['contents'] = 'back_content/statuttype';
					$this->ChargerPage($this->_data);
				}
				return;  
			 }
		   
		   
           $this->nbr_total_donnees = count( $this->Annonce_Model->getAll('french') );
            // ---------------------    pagination          ------------
            if ($page == null || $page == "") {
                $page = 1;
            }
                $this->_data['url'] = 'back_ctrl/Annonce_Ctrl/index';
                $this->_data['nb_donnees_afficher'] = 30;
                $this->_data['page'] = $page;
                $this->_data['annonces'] = $this->Annonce_Model->getAllPerPage('french',$this->_data['nb_donnees_afficher'],$this->_data['page']);               
                
                if ($this->nbr_total_donnees % $this->_data['nb_donnees_afficher'] == 0) {
                    $this->_data['nb_page'] = intval($this->nbr_total_donnees / $this->_data['nb_donnees_afficher']);
                } else {
                    $this->_data['nb_page'] = intval($this->nbr_total_donnees / $this->_data['nb_donnees_afficher'] + 1);
                } 
            // -------------------------------
            $this->_data['contents'] = 'back_content/index';
            $this->_data['sous_menu_actif'] = "Bien";
            $this->ChargerPage($this->_data);
        } else {
            $this->load->view('back_content/login');
        }
    }

    public function rechercher() {
        $page = null;
        $this->_data['page'] = $page;
        $posts = $this->input->get();
        if ($this->session->userdata('admin') != null && !empty($posts)) {
			$ref = $posts['reference'];
			if($posts['reference'] == ""){
				$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
				$lnks = explode("?reference=", $actual_link);
				if(count($lnks) > 1){
					$ref = $lnks[1];
				}
			}
			
            $this->_data['annonces'] = $this->Annonce_Model->getByRef($ref, 'french', 1);
            $this->_data['contents'] = 'back_content/index';
            $this->_data['sous_menu_actif'] = "Bien";
            $this->ChargerPage($this->_data);
        } else {
            $this->load->view('back_content/login');
        }
    }

    public function rechercherTrash() {
        $page = null;
        $this->_data['page'] = $page;
        $posts = $this->input->get();
        if ($this->session->userdata('admin') != null && !empty($posts)) {
            $this->_data['annonces'] = $this->Annonce_Model->getByRef($posts['reference'], 'french', 0);
            $this->_data['contents'] = 'back_content/trash';
            $this->_data['sous_menu_actif'] = "Bien";
            $this->ChargerPage($this->_data);
        } else {
            $this->load->view('back_content/login');
        }
    }

    public function detail($id = '') {
        if ($this->session->userdata('admin') != null) {
			
			if(isset($_GET["id"])){
				$id = $_GET["id"];
			}
            if ($id == "") {
                redirect('back_ctrl');
            }
            $annonce = $this->Annonce_Model->getById($id, 'french');
            $annonce_en = $this->Annonce_Model->getById($id, 'english');
            $annonce->setTitre_annonce_en($annonce_en->getTitre_annonce());
            $annonce->setDescription_annonce_en($annonce_en->getDescription_annonce());
            $this->_data['types'] = $this->Type_Model->getAll('french');
            $this->_data['regions'] = $this->Region_Model->getAll('french');
            $this->_data['sousregions'] = $this->Sousregion_Model->getAll('french');
            $this->_data['statuts'] = $this->Statut_Model->getAll('french');
            $this->_data['agents'] = $this->Agent_Model->getAll();
            $this->_data['clients'] = $this->Client_Model->getAll();
            $this->_data['devises'] = $this->Devise_Model->getAll('french');
            $this->_data['tags'] = $this->Tag_Model->getAll('french');
            $this->_data['caracteristiques'] = $this->Caracteristiques_Model->getAll('french');
            $this->_data['icones'] = $this->Icone_Model->getAll();
            $this->_data['mesures'] = $this->Mesure_Model->getAll('french');
            $this->_data['annonce'] = $annonce;
            $this->_data['contents'] = 'back_content/modif_annonce';
            $this->_data['sous_menu_actif'] = "Bien";
            $this->ChargerPage($this->_data);
        } else {
            $this->load->view('back_content/login');
        }
    }

    public function ajout() {
        if ($this->session->userdata('admin') != null) {
            $this->_data['types'] = $this->Type_Model->getAll('french');
            $this->_data['regions'] = $this->Region_Model->getAll('french');
            $this->_data['sousregions'] = $this->Sousregion_Model->getAll('french');
            $this->_data['statuts'] = $this->Statut_Model->getAll('french');
            $this->_data['devises'] = $this->Devise_Model->getAll('french');
            $this->_data['agents'] = $this->Agent_Model->getAll();
            $this->_data['clients'] = $this->Client_Model->getAll();
            $this->_data['tags'] = $this->Tag_Model->getAll('french');
            $this->_data['caracteristiques'] = $this->Caracteristiques_Model->getAll('french');
            $this->_data['icones'] = $this->Icone_Model->getAll();
            $this->_data['mesures'] = $this->Mesure_Model->getAll('french');

            $this->_data['sous_menu_actif'] = "Bien";
            $this->_data['contents'] = 'back_content/ajout_annonce';
            $this->ChargerPage($this->_data);
        } else {
            $this->load->view('back_content/login');
        }
    }

    public function update_annonce() {
        $posts = $this->input->post();
        $annonce = $this->Annonce_Model->getById($posts['id_ann'], 'french');

        $files = $_FILES;
        $dataInfo = array();
        if (!empty($files)) {
            if (isset($files['userfile'])) {
                $cpt = count($files['userfile']['name']);

                for ($i = 0; $i < $cpt; $i++) {
                    $_FILES['userfile']['name'] = $files['userfile']['name'][$i];
                    $_FILES['userfile']['type'] = $files['userfile']['type'][$i];
                    $_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'][$i];
                    $_FILES['userfile']['error'] = $files['userfile']['error'][$i];
                    $_FILES['userfile']['size'] = $files['userfile']['size'][$i];

                    $this->upload->initialize($this->set_upload_options());
                    $this->upload->do_upload();
                    $dataInfo[] = $this->upload->data();
                }
            }
            if (isset($files['image'])) {
                if (count($files['image']['name']) > 0) {
                    $_FILES['image']['name'] = $files['image']['name'];
                    $_FILES['image']['type'] = $files['image']['type'];
                    $_FILES['image']['tmp_name'] = $files['image']['tmp_name'];
                    $_FILES['image']['error'] = $files['image']['error'];
                    $_FILES['image']['size'] = $files['image']['size'];
                    $this->upload->initialize($this->set_upload_options());
                    $this->upload->do_upload('image');
                    $imagedataInfo = $this->upload->data();
                }
            }
        }
        $images = array();
        foreach ($dataInfo as $data) {
            if ($data['file_name'] != '') {
                $temp = new Image();
                $temp->setNom_image($data['file_name']);
                $images[] = $temp;
            }
        }
        $annonce->setImages($images);
        if (isset($imagedataInfo)) {
            if ($imagedataInfo['file_name'] != '') {
                $annonce->setImagePrincipal($imagedataInfo['file_name']);
            }
        }
        $agent = null;

        if (isset($posts['id_agent']) && $posts['id_agent'] != '') {
            $agent = new Agent();
            $agent->setId_agent($posts['id_agent']);
        }

        $sous_region = new Sous_region();
        $sous_region->setId_sousregion($posts['id_sousregion']);
        $tag = null;
        if (isset($posts['id_tag']) && $posts['id_tag'] != '') {
            $tag = new Tag();
            $tag->setId_tag($posts['id_tag']);
        }
        $devise = new Devise();
        $devise->setId_devise($posts['id_devise']);
        $statut = new Statut();
        $statut->setId_statut($posts['id_statut']);
        $type = new Type_immobilier();
        $type->setId_type($posts['id_type']);
        $caracteristiques = array();

        foreach ($posts['id_car'] as $key => $id_car) {
            $temp = new Caracteristiques();
            $temp->setId_car($id_car);
            $temp->setVal_car($posts['val_car'][$key]);
            if ($posts['val_car'][$key] != '') {
                $caracteristiques[] = $temp;
            }
        }

        $icones = array();
		$annonce->setMeasure_Terrin(0);
		$annonce->setMeasure_Habit(0);
        foreach ($posts['id_icone'] as $key => $id_icone) {
            $temp = $this->Icone_Model->getById($id_icone);
            $temp->setVal_icone($posts['val_icone'][$key]);
            if ($id_icone == '3') {//surface
                if (isset($posts['id_mesure']) && $posts['id_mesure'] != '') {
					$annonce->setMeasure_Terrin($posts['id_mesure']);
                    $mesure = new Mesure();
                    $mesure->setId_mesure($posts['id_mesure']);
                    $temp->setMesure($mesure);
					
                }
            }
			
			if ($id_icone == '4') {//surface
                if (isset($posts['id_mesure2']) && $posts['id_mesure2'] != '') {
					$annonce->setMeasure_Habit($posts['id_mesure2']);
                    $mesure = new Mesure();
                    $mesure->setId_mesure($posts['id_mesure2']);
                    $temp->setMesure($mesure);
					
                }
            }

            if ($posts['val_icone'][$key] != '') {
                $icones[] = $temp;
            }
        }

        $clients = array();
        if (isset($posts['id_client']) && !empty($posts['id_client'])) {
            foreach ($posts['id_client'] as $id_client) {
                $client = new Client();
                $client->setId_client($id_client);
                $clients[] = $client;
            }
        }

        $annonce->setAgent($agent);
        $annonce->setClients($clients);
        $annonce->setReference($posts['reference']);
        $annonce->setSousregion($sous_region);
        $annonce->setTag($tag);
        $annonce->setDevise($devise);
        $annonce->setStatut($statut);
        $annonce->setType($type);
        $prix = $posts["prix"];
$prix = str_replace(",", "", $prix);
        $annonce->setPrix($prix);
        $annonce->setAdresse_propriete($posts['adresse']);
        $annonce->setVideo_url($posts['url']); //
        if (isset($posts['date_contrat']))
            $annonce->setDate_contrat($posts['date_contrat']);
        if (isset($posts['date_mandat']))
            $annonce->setDate_mandat($posts['date_mandat']);
        $annonce->setExclusivite($posts['exclusivite']);
        $annonce->setTitre_annonce($posts['titre_fr']);
        $annonce->setTitre_annonce_en($posts['titre_en']);
        $annonce->setDescription_annonce($posts['desc_fr']);
        $annonce->setDescription_annonce_en($posts['desc_en']);
        if ($posts['lat'] != '' && $posts['long'] != '')
            $annonce->setGoogle_map($posts['lat'] . "," . $posts['long']);
        $annonce->setIs_featuredproperty(0);
        $annonce->setPar_mois(0);
        $annonce->setCaracteristiques($caracteristiques);
        $annonce->setIcones($icones);

        if (isset($posts['is_propertyfeatured']))
            $annonce->setIs_featuredproperty($posts['is_propertyfeatured']);
        if (isset($posts['par_mois']))
            $annonce->setPar_mois($posts['par_mois']);

        $this->Annonce_Model->modify($annonce);
        redirect('http://sgrreal.com/back_ctrl');
    }

    public function save_annonce() {
        $files = $_FILES;
        // echo '<pre>';
        // print_r($files);
        //  echo '$tag</pre>';
        $cpt = count($files['userfile']['name']);

//        var_dump($cpt);
        for ($i = 0; $i < $cpt; $i++) {
            $_FILES['userfile']['name'] = $files['userfile']['name'][$i];
            $_FILES['userfile']['type'] = $files['userfile']['type'][$i];
            $_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'][$i];
            $_FILES['userfile']['error'] = $files['userfile']['error'][$i];
            $_FILES['userfile']['size'] = $files['userfile']['size'][$i];

            $this->upload->initialize($this->set_upload_options());
            $this->upload->do_upload();
            $dataInfo[] = $this->upload->data();
        }

        if (count($files['image']['name']) > 0) {
            $_FILES['image']['name'] = $files['image']['name'];
            $_FILES['image']['type'] = $files['image']['type'];
            $_FILES['image']['tmp_name'] = $files['image']['tmp_name'];
            $_FILES['image']['error'] = $files['image']['error'];
            $_FILES['image']['size'] = $files['image']['size'];
            $this->upload->initialize($this->set_upload_options());
            $this->upload->do_upload('image');
            $imagedataInfo = $this->upload->data();
        }

        $posts = $this->input->post();
        $annonce = new Annonce();
        $images = array();

        foreach ($dataInfo as $data) {
            $temp = new Image();
            $temp->setNom_image($data['file_name']);
            if ($data['file_name'] != '') {
                $images[] = $temp;
            }
        }

        $annonce->setImages($images);
        if (isset($imagedataInfo)) {
            $annonce->setImagePrincipal($imagedataInfo['file_name']);
        }

        $agent = null;
        if (isset($posts['id_agent']) && $posts['id_agent'] != '') {
            $agent = new Agent();
            $agent->setId_agent($posts['id_agent']);
        }

        $sous_region = $this->Sousregion_Model->getById($posts['id_sousregion'], 'French');
        $tag = null;
        if (isset($posts['id_tag']) && $posts['id_tag'] != '') {
            $tag = new Tag();
            $tag->setId_tag($posts['id_tag']);
        }
        $devise = new Devise();
        $devise->setId_devise($posts['id_devise']);
        $statut = $this->Statut_Model->getById($posts['id_statut'], 'French');
        $type = $this->Type_Model->getById($posts['id_type'], 'French');
		
        $caracteristiques = array();
        foreach ($posts['id_car'] as $key => $id_car) {
            $temp = new Caracteristiques();
            $temp->setId_car($id_car);
            $temp->setVal_car($posts['val_car'][$key]);
            if ($posts['val_car'][$key] != '') {
                $caracteristiques[] = $temp;
            }
        }
        $icones = array();
		$surfaceval = 0;
		$annonce->setMeasure_Terrin(0);
		$annonce->setMeasure_Habit(0);
        foreach ($posts['id_icone'] as $key => $id_icone) {
            $temp = $this->Icone_Model->getById($id_icone);
            $temp->setVal_icone($posts['val_icone'][$key]);
            if ($id_icone == '3') {//surface
                if (isset($posts['id_mesure']) && $posts['id_mesure'] != '') {
					$annonce->setMeasure_Terrin($posts['id_mesure']);
                    $mesure = new Mesure();
                    $mesure->setId_mesure($posts['id_mesure']);
                    $temp->setMesure($mesure);
					
                }
            }
			
			if ($id_icone == '4') {//surface
                if (isset($posts['id_mesure2']) && $posts['id_mesure2'] != '') {
					$annonce->setMeasure_Habit($posts['id_mesure2']);
                    $mesure = new Mesure();
                    $mesure->setId_mesure($posts['id_mesure2']);
                    $temp->setMesure($mesure);
					
                }
            }

            if ($posts['val_icone'][$key] != '') {
                $icones[] = $temp;
            }
        }
        $clients = array();
        if (isset($posts['id_client']) && !empty($posts['id_client'])) {
            foreach ($posts['id_client'] as $id_client) {
                $client = new Client();
                $client->setId_client($id_client);
                $clients[] = $client;
            }
        }

        $annonce->setAgent($agent);
        $annonce->setClients($clients);
        $annonce->setReference($posts['reference']);
        $annonce->setSousregion($sous_region);
        $annonce->setTag($tag);
        $annonce->setDevise($devise);
        $annonce->setStatut($statut);
        $annonce->setType($type);
        $prix = $posts["prix"];
		$prix = str_replace(",", "", $prix);
        $annonce->setPrix($prix);
        $annonce->setAdresse_propriete($posts['adresse']);
        $annonce->setVideo_url($posts['url']);
        if (isset($posts['date_contrat']))
            $annonce->setDate_contrat($posts['date_contrat']);
        if (isset($posts['date_mandat']))
            $annonce->setDate_mandat($posts['date_mandat']);
        $annonce->setExclusivite($posts['exclusivite']);
        $annonce->setTitre_annonce($posts['titre_fr']);
        $annonce->setTitre_annonce_en($posts['titre_en']);
        $annonce->setDescription_annonce($posts['desc_fr']);
        $annonce->setDescription_annonce_en($posts['desc_en']);
        $google_map = '';
        if ($posts['lat'] != '' && $posts['long'] != '') {
            $google_map = $posts['lat'] . "," . $posts['long'];
        }
        $annonce->setGoogle_map($google_map);
        $annonce->setIs_featuredproperty(0);
        $annonce->setPar_mois(0);
        $annonce->setCaracteristiques($caracteristiques);
        $annonce->setIcones($icones);

        if (isset($posts['is_propertyfeatured']))
            $annonce->setIs_featuredproperty($posts['is_propertyfeatured']);

        if (isset($posts['par_mois']))
            $annonce->setPar_mois($posts['par_mois']);

        $this->Annonce_Model->save($annonce);

        //$is_alert = $this->Alerte_Model->checkAlert($annonce, 'French');
		$is_alert = $this->Alerte_Model->getAll('French');
		
//if is_alert send mail
        if ($is_alert != false) {
            foreach ($is_alert as $alert) {
               // $to = $alert->getEmail();
			  	
				if($prix >= $alert->getPrix_min() && $prix <= $alert->getPrix_max() ){
						
				}else{
					continue;
				}
			
				if($alert->getSous_region() != $annonce->getSousregion()){
					
					continue;
				}
				if($alert->getStatut() != $annonce->getStatut()){
					
					continue;
				}
				
				if (isset($posts['id_type']) && $posts['id_type'] != '') {
					
					if($alert->gettypid() != $posts['id_type']){
						
						continue;
					}
				}
				
				/*
				if($surfaceval > 0){
					if($surfaceval >= $alert->getSurf_min() && $surfaceval <= $alert->getSurf_max()){
						
					}else{
						
						continue;
					}
				}else{
					
					continue;
				}
				*/
				
				//$to = "alihassan316.321@gmail.com";
				$to = $alert->getEmail();
                //$sender = ' info@rpc-ea.com';
                $sender = 'info@wnv-solutions.com';
                $subject = 'Alerte email';
                $headers = "From: " . $sender . "\r\n";
                $headers .= 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html;
charset = UTF-8' . "\r\n";

                $message = "<p> Alerte email</p>";
                $message .= "<p> Bonjour</p>";
                $message .= "<p> L'annonce correspondant a vos attentes est disponible. Veuillez suivre le lien suivant :</p>";
                
				$urllink = site_url('index.php/annonce/' . url_title(convert_accented_characters($statut->getVal()), '-', true) . '/' . url_title(convert_accented_characters($type->getVal()), '-', true) . '/' . url_title(convert_accented_characters($sous_region->getRegion()->getVal()), '-', true) . '/' . url_title(convert_accented_characters($sous_region->getVal()), '-', true) . '/' . url_title(convert_accented_characters($posts['titre_fr']), '-', true) . '-' . $annonce->getId_ann());
				
				$message .= "<p><a href='".$urllink."'>" . $urllink . "</a></p>";


                mail($to, $subject, $message, $headers);
            }
        }
        redirect('http://sgrreal.com/back_ctrl');
    }

    public function delete_annonce($id=0) {
		if(isset($_GET["id"])){
				$id = $_GET["id"];
			}
        $annonce = new Annonce();
        $annonce->setId_ann($id);
        $this->Annonce_Model->remove($annonce);
        redirect('http://sgrreal.com/back_ctrl');
    }

    public function delete_trash($id=0) {
		if(isset($_GET["id"])){
				$id = $_GET["id"];
			}
        $annonce = new Annonce();
        $annonce->setId_ann($id);
        $this->Annonce_Model->removeTrash($annonce);
        redirect('http://sgrreal.com/back_ctrl');
    }

    public function restore($id=0) {
		if(isset($_GET["id"])){
				$id = $_GET["id"];
			}
        $annonce = new Annonce();
        $annonce->setId_ann($id);
        $this->Annonce_Model->restore($annonce);
        redirect('http://sgrreal.com/back_ctrl');
    }

    /*
     * Liste type
     */

    public function Type() {
        if ($this->session->userdata('admin') != null) {
            $this->_data['sous_menu_actif'] = "Type";
            $this->_data['types'] = $this->Type_Model->getAll('french');
            $this->_data['contents'] = 'back_content/' . strtolower(__FUNCTION__);
            $this->ChargerPage($this->_data);
        } else {
            $this->load->view('back_content/login');
        }
    }

    public function detail_type($id = '') {
        if ($this->session->userdata('admin') != null) {
			if(isset($_GET["id"])){
				$id = $_GET["id"];
			}
            if ($id == "") {
                redirect('back_ctrl');
            }
            $type = $this->Type_Model->getById($id, 'french');
            $type_en = $this->Type_Model->getById($id, 'english');
            $val = array(1 => $type->getVal(), 2 => $type_en->getVal());
            $type->setVal($val);
            $this->_data['type'] = $type;
            $this->_data['contents'] = 'back_content/modif_type';
            $this->_data['sous_menu_actif'] = "Type";
            $this->ChargerPage($this->_data);
        } else {
            $this->load->view('back_content/login');
        }
    }

    public function delete_type($id=0) {
		if(isset($_GET["id"])){
				$id = $_GET["id"];
			}
        $type = new Type_immobilier();
        $type->setId_type($id);
        $this->Type_Model->remove($type);
        redirect('http://sgrreal.com/back_ctrl/Annonce_Ctrl/Type');
    }

    /*
     * ajout type
     */

    public function AjoutType() {
        if ($this->session->userdata('admin') != null) {
            $this->_data['sous_menu_actif'] = 'Type';
            $this->_data['contents'] = 'back_content/' . strtolower(__FUNCTION__);
            $this->ChargerPage($this->_data);
        } else {
            $this->load->view('back_content/login');
        }
    }

    public function saveType() {
        $posts = $this->input->post();
        $type = new Type_immobilier();
        $val = array('1' => $posts['val_fr'], '2' => $posts['val_en']);
        $type->setVal($val);
        $this->Type_Model->save($type);
        redirect('http://sgrreal.com/back_ctrl/Annonce_Ctrl/Type');
    }

    public function updateType() {
        $posts = $this->input->post();
        $type = new Type_immobilier();
        $val = array('1' => $posts['val_fr'], '2' => $posts['val_en']);
        $type->setId_type($posts['id_type']);
        $type->setVal($val);
        $this->Type_Model->modify($type);
        redirect('http://sgrreal.com/back_ctrl/Annonce_Ctrl/Type');
    }

    /*
     * Liste caracteristiques
     */

    public function Caracteristique() {
        if ($this->session->userdata('admin') != null) {
            $this->_data['sous_menu_actif'] = __FUNCTION__;
            $this->_data['caracteristiques'] = $this->Caracteristiques_Model->getAll('french');
            $this->_data['contents'] = 'back_content/' . strtolower(__FUNCTION__);
            $this->ChargerPage($this->_data);
        } else {
            $this->load->view('back_content/login');
        }
    }

    public function delete_car($id=0) {
		if(isset($_GET["id"])){
				$id = $_GET["id"];
			}
        $car = new Caracteristiques();
        $car->setId_car($id);
        $this->Caracteristiques_Model->remove($car);
        redirect('http://sgrreal.com/back_ctrl/Annonce_Ctrl/Caracteristique');
    }

    /*
     * Ajout caracteristique
     */

    public function AjoutCaracteristique() {
        if ($this->session->userdata('admin') != null) {
            $this->_data['sous_menu_actif'] = 'Caracteristique';
            $this->_data['contents'] = 'back_content/' . strtolower(__FUNCTION__);
            $this->ChargerPage($this->_data);
        } else {
            $this->load->view('back_content/login');
        }
    }

    public function detailCaracteristique($id = "") {
        if ($this->session->userdata('admin') != null) {
			if(isset($_GET["id"])){
				$id = $_GET["id"];
			}
            if ($id == "") {
                redirect('back_ctrl');
            }
            $this->_data['sous_menu_actif'] = 'Caracteristique';

            $car = $this->Caracteristiques_Model->getById($id, 'french');
            $car_en = $this->Caracteristiques_Model->getById($id, 'english');
            $val = array(1 => $car->getVal(), 2 => $car_en->getVal());
            $car->setVal($val);
            $this->_data['car'] = $car;
            $this->_data['contents'] = 'back_content/modif_car';
            $this->ChargerPage($this->_data);
        } else {
            $this->load->view('back_content/login');
        }
    }

    public function saveCaracteristique() {
        $posts = $this->input->post();
        $car = new Caracteristiques();
        $val = array('1' => $posts['val_fr'], '2' => $posts['val_en']);
        $car->setVal($val);
        $this->Caracteristiques_Model->save($car);
        redirect('http://sgrreal.com/back_ctrl/Annonce_Ctrl/Caracteristique');
    }

    public function updateCaracteristique() {
        $posts = $this->input->post();
        $car = new Caracteristiques();
        $val = array('1' => $posts['val_fr'], '2' => $posts['val_en']);
        $car->setId_car($posts['id_car']);
        $car->setVal($val);
        $this->Caracteristiques_Model->modify($car);
        redirect('http://sgrreal.com/back_ctrl/Annonce_Ctrl/Caracteristique');
    }

    /*
     * Liste agent
     */

    public function Agent() {
        if ($this->session->userdata('admin') != null) {
            $this->_data['sous_menu_actif'] = __FUNCTION__;
            $this->_data['agents'] = $this->Agent_Model->getAll();
            $this->_data['contents'] = 'back_content/' . strtolower(__FUNCTION__);
            $this->ChargerPage($this->_data);
        } else {
            $this->load->view('back_content/login');
        }
    }

    public function delete_agent($id=0) {
		if(isset($_GET["id"])){
				$id = $_GET["id"];
			}
        $agent = new Agent();
        $agent->setId_agent($id);
        $this->Agent_Model->remove($agent);
        redirect('http://sgrreal.com/back_ctrl/Annonce_Ctrl/Agent');
    }

    /*
     * Ajout agent
     */

    public function AjoutAgent() {
        if ($this->session->userdata('admin') != null) {
            $this->_data['sous_menu_actif'] = 'Agent';
            $this->_data['contents'] = 'back_content/' . strtolower(__FUNCTION__);
            $this->ChargerPage($this->_data);
        } else {
            $this->load->view('back_content/login');
        }
    }

    public function modifAgent($id = "") {
        if ($this->session->userdata('admin') != null) {
			if(isset($_GET["id"])){
				$id = $_GET["id"];
			}
            if ($id == "") {
                redirect('back_ctrl');
            }
            $this->_data['sous_menu_actif'] = 'Agent';
            $this->_data['agent'] = $this->Agent_Model->getById($id);
            $this->_data['contents'] = 'back_content/modif_agent';
            $this->ChargerPage($this->_data);
        } else {
            $this->load->view('back_content/login');
        }
    }

    public function saveAgent() {
        $posts = $this->input->post();
        $agent = new Agent();
        $agent->setNom($posts['nom']);
        $agent->setPrenom($posts['prenom']);
        $agent->setTel($posts['tel']);
        $agent->setEmail($posts['email']);
//ajout image
        $files = $_FILES;
        //  echo '<pre>';
        //  print_r($files);
        //  echo '</pre>';
        if (count($files['image']['name']) > 0) {
            $_FILES['image']['name'] = $files['image']['name'];
            $_FILES['image']['type'] = $files['image']['type'];
            $_FILES['image']['tmp_name'] = $files['image']['tmp_name'];
            $_FILES['image']['error'] = $files['image']['error'];
            $_FILES['image']['size'] = $files['image']['size'];
            $this->upload->initialize($this->set_upload_options());
            $this->upload->do_upload('image');
            $imagedataInfo = $this->upload->data();
        }
        if (isset($imagedataInfo)) {
            $image = new Image();
            $image->setNom_image($imagedataInfo['file_name']);
            $this->Image_Model->save($image);
            $agent->setImage($image);
        }
        //ajout image

        $this->Agent_Model->save($agent);

        redirect('http://sgrreal.com/back_ctrl/Annonce_Ctrl/Agent');
    }

    public function updateAgent() {
        $posts = $this->input->post();
        $agent = new Agent();
        $agent->setId_agent($posts['id_agent']);
        $agent->setNom($posts['nom']);
        $agent->setPrenom($posts['prenom']);
        $agent->setTel($posts['tel']);
        $agent->setEmail($posts['email']);
//ajout image
        $files = $_FILES;
//        echo '<pre>';
//        print_r($files);
//        echo '</pre>';
//        exit;
        if (count($files['image']['name']) > 0) {
            $_FILES['image']['name'] = $files['image']['name'];
            $_FILES['image']['type'] = $files['image']['type'];
            $_FILES['image']['tmp_name'] = $files['image']['tmp_name'];
            $_FILES['image']['error'] = $files['image']['error'];
            $_FILES['image']['size'] = $files['image']['size'];
            $this->upload->initialize($this->set_upload_options());
            $this->upload->do_upload('image');
            $imagedataInfo = $this->upload->data();
        }
        if (isset($imagedataInfo)) {
            $image = new Image();
            $image->setNom_image($imagedataInfo['file_name']);
            $this->Image_Model->save($image);
            $agent->setImage($image);
        }
        //ajout image
        $this->Agent_Model->modify($agent);
        redirect('http://sgrreal.com/back_ctrl/Annonce_Ctrl/Agent');
    }

    /*
     * Liste tags
     */

    public function Tags() {
        if ($this->session->userdata('admin') != null) {
            $this->_data['sous_menu_actif'] = __FUNCTION__;
            $this->_data['tags'] = $this->Tag_Model->getAll('french');
            $this->_data['contents'] = 'back_content/' . strtolower(__FUNCTION__);
            $this->ChargerPage($this->_data);
        } else {
            $this->load->view('back_content/login');
        }
    }

    public function detail_tag($id = '') {
        if ($this->session->userdata('admin') != null) {
			if(isset($_GET["id"])){
				$id = $_GET["id"];
			}
            if ($id == "") {
                redirect('back_ctrl');
            }
            $tag = $this->Tag_Model->getById($id, 'french');
            $tag_en = $this->Tag_Model->getById($id, 'english');
            $val = array(1 => $tag->getVal(), 2 => $tag_en->getVal());
            $tag->setVal($val);
            $this->_data['tag'] = $tag;
            $this->_data['contents'] = 'back_content/modif_tag';
            $this->_data['sous_menu_actif'] = "Tags";
            $this->ChargerPage($this->_data);
        } else {
            $this->load->view('back_content/login');
        }
    }

    public function delete_tag($id=0) {
		if(isset($_GET["id"])){
				$id = $_GET["id"];
			}
        $tag = new Tag();
        $tag->setId_tag($id);
        $this->Tag_Model->remove($tag);
        redirect('http://sgrreal.com/back_ctrl/Annonce_Ctrl/Tags');
    }

    /*
     * Ajout tag
     */

    public function AjoutTags() {
        if ($this->session->userdata('admin') != null) {
            $this->_data['sous_menu_actif'] = 'Tags';
            $this->_data['contents'] = 'back_content/' . strtolower(__FUNCTION__);
            $this->ChargerPage($this->_data);
        } else {
            $this->load->view('back_content/login');
        }
    }

    public function saveTag() {
        $posts = $this->input->post();
        $tag = new Tag();
        $val = array('1' => $posts['val_fr'], '2' => $posts['val_en']);
        $tag->setVal($val);
        $this->Tag_Model->save($tag);
        redirect('http://sgrreal.com/back_ctrl/Annonce_Ctrl/Tags');
    }

    public function updateTag() {
        $posts = $this->input->post();
        $tag = new Tag();
        $val = array('1' => $posts['val_fr'], '2' => $posts['val_en']);
        $tag->setId_tag($posts['id_tag']);
        $tag->setVal($val);
        $this->Tag_Model->modify($tag);
        redirect('http://sgrreal.com/back_ctrl/Annonce_Ctrl/Tags');
    }

    /*
     * Liste statut
     */

    public function Statut() {
        if ($this->session->userdata('admin') != null) {
            $this->_data['sous_menu_actif'] = __FUNCTION__;
            $this->_data['statuts'] = $this->Statut_Model->getAll('french');
            $this->_data['contents'] = 'back_content/' . strtolower(__FUNCTION__);
            $this->ChargerPage($this->_data);
        } else {
            $this->load->view('back_content/login');
        }
    }

    public function delete_statut($id=0) {
		if(isset($_GET["id"])){
				$id = $_GET["id"];
			}
        $statut = new Statut();
        $statut->setId_statut($id);
        $this->Statut_Model->remove($statut);
        redirect('http://sgrreal.com/back_ctrl/Annonce_Ctrl/Statut');
    }

    /*
     * Ajout statut
     */

    public function AjoutStatut() {
        if ($this->session->userdata('admin') != null) {
            $this->_data['sous_menu_actif'] = 'Statut';
            $this->_data['contents'] = 'back_content/' . strtolower(__FUNCTION__);
            $this->ChargerPage($this->_data);
        } else {
            $this->load->view('back_content/login');
        }
    }

    public function detail_statut($id = '') {
        if ($this->session->userdata('admin') != null) {
			if(isset($_GET["id"])){
				$id = $_GET["id"];
			}
            if ($id == "") {
                redirect('back_ctrl');
            }
            $statut = $this->Statut_Model->getById($id, 'french');
            $statut_en = $this->Statut_Model->getById($id, 'english');
            $val = array(1 => $statut->getVal(), 2 => $statut_en->getVal());
            $statut->setVal($val);
            $this->_data['statut'] = $statut;
            $this->_data['contents'] = 'back_content/modif_statut';
            $this->_data['sous_menu_actif'] = "Statut";
            $this->ChargerPage($this->_data);
        } else {
            $this->load->view('back_content/login');
        }
    }

    public function saveStatut() {
        $posts = $this->input->post();
        $statut = new Statut();
        $val = array('1' => $posts['val_fr'], '2' => $posts['val_en']);
        $statut->setVal($val);
        $this->Statut_Model->save($statut);
        redirect('http://sgrreal.com/back_ctrl/Annonce_Ctrl/Statut');
    }

    public function updateStatut() {
        $posts = $this->input->post();
        $statut = new Statut();
        $val = array('1' => $posts['val_fr'], '2' => $posts['val_en']);
        $statut->setId_statut($posts['id_statut']);
        $statut->setVal($val);
        $this->Statut_Model->modify($statut);
        redirect('http://sgrreal.com/back_ctrl/Annonce_Ctrl/Statut');
    }

    /*
     * Liste client
     */

    public function Client() {
        if ($this->session->userdata('admin') != null) {
            $this->_data['sous_menu_actif'] = __FUNCTION__;
            $this->_data['clients'] = $this->Client_Model->getAll();
            $this->_data['contents'] = 'back_content/' . strtolower(__FUNCTION__);
            $this->ChargerPage($this->_data);
        } else {
            $this->load->view('back_content/login');
        }
    }

    public function delete_client($id=0) {
		if(isset($_GET["id"])){
				$id = $_GET["id"];
			}
        $client = new Client();
        $client->setId_client($id);
        $this->Client_Model->remove($client);
        redirect('http://sgrreal.com/back_ctrl/Annonce_Ctrl/Client');
    }

    /*
     * Ajout client
     */

    public function AjoutClient() {
        if ($this->session->userdata('admin') != null) {
            $this->_data['sous_menu_actif'] = 'Client';
            $this->_data['contents'] = 'back_content/' . strtolower(__FUNCTION__);
            $this->ChargerPage($this->_data);
        } else {
            $this->load->view('back_content/login');
        }
    }

    public function detail_client($id = '') {
        if ($this->session->userdata('admin') != null) {
			if(isset($_GET["id"])){
				$id = $_GET["id"];
			}
            if ($id == "") {
                redirect('back_ctrl');
            }
            $this->_data['sous_menu_actif'] = 'Client';
            $this->_data['contents'] = 'back_content/modif_client';
            $this->_data['client'] = $this->Client_Model->getById($id);
            $this->ChargerPage($this->_data);
        } else {
            $this->load->view('back_content/login');
        }
    }


    public function saveClient() {
        $posts = $this->input->post();
        $client = new Client();
        $client->setNom($posts['nom']);
        $client->setPrenom($posts['prenom']);
        $client->setNic($posts['nic']);
        $client->setTel($posts['tel']);
        $client->setEmail($posts['email']);
        $client->setFax($posts['fax']);
        $client->setProfession($posts['profession']);
        $client->setAdresse($posts['adresse']);
        $this->Client_Model->save($client);
        redirect('http://sgrreal.com/back_ctrl/Annonce_Ctrl/Client');
    }

    public function updateClient() {
        $posts = $this->input->post();
        $client = new Client();
        $client->setId_client($posts['id_client']);
        $client->setNom($posts['nom']);
        $client->setPrenom($posts['prenom']);
        $client->setNic($posts['nic']);
        $client->setTel($posts['tel']);
        $client->setEmail($posts['email']);
        $client->setFax($posts['fax']);
        $client->setProfession($posts['profession']);
        $client->setAdresse($posts['adresse']);
        $this->Client_Model->modify($client);
        redirect('http://sgrreal.com/back_ctrl/Annonce_Ctrl/Client');
    }

    /*
     * Liste devise
     */

    public function Devise() {
        if ($this->session->userdata('admin') != null) {
            $this->_data['sous_menu_actif'] = __FUNCTION__;
            $this->_data['devises'] = $this->Devise_Model->getAll('french');
            $this->_data['contents'] = 'back_content/' . strtolower(__FUNCTION__);
            $this->ChargerPage($this->_data);
        } else {
            $this->load->view('back_content/login');
        }
    }

    public function delete_devise($id=0) {
        if ($this->session->userdata('admin') != null) {
			if(isset($_GET["id"])){
				$id = $_GET["id"];
			}
            if ($id == "") {
                redirect('back_ctrl');
            }
            $devise = new Devise();
            $devise->setId_devise($id);
            $this->Devise_Model->remove($devise);
            redirect('http://sgrreal.com/back_ctrl/Annonce_Ctrl/Devise');
        } else {
            $this->load->view('back_content/login');
        }
    }

    /*
     * Ajout devise
     */

    public function AjoutDevise() {
        if ($this->session->userdata('admin') != null) {
            $this->_data['sous_menu_actif'] = 'Devise';
            $this->_data['contents'] = 'back_content/' . strtolower(__FUNCTION__);
            $this->ChargerPage($this->_data);
        } else {
            $this->load->view('back_content/login');
        }
    }

    public function detail_devise($id = '') {
        if ($this->session->userdata('admin') != null) {
			if(isset($_GET["id"])){
				$id = $_GET["id"];
			}
            if ($id == "") {
                redirect('back_ctrl');
            }
            $this->_data['sous_menu_actif'] = 'Devise';
            $devise = $this->Devise_Model->getById($id, 'french');
            $devise_en = $this->Devise_Model->getById($id, 'english');
            $val = array(1 => $devise->getNom_devise(), 2 => $devise_en->getNom_devise());
            $devise->setNom_devise($val);
            $this->_data['devise'] = $devise;
            $this->_data['contents'] = 'back_content/modif_devise';
            $this->ChargerPage($this->_data);
        } else {
            $this->load->view('back_content/login');
        }
    }

    public function saveDevise() {
        $posts = $this->input->post();
        $devise = new Devise();
        $val = array('1' => $posts['val_fr'], '2' => $posts['val_en']);
        $devise->setNom_devise($val);
        $devise->setMontant_devise($posts['montant_devise']);
        $devise->setSymbole($posts['symbole']);
        if (isset($posts['left_symbole']))
            $devise->setLeft_symbole($posts['left_symbole']);
        $this->Devise_Model->save($devise);
        redirect('http://sgrreal.com/back_ctrl/Annonce_Ctrl/Devise');
    }

    public function updateDevise() {
        $posts = $this->input->post();
        $devise = new Devise();
        $val = array('1' => $posts['val_fr'], '2' => $posts['val_en']);
        $devise->setId_devise($posts['id_devise']);
        $devise->setNom_devise($val);
        $devise->setMontant_devise($posts['montant_devise']);
        $devise->setSymbole($posts['symbole']);
        if (isset($posts['left_symbole']))
            $devise->setLeft_symbole($posts['left_symbole']);
        $this->Devise_Model->modify($devise);
        redirect('http://sgrreal.com/back_ctrl/Annonce_Ctrl/Devise');
    }

    /*
     * Liste lieu
     */

    public function Lieu() {
        if ($this->session->userdata('admin') != null) {
            $this->_data['sous_menu_actif'] = __FUNCTION__;
            $this->_data['regions'] = $this->Region_Model->getAll('french');
            $this->_data['sousregions'] = $this->Sousregion_Model->getAll('french');
            $this->_data['contents'] = 'back_content/' . strtolower(__FUNCTION__);
            $this->ChargerPage($this->_data);
        } else {
            $this->load->view('back_content/login');
        }
    }

    public function delete_region($id=0) {
		if(isset($_GET["id"])){
				$id = $_GET["id"];
			}
        $region = new Region();
        $region->setId_region($id);
        $this->Region_Model->remove($region);
        redirect('http://sgrreal.com/back_ctrl/Annonce_Ctrl/Lieu');
    }

    public function delete_sousregion($id=0) {
		if(isset($_GET["id"])){
				$id = $_GET["id"];
			}
        $sousregion = new Sous_region();
        $sousregion->setId_sousregion($id);
        $this->Sousregion_Model->remove($sousregion);
        redirect('http://sgrreal.com/back_ctrl/Annonce_Ctrl/Lieu');
    }

    /*
     * Ajout region
     */

    public function AjoutRegion() {
        if ($this->session->userdata('admin') != null) {
            $this->_data['sous_menu_actif'] = 'Lieu';
            $this->_data['contents'] = 'back_content/' . strtolower(__FUNCTION__);
            $this->ChargerPage($this->_data);
        } else {
            $this->load->view('back_content/login');
        }
    }

    public function detail_region($id = "") {
        if ($this->session->userdata('admin') != null) {
			if(isset($_GET["id"])){
				$id = $_GET["id"];
			}
            if ($id == "") {
                redirect('back_ctrl');
            }
            $this->_data['sous_menu_actif'] = 'Lieu';
            $region = $this->Region_Model->getById($id, 'french');
            $region_en = $this->Region_Model->getById($id, 'english');
            $val = array('1' => $region->getVal(), '2' => $region_en->getVal());
            $region->setVal($val);
            $this->_data['region'] = $region;
            $this->_data['contents'] = 'back_content/modif_region';
            $this->ChargerPage($this->_data);
        } else {
            $this->load->view('back_content/login');
        }
    }

    public function saveRegion() {
        $posts = $this->input->post();
        $statut = new Region();
        $val = array('1' => $posts['val_fr'], '2' => $posts['val_en']);
        $statut->setVal($val);
        $this->Region_Model->save($statut);
        redirect('http://sgrreal.com/back_ctrl/Annonce_Ctrl/Lieu');
    }

    public function updateRegion() {
        $posts = $this->input->post();
        $region = new Region();
        $val = array('1' => $posts['val_fr'], '2' => $posts['val_en']);
        $region->setId_region($posts['id_region']);
        $region->setVal($val);
        $this->Region_Model->modify($region);
        redirect('http://sgrreal.com/back_ctrl/Annonce_Ctrl/Lieu');
    }

    /*
     * Ajout sous region
     */

    function AjoutSousregion() {
        if ($this->session->userdata('admin') != null) {
            $this->_data['sous_menu_actif'] = 'Lieu';
            $this->_data['regions'] = $this->Region_Model->getAll('french');
            $this->_data['contents'] = 'back_content/' . strtolower(__FUNCTION__);
            $this->ChargerPage($this->_data);
        } else {
            $this->load->view('back_content/login');
        }
    }

    public function detail_sousregion($id = "") {
        if ($this->session->userdata('admin') != null) {
			if(isset($_GET["id"])){
				$id = $_GET["id"];
			}
            if ($id == "") {
                redirect('back_ctrl');
            }

            $this->_data['sous_menu_actif'] = 'Lieu';
            $sousregion = $this->Sousregion_Model->getById($id, 'french');

            $sousregion_en = $this->Sousregion_Model->getById($id, 'english');
            $val = array('1' => $sousregion->getVal(), '2' => $sousregion_en->getVal());
            $sousregion->setVal($val);
            $this->_data['sousregion'] = $sousregion;
            $this->_data['regions'] = $this->Region_Model->getAll('french');
            $this->_data['contents'] = 'back_content/modif_sousregion';
            $this->ChargerPage($this->_data);
        } else {
            $this->load->view('back_content/login');
        }
    }

    public function saveSousregion() {
        $posts = $this->input->post();
        $sousregion = new Sous_region();
        $val = array('1' => $posts['val_fr'], '2' => $posts['val_en']);
        $sousregion->setVal($val);
        $region = new Region();
        $region->setId_region($posts['id_region']);
        $sousregion->setRegion($region);
        $this->Sousregion_Model->save($sousregion);
        redirect('http://sgrreal.com/back_ctrl/Annonce_Ctrl/Lieu');
    }

    public function updateSousregion() {
        $posts = $this->input->post();
        $sousregion = new Sous_region();
        $val = array('1' => $posts['val_fr'], '2' => $posts['val_en']);
        $sousregion->setId_sousregion($posts['id_sousregion']);
        $sousregion->setVal($val);
        $region = new Region();
        $region->setId_region($posts['id_region']);
        $sousregion->setRegion($region);
        $this->Sousregion_Model->modify($sousregion);
        redirect('http://sgrreal.com/back_ctrl/Annonce_Ctrl/Lieu');
    }

    /*
     * Liste Actualite
     */

    public function Actualite() {
        if ($this->session->userdata('admin') != null) {
            $this->_data['sous_menu_actif'] = __FUNCTION__;
            $this->_data['actualites'] = $this->Actualite_Model->getAll('french');
            $this->_data['contents'] = 'back_content/' . strtolower(__FUNCTION__);
            $this->ChargerPage($this->_data);
        } else {
            $this->load->view('back_content/login');
        }
    }

    public function archive($page='') {
        if ($this->session->userdata('admin') != null) {
            $this->_data['sous_menu_actif'] = __FUNCTION__;
            $this->_data['annonces'] = $this->Annonce_Model->getTrash('french');
            $this->nbr_total_donnees = count( $this->Annonce_Model->getTrash('french') );
            // ---------------------    pagination          ------------
            if ($page == null || $page == "") {
                $page = 1;
            }
                $this->_data['url'] = 'back_ctrl/Annonce_Ctrl/archive';
                $this->_data['nb_donnees_afficher'] = 30;
                $this->_data['page'] = $page;
                //$this->_data['annonces'] = $this->Annonce_Model->getTrashPerPage('french',$this->_data['nb_donnees_afficher'],$this->_data['page']);               
                
                if ($this->nbr_total_donnees % $this->_data['nb_donnees_afficher'] == 0) {
                    $this->_data['nb_page'] = intval($this->nbr_total_donnees / $this->_data['nb_donnees_afficher']);
                } else {
                    $this->_data['nb_page'] = intval($this->nbr_total_donnees / $this->_data['nb_donnees_afficher'] + 1);
                } 
            $this->_data['contents'] = 'back_content/trash';
            $this->ChargerPage($this->_data);
        } else {
            $this->load->view('back_content/login');
        }
    }

    private function set_upload_options() {
        //upload an image options
        $config = array();
        $config['upload_path'] = 'assets/images';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '0';
        $config['overwrite'] = FALSE;

        return $config;
    }

    public function del_image_annonce() {
        $posts = $this->input->post();
        $id_ann = $posts['id_ann'];
        $id_image = $posts['id_image'];
        $this->Annonce_Model->del_image_annonce($id_ann, $id_image);
    }

    public function del_image_principal() {
        $posts = $this->input->post();
        $id_ann = $posts['id_ann'];
        $this->Annonce_Model->del_image_principal($id_ann);
    }

    /*
     * Liste statut - type
     */

    public function Menu() {
        if ($this->session->userdata('admin') != null) {
            $this->_data['sous_menu_actif'] = "Menu";
            $this->_data['statut_type'] = $this->Statut_Type_Model->getAll('french');
            $this->_data['contents'] = 'back_content/statuttype';
            $this->ChargerPage($this->_data);
        } else {
            $this->load->view('back_content/login');
        }
    }

    public function detail_statut_type($id = '') {
        if ($this->session->userdata('admin') != null) {
            if(isset($_GET["id"])){
				$id = $_GET["id"];
			}
			if ($id == "") {
                redirect('back_ctrl');
            }
            $statut_type = $this->Statut_Type_Model->getById($id, 'french');
            $this->_data['statuts'] = $this->Statut_Model->getAll('french');
            $this->_data['types'] = $this->Type_Model->getAll('french');
            $this->_data['statut_type'] = $statut_type;
            $this->_data['contents'] = 'back_content/modif_statut_type';
            $this->_data['sous_menu_actif'] = "StatutType";
            $this->ChargerPage($this->_data);
        } else {
            $this->load->view('back_content/login');
        }
    }

    public function delete_statut_type($id=0) {
		if(isset($_GET["id"])){
				$id = $_GET["id"];
			}
        $type = new Statut_type();
        $type->setId_statut_type($id);
        $this->Statut_Type_Model->remove($type);
        redirect('http://sgrreal.com/back_ctrl/Annonce_Ctrl/Menu');
    }

    /*
     * ajout statut type
     */

    public function AjoutMenu() {
        if ($this->session->userdata('admin') != null) {
            $this->_data['sous_menu_actif'] = 'Menu';
            $this->_data['statuts'] = $this->Statut_Model->getAll('french');
            $this->_data['types'] = $this->Type_Model->getAll('french');
            $this->_data['contents'] = 'back_content/ajoutstatuttype';
            $this->ChargerPage($this->_data);
        } else {
            $this->load->view('back_content/login');
        }
    }

    public function saveStatutType() {
        $posts = $this->input->post();
        $statuType = new Statut_Type();
        $statuType->setId_statut($posts['id_statut']);
        $statuType->setId_type($posts['id_type']);
        $this->Statut_Type_Model->save($statuType);
        redirect('http://sgrreal.com/back_ctrl/Annonce_Ctrl/StatutType');
    }

    public function updateStatutType() {
        $posts = $this->input->post();
        $statuType = new Statut_Type();
        $statuType->setId_statut_type($posts['id_statut_type']);
        $statuType->setId_statut($posts['id_statut']);
        $statuType->setId_type($posts['id_type']);
        $this->Statut_Type_Model->modify($statuType);
        redirect('http://sgrreal.com/back_ctrl/Annonce_Ctrl/StatutType');
    }

}
