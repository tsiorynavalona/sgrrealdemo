<?php

class Alertemail extends CI_Controller {

    protected $_data = array();

    function __construct() {
        parent::__construct();
        $this->load->model('Alerte_Model');
        $this->load->model('Login_Model');
    }

    /*
     * Charge page : header + content + footer
     */

    public function ChargerPage($ma_page) {
        $this->_data['menu'] = array('Bien', 'Type', 'Caracteristique', 'Agent', 'Tags', 'Statut', 'Client', 'Devise', 'Lieu', 'Menu');
        $this->_data['admin'] = $this->Login_Model->getAdmin($this->session->userdata('admin'));
        $this->load->view('back_templates/template', $this->_data);
    }

    /*
     * Redirection vers la liste des annonces
     */

    public function index() {
        if ($this->session->userdata('admin') != null) {
            $this->_data['contents'] = 'back_content/' . strtolower(__CLASS__);
            $this->_data['alertes'] = $this->Alerte_Model->getAll('french');
            $this->_data['menu_actif'] = __CLASS__;
            $this->_data['sous_menu_actif'] = '';
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
			
            if ($id == '') {
                redirect('back_ctrl');
            }
            $this->_data['contents'] = 'back_content/detail_alerte';
            $this->_data['alerte'] = $this->Alerte_Model->getById($id, 'french');
            $this->_data['menu_actif'] = __CLASS__;
            $this->_data['sous_menu_actif'] = '';
            $this->ChargerPage($this->_data);
        } else {
            $this->load->view('back_content/login');
        }
    }

    public function delete($id) {
		if(isset($_GET["id"])){
				$id = $_GET["id"];
			}
        $alerte = new Alerte();
        $alerte->setId_alerte($id);
        $this->Alerte_Model->remove($alerte);
        redirect('http://sgrreal.com/back_ctrl/Alertemail');
    }

}
