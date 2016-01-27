<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *  Classe de login
 */
class Login extends CI_Controller {

    /**
     * Método Index
     * Todas as páginas sem session redireciona para esta página.
     */
    public function index() {
        if ($this->session->userdata('logged_in')) {
            redirect('concurso');
        } else {
            $this->load->view('header');
            $this->load->view('login');
            $this->load->view('footer');
        }
    }
    
    /**
     * Método Logar
     * Responsável por verificar login e senha e estabelecer as sessões da página
     */
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

    /**
     * Método Logout
     * Responsável por resetar todas as sessions e finalizar os acessos dos usuários do site.
     */
    public function logout() {
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('usuario');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('id');
        $this->session->sess_destroy();
        redirect('/', 'refresh');
    }
}
