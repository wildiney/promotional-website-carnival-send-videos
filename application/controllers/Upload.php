<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Classe Upload
 * Classe principal de upload no site
 * 
 */
class Upload extends CI_Controller {
    
    public function __construct() {
        /**
         * Método __construct
         */
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('/', 'refresh');
            }
        }
        
        /**
         * Método Index
         * Página inicial do upload
         */
	public function index()
	{
		$this->load->view('header');
                
                $date1 = date("Y-m-d");
                $date2 = "2016-02-09";
                
                if(strtotime($date1) < strtotime($date2)){
                    $this->load->view('form_upload',array('error'=>''));
                } else {
                    $this->load->view('prazoencerrado');
                }
		$this->load->view('footer');
	}
        
        /**
         * Método Enviar
         * Utilizado para verificar e enviar o arquivo para upload.
         */
        public function enviar(){
            $data['title'] = "Marchinhas de carnaval";
            
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = "mp4";
            $config['encrypt_name'] = TRUE;
            $config['max_size'] = (300*1024);
            
            $this->load->library('upload',$config);
            $this->form_validation->set_message('image_upload', "Nenhum arquivo selecionado");
            
            $this->load->view('header');
            
            /* ATUALIZAÇAO */
            if(
                $this->input->post('name') =="" || 
                $this->input->post('email')=="" ||
                $this->input->post('group')=="" ||
                $this->input->post('participant1')=="" ||
                $this->input->post('title')=="" ||
                $this->input->post('lyric')==""
            ){
                $error = array('error'=>"Não são permitidos campos obrigatórios em branco");
                $this->load->view('form_upload',$error);
            } else {
            
                if(!$this->upload->do_upload('file')){
                    $error = array('error'=>$this->upload->display_errors());
                    $this->load->view('form_upload',$error);
                } else {
                    $data['name']           = $this->input->post('name');
                    $data['email']          = $this->input->post('email');
                    $data['group']          = $this->input->post('group');
                    $data['participants']   = $this->input->post('participant1');
                    if($this->input->post('participant2')){ $data['participants']   .= " | " . $this->input->post('participant2'); }
                    if($this->input->post('participant3')){ $data['participants']   .= " | " . $this->input->post('participant3'); }
                    if($this->input->post('participant4')){ $data['participants']   .= " | " . $this->input->post('participant4'); }
                    if($this->input->post('participant5')){ $data['participants']   .= " | " . $this->input->post('participant5'); }
                    $data['title']= $this->input->post('title');
                    $data['lyric']= $this->input->post('lyric');
                    $filedata = $this->upload->data();

                    $data['file'] = $filedata['file_name'];
                    $data['matricula'] = $this->session->userdata('matricula');

                    $this->load->model('upload_model');
                    $resultado = $this->upload_model->gravar($data);

                    if($resultado){
                        $this->load->view('form_upload_success', $data);
                    } else {
                        $this->load->view('form_upload',$error);
                    }

                }
            }
            $this->load->view('footer');
            
            $this->session->unset_userdata('logged_in');
            $this->session->unset_userdata('usuario');
            $this->session->unset_userdata('email');
            $this->session->unset_userdata('id');
            $this->session->sess_destroy();
        }
}
