<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *  Classe Vídeos
 */
class Videos extends CI_Controller {
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
        $selected = array();
        $this->load->model('videos_model');
        
        if($this->input->post()){
            $data['matricula'] = $this->session->userdata('matricula');
            $data['video'] = $this->input->post('id');
            $this->videos_model->vote($data);
        }
        
        $data['resultado'] = $this->videos_model->allVideos();
        
        $votos = $this->videos_model->voted();

        foreach($votos as $video){
            $selected[] = $video->video;
        }
        $data['array'] = $selected;
        
        $this->load->view('header');
        $this->load->view('videos', $data);
        $this->load->view('footer');
    }
}
