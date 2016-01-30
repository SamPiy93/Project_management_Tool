<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Task_model
 *
 * @author Madumal Sameera
 */
class Task_model extends CI_Model{
    //put your code here
    protected $task_table="tasks";
            function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function get_task_details($id){
        $query=  $this->db->query("select * from tasks where project_id='$id'");
        return $query->result_array();
    }
    
    public function insert_tasks($params){
        //$this->db->insert('$t_id,$t_number,$t_details,$p_id');
        
        
        $fields=array(
            'task_number'=>$params['t_number'],
            'task_details'=>$params['t_details'],
            'project_id'=>$params['p_id']
        );
        
        $this->db->insert($this->task_table,$fields);
         
         
    }
    public function increment_task_no($id){
        $query=$this->db->query("select * from tasks where project_id='$id'");
        $count=$query->num_rows();
        return ++$count;
    }
    
    public function delete_task($id,$number){
        $query=  $this->db->query("delete from tasks where project_id='$id' and task_number='$number'");
        return $query;
    }
    
}
?>
