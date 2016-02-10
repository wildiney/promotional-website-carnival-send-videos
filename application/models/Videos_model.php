<?php
/**
 * Description of login_model
 *
 * @author wfpimentel
 */
class Videos_model extends CI_model {

    public function __construct() {
        parent::__construct();
    }

    /**
     * FUNÇÃO SELECT TOP X
     * @param type $n
     * @return type
     */
    public function allVideos(){
        $this->db->select();
        $this->db->order_by('created_at','desc');
        $this->db->where('approved','1');

        $query = $this->db->get('uploads');
        
        return $query->result();
    }

    /**
     * FUNÇÃO VOTED
     * @return type Array
     */
    public function voted(){
        $this->db->select();
        $this->db->where('matricula',$this->session->userdata('matricula'));
        $query = $this->db->get('votes');

        return $query->result();
    }
    
    /**
     * FUNÇÃO VOTE
     * @param array $id
     * @return type boolean
     */
    public function vote($data){
        $this->db->select();
        $this->db->from('votes');
        $this->db->where('matricula',$data['matricula']);
        $this->db->where('video',$data['video']);
        
        if($this->db->count_all_results()>0){
            $this->db->where('matricula',$data['matricula']);
            $this->db->where('video',$data['video']);
            $this->db->delete('votes');
        } else {
            if($this->db->insert('votes',$data)){
                return true;
            } else {
                return false;
            }
        }
    }
    
    public function ranking(){
        $this->db->select('*, COUNT(*) as votos');
        $this->db->from('votes');
        $this->db->join('uploads', 'votes.video = uploads.iduploads');
        //$this->db->having('COUNT(*) > 1');
        $this->db->group_by('video');
        $this->db->order_by('votos desc');
        
        $query = $this->db->get();
        
        return $query->result();
    }
    
    public function getVideosById($id){
        $this->db->select();
        $this->db->from('uploads');
        $this->db->where('iduploads',$id);
        
        $query = $this->db->get();
        
        return $query->result();
    }
}
