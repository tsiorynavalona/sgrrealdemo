<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Actualite_Ctrl
 *
 * @author mrandria
 */
class Actualite_Ctrl extends CI_Controller {

    protected $_data = array();

    function __construct() {
        parent::__construct();
        $this->load->model('Actualite_Model');
        $this->load->model('Login_Model');
        $this->load->model('Image_Model');
        $this->load->library('Image');
        $this->load->library('upload');
    }

    /*
     * Charge page : header + content + footer
     */

    public function ChargerPage($nom_page) {
        $this->_data['menu'] = array('Bien', 'Type', 'Caracteristique', 'Agent', 'Tags', 'Statut', 'Client', 'Devise', 'Lieu', 'Menu');
        $this->_data['admin'] = $this->Login_Model->getAdmin($this->session->userdata('admin'));
        $this->load->view('back_templates/template', $this->_data);
    }

    /*
     * Redirection vers la liste des annonces
     */

    public function index() {
        if ($this->session->userdata('admin') != null) {
            $this->_data['contents'] = 'back_content/actualite';
            $this->_data['actus'] = $this->Actualite_Model->getAll('french');
            $this->_data['menu_actif'] = 'Actualite';
            $this->_data['sous_menu_actif'] = '';
            $this->ChargerPage($this->_data);
        } else {
            $this->load->view('back_content/login');
        }
    }

    public function ajout() {
        if ($this->session->userdata('admin') != null) {
            $this->_data['menu_actif'] = 'Actualite';
            $this->_data['sous_menu_actif'] = "";
            $this->_data['contents'] = 'back_content/ajoutactu';
            $this->ChargerPage($this->_data);
        } else {
            $this->load->view('back_content/login');
        }
    }

    public function modify($id = '') {
        if ($this->session->userdata('admin') != null) {
            if(isset($_GET["id"])){
				$id = $_GET["id"];
			}
			if ($id == "") {
                redirect('back_ctrl');
            }
            $this->_data['menu_actif'] = 'Actualite';
            $this->_data['sous_menu_actif'] = "";

            $actu = $this->Actualite_Model->getById($id, 'french');
            $actu_en = $this->Actualite_Model->getById($id, 'english');
            $titre = array(1 => $actu->getTitre(), 2 => $actu_en->getTitre());
            $description = array(1 => $actu->getDescription(), 2 => $actu_en->getDescription());

            $actu->setTitre($titre);
            $actu->setDescription($description);
            $this->_data['actu'] = $actu;

            $this->_data['contents'] = 'back_content/modif_actualite';
            $this->ChargerPage($this->_data);
        } else {
            $this->load->view('back_content/login');
        }
    }

    public function saveActu() {
        $files = $_FILES;

        $cpt = count($files['image']['name']);

        $posts = $this->input->post();
        $actu = new Actualite();
        $titre = array('1' => $posts['titre_fr'], '2' => $posts['titre_en']);
        $desc = array('1' => $posts['desc_fr'], '2' => $posts['desc_en']);
        $actu->setTitre($titre);
        $actu->setDescription($desc);
        $actu->setDate_evenement($posts['date']);

        // set image - upload image
        if ($cpt > 0) {
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
            $actu->setImage($image);
        }
        $this->Actualite_Model->save($actu);
        redirect('http://sgrreal.com/back_ctrl/Actualite_Ctrl');
    }

    public function updateActu() {
        $files = $_FILES;

        $cpt = count($files['image']['name']);

        $posts = $this->input->post();
        $actu = new Actualite();
        $titre = array('1' => $posts['titre_fr'], '2' => $posts['titre_en']);
        $desc = array('1' => $posts['desc_fr'], '2' => $posts['desc_en']);
        $actu->setId_actu($posts['id_actu']);
        $actu->setTitre($titre);
        $actu->setDescription($desc);
        $actu->setDate_evenement($posts['date']);

        // set image - upload image
        if ($cpt > 0) {
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
            $actu->setImage($image);
        }

        $this->Actualite_Model->modify($actu);
        redirect('http://sgrreal.com/back_ctrl/Actualite_Ctrl');
    }

    public function delete($id) {
		if(isset($_GET["id"])){
				$id = $_GET["id"];
			}
        $actu = new Actualite();
        $actu->setId_actu($id);
        $this->Actualite_Model->remove($actu);
        redirect('http://sgrreal.com/back_ctrl/Actualite_Ctrl');
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

}
