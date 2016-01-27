<?php
/**
 * Description of login_model
 *
 * @author wfpimentel
 */
class Upload_model extends CI_model {

    public function __construct() {
        parent::__construct();
    }

    /**
     * FUNÇÃO GRAVAR
     * @param array $data
     * @return boolean
     */
    public function gravar($data) {
        $data['created_at'] = date("Y-m-d H:i:s");
        if($this->db->insert('uploads', $data)){
            return $this->db->insert_id();
        } else {
            return false;
        }
    }
    
    /**
     * FUNÇÃO SELECT TOP X
     * @param type $n
     * @return type
     */
    public function top($n){
        $this->db->select();
        $this->db->order_by('created_at','desc');
        $this->db->where('approved','1');
        $this->db->limit($n);
        
        $query = $this->db->get('uploads');
        
        return $query->result();
    }

    /**
     * FUNÇÃO SELECT TO APPROVE
     * @return type Array
     */
    public function selectToAprove(){
        $this->db->select();
        $this->db->order_by('created_at','asc');
        $this->db->where('approved=',0);
        
        $query = $this->db->get('uploads');
        
        return $query->result();
    }
    
    /**
     * FUNÇÃO APROVAR
     * @param type $id
     */
    public function aprovar($id){
        $data = array('approved'=>'1','approved_by'=>$this->session->userdata('email'));
        $this->db->where('iduploads',$id);
        if($this->db->update('uploads',$data)){
            return true;
        } else {
            return false;
        }
    }
    
     public function reprovar($id){
        $data = array('approved'=>'2','approved_by'=>$this->session->userdata('email'));
        $this->db->where('iduploads',$id);
        if($this->db->update('uploads',$data)){
            return true;
        } else {
            return false;
        }
    }
    
}
