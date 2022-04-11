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
class login_model extends CI_model {
    
    /**
     * Método __construct
     */
    public function __construct() {
        parent::__construct();
    }
    
    public function validar($data){
        $matricula = $data['matricula'];
        $nascimento = $data['nascimento'];
        
        $this->db->select('matricula, nascimento');
        $this->db->from('login');
        $this->db->where('matricula',$matricula);
        $this->db->where('nascimento',$nascimento);
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
        $this->db->from('empresa_boletim_usuarios');
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
