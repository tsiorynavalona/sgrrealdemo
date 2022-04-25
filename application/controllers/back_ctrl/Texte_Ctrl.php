<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Texte_Ctrl
 *
 * @author mrandria
 */
class Texte_Ctrl extends CI_Controller {

    protected $_data = array();

    function __construct() {
        parent::__construct();
        $this->load->model('Texte_Model');
        $this->load->model('Login_Model');
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
            $this->_data['contents'] = 'back_content/texte_defilante';
            $this->_data['textes'] = $this->Texte_Model->getAll('french');
            $this->_data['menu_actif'] = 'Texte_defilante';
            $this->_data['sous_menu_actif'] = '';
            $this->ChargerPage($this->_data);
        } else {
            $this->load->view('back_content/login');
        }
    }

    public function ajout() {
        if ($this->session->userdata('admin') != null) {
            $this->_data['menu_actif'] = 'Texte_defilante';
            $this->_data['sous_menu_actif'] = "";
            $this->_data['contents'] = 'back_content/ajouttexte';
            $this->ChargerPage($this->_data);
        } else {
            $this->load->view('back_content/login');
        }
    }

    public function modify($id) {
        if ($this->session->userdata('admin') != null) {
			if(isset($_GET["id"])){
				$id = $_GET["id"];
			}
            if ($id == "") {
                redirect('back_ctrl');
            }
            $this->_data['menu_actif'] = 'Texte_defilante';
            $this->_data['sous_menu_actif'] = "";

            $texte = $this->Texte_Model->getById($id, 'french');
            $texte_en = $this->Texte_Model->getById($id, 'english');
            $val = array(1 => $texte->getVal(), 2 => $texte_en->getVal());
            $texte->setVal($val);

            $this->_data['texte'] = $texte;
            $this->_data['contents'] = 'back_content/modif_texte';
            $this->ChargerPage($this->_data);
        } else {
            $this->load->view('back_content/login');
        }
    }

    public function saveTexte() {
        $posts = $this->input->post();
        $texte = new Texte_defilante();
        $val = array('1' => $posts['val_fr'], '2' => $posts['val_en']);
        $texte->setVal($val);
        $this->Texte_Model->save($texte);
        redirect('http://sgrreal.com/back_ctrl/Texte_Ctrl');
    }

    public function updateTexte() {
        $posts = $this->input->post();
        $texte = new Texte_defilante();
        $val = array('1' => $posts['val_fr'], '2' => $posts['val_en']);
        $texte->setId_texte($posts['id_texte']);
        $texte->setVal($val);
        $this->Texte_Model->modify($texte);
        redirect('http://sgrreal.com/back_ctrl/Texte_Ctrl');
    }

    public function delete($id) {
		if(isset($_GET["id"])){
				$id = $_GET["id"];
			}
        $texte = new Texte_defilante();
        $texte->setId_texte($id);
        $this->Texte_Model->remove($texte);
        redirect('http://sgrreal.com/back_ctrl/Texte_Ctrl');
    }

}
