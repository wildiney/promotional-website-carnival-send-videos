<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index() {
        if ($this->session->userdata('logged_in')) {
            redirect('concurso');
        } else {
            $this->load->view('header');
            $this->load->view('login');
            $this->load->view('footer');
        }
    }

    public function logar() {

        if ($this->input->post()) {
            $data['matricula'] = $this->input->post('matricula');
            $data['nascimento'] = $this->input->post('nascimento');

            $this->load->model('login_model');
            $resultado = $this->login_model->validar($data);

            if ($resultado) {
                foreach ($resultado as $row) {
                    $data = array('matricula' => $row->matricula, 'nascimento' => $row->nascimento, 'logged_in' => TRUE);
                }

                $this->session->set_userdata($data);
            }

            if ($this->session->userdata('logged_in')) {
                redirect('/concurso');
            } else {
                redirect('/login');
            }
        } else {
            redirect('/login');
        }
    }

    public function logout() {
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('usuario');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('id');
        $this->session->sess_destroy();
        redirect('/', 'refresh');
    }

}
