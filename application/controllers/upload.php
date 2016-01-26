<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('/', 'refresh');
            }
        }
        
	public function index()
	{
		$this->load->view('header');
		$this->load->view('form_upload',array('error'=>''));
		$this->load->view('footer');
	}
        
        public function enviar(){
            $this->output->enable_profiler(TRUE);
            
            $data['title'] = "Marchinhas de carnaval";
            
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = "mp4";
            $config['encrypt_name'] = TRUE;
            $config['max_size'] = (300*1024);
            
            $this->load->library('upload',$config);
            $this->form_validation->set_message('image_upload', "Nenhum arquivo selecionado");
            
            $this->load->view('header');
            
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
                /*
                 * Array ( 
                 * [file_name] => 902f9be58219c68befd1482d2e8f9143.mp4 
                 * [file_type] => video/mp4 
                 * [file_path] => D:/Sites/marchinhasdecarnavalindra/uploads/ 
                 * [full_path] => D:/Sites/marchinhasdecarnavalindra/uploads/902f9be58219c68befd1482d2e8f9143.mp4 
                 * [raw_name] => 902f9be58219c68befd1482d2e8f9143 
                 * [orig_name] => Vale_la_Pena_Esperar_(Low).mp4 
                 * [client_name] => Vale la Pena Esperar (Low).mp4 
                 * [file_ext] => .mp4 
                 * [file_size] => 15323.87 
                 * [is_image] => 
                 * [image_width] => 
                 * [image_height] => 
                 * [image_type] => 
                 * [image_size_str] => ) 
                 */
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
            $this->load->view('footer');
        }
}
