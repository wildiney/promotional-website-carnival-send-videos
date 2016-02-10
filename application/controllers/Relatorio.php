<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Relatorio extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if(!$this->session->userdata('admin_logged')){
        	redirect('/admlogin','refresh');
        }
    }

    public function index() {
        $this->load->model('videos_model');
        $data['resultado'] = $this->videos_model->ranking();

        $this->load->view('header');
        $this->load->view('relatorio',$data);
        $this->load->view('footer');
    }
}
