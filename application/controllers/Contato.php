<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *  Classe Contato
 * 
 */
class Contato extends CI_Controller {
    /* Método Construct
     * @param none
     */
    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('/', 'refresh');
        }
    }
    
    /** Método Index
     * @param none
     */
    public function index() {
        $this->load->view('header');
        $this->load->view('contato');
        $this->load->view('footer');
    }
}
