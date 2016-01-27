<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login_model
 *
 * @author wfpimentel
 */
class login_admin_model extends CI_model {

    public function __construct() {
        parent::__construct();
    }
    
    public function validar($data){
        $login = $data['login'];
        $senha= $data['senha'];
        
        $this->db->select();
        $this->db->from('admin');
        $this->db->where('nome',$login);
        $this->db->where('senha',$senha);
        $this->db->limit(1);
        
        $query = $this->db->get();
        
        if($query->num_rows()==1){
            return $query->result();
        } else {
            return false;
        }
    }
    
    public function recover($email){
        $this->db->select('id, nome, email, senha');
        $this->db->from('indra_boletim_usuarios');
        $this->db->where('email',$email);
        $this->db->limit(1);
        
        $query = $this->db->get();
        
        if($query->num_rows()==1){
            return $query->result();
        } else {
            return false;
        }
    }
}
