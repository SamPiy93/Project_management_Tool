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
    
    public function get_member_details_of_the_project($project_id){
        //getting member details of the project by the project id
        $query=$this->db->query("select * from pusers");
    }
    public function assign_task($mem_id,$pro_id,$task_id){
        //assign the task to corresponding member or members in the team
        $check=$this->db->query("select * from workLoad where member_id='$mem_id' && project_id='$pro_id' && task_id='$task_id'");
        
        if($check->num_rows()==0){
            $query=$this->db->query("insert into workLoad(member_id,project_id,task_id) values('$mem_id','$pro_id','$task_id')");
            if(($this->db->affected_rows())>0){
                return 1;
            }else{
                return 0;
            }
        }else{
            return 0;
        }
    }
}
?>
