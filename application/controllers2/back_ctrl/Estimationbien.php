<?php
error_reporting(0);
ini_set('display_errors', 0);

class Estimationbien extends CI_Controller {

    protected $_data = array();

    function __construct() {
        parent::__construct();
        $this->load->model('Estimation_Model');
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
        if ($this->session->userdata('admin') == null) {
            $this->_data['contents'] = 'back_content/' . strtolower(__CLASS__);
            $this->_data['estimations'] = $this->Estimation_Model->getAll();
            $this->_data['menu_actif'] = __CLASS__;
            $this->_data['sous_menu_actif'] = '';
            $this->ChargerPage($this->_data);
        } else {
            $this->load->view('back_content/login');
        }
    }

    public function detail($id = '') {
        if ($this->session->userdata('admin') != null) {
            if ($id == '') {
                redirect('back_ctrl');
            }
            $this->_data['contents'] = 'back_content/detail_estimation';
            $this->_data['estimation'] = $this->Estimation_Model->getById($id);
            $this->_data['menu_actif'] = __CLASS__;
            $this->_data['sous_menu_actif'] = '';
            $this->ChargerPage($this->_data);
        } else {
            $this->load->view('back_content/login');
        }
    }

    public function delete($id) {
        $estimation = new Estimation_bien();
        $estimation->setId_estimation($id);
        $this->Estimation_Model->remove($estimation);
        redirect('back_ctrl/Estimationbien');
    }

}
