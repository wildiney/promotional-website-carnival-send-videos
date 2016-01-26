<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index() {
        $this->load->view('header');
        $this->load->view('login_admin');
        $this->load->view('footer');
    }

    public function logar() {
        if ($this->input->post()) {
            $data['login'] = $this->input->post('login');
            $data['senha'] = $this->input->post('senha');

            $this->load->model('login_admin_model');
            $resultado = $this->login_admin_model->validar($data);

            if ($resultado) {
                foreach ($resultado as $row) {
                    $data = array('nome' => $row->name, 'email' => $row->email, 'level' => $row->level, 'admin_logged' => TRUE);
                }

                $this->session->set_userdata($data);
            }

            if ($this->session->userdata('admin_logged')) {
                redirect('/admin/aprovacao');
            } else {
                redirect('/admin/login');
            }
        } else {
            redirect('/admin/login');
        }
    }

    public function logout() {
        /**
         * Sessions Admins
         */
        $this->session->unset_userdata('admin_logged');
        $this->session->unset_userdata('level');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('name');

        /**
         * Sessions Users
         */
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('usuario');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('id');
        $this->session->sess_destroy();

        /**
         * Exec
         */
        redirect('/', 'refresh');
    }

}
