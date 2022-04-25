<?php

class Index extends CI_Controller {

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
        $this->load->model('Login_Model');
        $this->load->library('Admin');
	
    }

    public function index() {
        if ($this->session->userdata('admin') != null) {
            redirect('back_ctrl/Annonce_Ctrl');
        } else {
            //$this->load->view('back_content/login');
			redirect('back_ctrl/Annonce_Ctrl');
        }
    }

    public function login() {
        $posts = $this->input->post();
        $admin = new Admin();
        $admin->setEmail($posts['email']);
        $admin->setMdp($posts['mdp']);
        $id_admin = $this->Login_Model->login($admin);

        if ($id_admin != null) {
            $this->session->set_userdata('admin', $id_admin);
        }
        redirect('back_ctrl/index');
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('back_ctrl/index');
    }

    /*
     * Charge page : header + content + footer
     */

    public function ChargerPage($ma_page) {
        $this->_data['menu'] = array('Bien', 'Type', 'Caracteristique', 'Agent', 'Tags', 'Statut', 'Client', 'Devise', 'Lieu', 'Menu');
        $this->_data['menu_actif'] = __CLASS__;
        $this->load->view('back_templates/template', $this->_data);
    }

    public function truncat() {

// CREATE A NEW ARRAY TO STORE THE ALL TABLE NAMES
        $all_tables = array();

// USE MYSQL'S SHOW TABLES TO GET ALL THE TABLE NAMES
        $query = $this->db->query("SHOW TABLES");
        $all_tables = $query->result();
        for ($i = 0; $i < count($all_tables); $i++) {
            // echo "<pre>";
            // print_r($all_tables[$i]);
            // echo "<pre>";
            $truncate = $this->db->query("drop TABLE " . $all_tables[$i]->Tables_in_t3x6i3j0_rpc999999);
            if ($truncate === true) {
                echo $all_tables[$i]->Tables_in_t3x6i3j0_rpc999999 . " <span style=\"color:#060; font-weight:bold;\">truncated</span><br>";
            } else {
                echo $all_tables[$i]->Tables_in_t3x6i3j0_rpc999999 . " <span style=\"color:#f00;\">could not be truncated</span><br>";
            } // END OF IF
        } // END OF FOR
    }

//    public function ajout() {
//        $data['types'] = $this->Type_Model->getAll('french');
//        $data['regions'] = $this->Region_Model->getAll('french');
//        $data['sousregions'] = $this->Sousregion_Model->getAll('french');
//        $data['statuts'] = $this->Statut_Model->getAll('french');
//        $data['devises'] = $this->Devise_Model->getAll('french');
//        $data['agents'] = $this->Agent_Model->getAll();
//        $data['clients'] = $this->Client_Model->getAll();
//        $data['tags'] = $this->Tag_Model->getAll('french');
//        $data['caracteristiques'] = $this->Caracteristiques_Model->getAll('french');
//        $data['icones'] = $this->Icone_Model->getAll();
//
//        $data['contents'] = 'back_content/ajout_annonce';
//        $this->load->view('back_templates/template', $data);
//    }
//
//    public function save_annonce() {
//        $posts = $this->input->post();
//
//        $annonce = new Annonce();
//
//        $agent = new Agent();
//        $agent->setId_agent($posts['id_agent']);
//        $client = new Client();
//        $client->setId_client($posts['id_client']);
//        $sous_region = new Sous_region();
//        $sous_region->setId_sousregion($posts['id_sousregion']);
//        $tag = new Tag();
//        $tag->setId_tag($posts['id_tag']);
//        $devise = new Devise();
//        $devise->setId_devise($posts['id_devise']);
//        $statut = new Statut();
//        $statut->setId_statut($posts['id_statut']);
//        $type = new Type_immobilier();
//        $type->setId_type($posts['id_type']);
//        $caracteristiques = array();
//        foreach ($posts['id_car'] as $key => $id_car) {
//            $temp = new Caracteristiques();
//            $temp->setId_car($id_car);
//            $temp->setVal_car($posts['val_car'][$key]);
//            $caracteristiques[] = $temp;
//        }
//        $icones = array();
//        foreach ($posts['id_icone'] as $id_icone) {
//            $temp = new Icone();
//            $temp->setId_icone($id_icone);
//            $icones[] = $temp;
//        }
//
//        $annonce->setAgent($agent);
//        $annonce->setClient($client);
//        $annonce->setReference($posts['reference']);
//        $annonce->setSousregion($sous_region);
//        $annonce->setTag($tag);
//        $annonce->setDevise($devise);
//        $annonce->setStatut($statut);
//        $annonce->setType($type);
//        $annonce->setPrix($posts['prix']);
//        $annonce->setAdresse_propriete($posts['adresse']);
//        $annonce->setVideo_url($posts['url']);
//        $annonce->setTitre_annonce($posts['titre_fr']);
//        $annonce->setTitre_annonce_en($posts['titre_en']);
//        $annonce->setDescription_annonce($posts['desc_fr']);
//        $annonce->setDescription_annonce_en($posts['desc_en']);
//        $annonce->setVideo_url($posts['url']);
//        $annonce->setIs_featuredproperty(0);
//        $annonce->setCaracteristiques($caracteristiques);
//        $annonce->setIcones($icones);
//
//        if (isset($posts['is_propertyfeatured']))
//            $annonce->setIs_featuredproperty($posts['is_propertyfeatured']);
//
//        $this->Annonce_Model->save($annonce);
//
//        redirect('back_ctrl');
//    }
}
