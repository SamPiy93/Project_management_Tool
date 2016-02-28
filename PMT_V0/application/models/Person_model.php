<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Person_model extends CI_Model {
 
    var $table = 'pusers';
    var $column = array('id','username','password','first_name','last_name','email','type'); 
	//set column field database for order and search
    var $order = array('id' => 'desc');
	 
 
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    function getloginlog(){
        
        
        $p = $this->db->query("select * from loginlog order by username");
      
        $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode(array(
                    'count' => count($p->result_array()),
                    'data' => $p->result_array()
            )));
        
    }
 
    
 
    function get_datatables(){
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered(){
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all(){
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
 
    public function get_by_id($id){
        $this->db->from($this->table);
        $this->db->where('id',$id);
        $query = $this->db->get();
 
        return $query->row();
    }
 
    public function save($data){
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
 
    public function update($where, $data){
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }
 
    public function delete_by_id($id){
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }
 
    function deletepeople(){
       $id = $_REQUEST['id123'];   
       $p = $this->db->query("delete from pusers where id='$id'");
         
    }
 
}