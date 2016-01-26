<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aprovacao extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if(!$this->session->userdata('admin_logged')){
        	redirect('/admin','refresh');
        }
        //$this->output->enable_profiler(TRUE);

    }

    public function index() {
        $this->load->model('upload_model');
        $data['resultado'] = $this->upload_model->selectToAprove();
       
        $this->load->view('header');
        $this->load->view('admin/aprovacao',$data);
        $this->load->view('footer');
    }
    
    public function aprovar($valor){
        $this->load->model('upload_model');
        if($this->upload_model->aprovar($valor)){
            redirect('/admin/aprovacao/');
        } else {
            die("Ih, deu ruim");
        }
        
    }
    
    public function reprovar($valor){
        $this->load->model('upload_model');
        if($this->upload_model->reprovar($valor)){
            redirect('/admin/aprovacao/');
        } else {
            die("Ih, deu ruim");
        }
        
    }
}
