<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *  Classe Concurso
 */
class Concurso extends CI_Controller {
    /* Método Construct
     * @param none
     */
    public function __construct() {
        parent::__construct();
    }
    
    /** Método Index
     * @param none
     */
    public function index() {
        if (!$this->session->userdata('logged_in')) {
            redirect('/', 'refresh');
        }
        $this->load->model('upload_model');
        $data['resultado'] = $this->upload_model->top(2);

        $this->load->view('header');
        $this->load->view('concurso', $data);
        $this->load->view('footer');
    }

    /** Método Regulamento
     *  @param none
     */
    public function regulamento() {
        $this->load->view('header');
        $this->load->view('regulamento');
        $this->load->view('footer');
    }

}
