<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Project_model
 *
 * @author Madumal Sameera
 */
class Project_model extends CI_Model {
    protected $table='projects';
    /*
    public $project_id;
    public $project_name;
    public $project_description;
    public $project_visibility;
    public $project_member_count;
    */
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function insert($params){
        $fields=array(
            'project_name'=>$params['p_name'],
            'project_description'=>$params['p_description'],
            'project_visibility'=>$params['p_visibility'],
            'project_member_count'=>$params['p_member_count']
        );
        
        $this->db->insert($this->table,$fields);
    }
    
    public function display_projects(){
        //$this->db->select('project_id,project_name,project_description,project_visibility,project_member_count');
        $query=$this->db->get('projects');
        return $query->result_array();
    }
    
    public function get_details($id){
        $query=  $this->db->query("select * from projects where project_id='$id'");
        return $query->result_array();
    }
    
    public function remove_project($id){
        //to check whether there are tasks in the project
        $query1=$this->db->query("select * from tasks where project_id='$id'");
        $count=$query1->num_rows();
        if($count==0){
            $query=$this->db->query("delete from projects where project_id='$id'");
            return true;
        }else{
            return false;
        }
    }
    public function getMembers(){
        $query=$this->db->query('select * from pusers');
        return $query->result_array();
    }
    
    public function searchProjects($key){
        $query=  $this->db->query("select * from projects where project_name LIKE '%$key%' or project_description LIKE '%$key%'");
        if($query->num_rows()>0){
            return $query->result_array();
        }else{
            return 0;
        }
    } 
    
}
