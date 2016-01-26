<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Concurso extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('/', 'refresh');
        }
    }

    public function index() {
        //$this->output->enable_profiler(TRUE);

        $this->load->model('upload_model');
        $data['resultado'] = $this->upload_model->top(2);

        $this->load->view('header');
        $this->load->view('concurso', $data);
        $this->load->view('footer');
    }

    public function regulamento() {
        $this->load->view('header');
        $this->load->view('regulamento');
        $this->load->view('footer');
    }

}
