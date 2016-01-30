<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Index_controller
 *
 * @author Madumal Sameera
 */
class Index_controller extends CI_Controller {
    //put your code here
    function __construct() {
        parent::__construct();
        
        $this->load->model(array('project_model','Task_model'));
    }
    public function index(){
        $this->data['projects']=$this->project_model->display_projects();
        $this->load->view('index.php',$this->data);
        $this->load->view('modal_box');
        $this->load->view('task_modal_box');
        $this->load->view('task_view');
        //$this->load->view('task_modal_box');
        /*
        $this->data['projects']=$this->project_model->display_projects();
        //$this->load->view('home_view',  $this->data);
        $this->load->view('header_content');
        $this->load->view('modal_box');
        
        $this->load->view('left_content',  $this->data);
        $this->load->view('right_content');
        $this->load->view('task_modal_box');
         * 
         */
    }
    public function call_buttons(){
        
        $this->load->view('general');
    }

    public function register(){
        $project_name=null;
        $project_description=null;
        $project_visibility=null;
        $project_member_count=0;
        
        extract($_POST);
        
        $params['p_name']=$project_name;
        $params['p_description']=$project_description;
        $params['p_visibility']=$project_visibility;
        $params['p_member_count']=$project_member_count;
        
        if(isset($submit)){
            $this->project_model->insert($params);
        }
        
        header('Location:'.base_url());
    }
    
    public function project_tasks($project_id){
        //$this->load->view('task_view');
        //echo "<script>alert($project_id);</script>";
        $this->data['projects']=$this->project_model->display_projects();
        $this->data['row']=$this->project_model->get_details($project_id);
        $this->data['task_data']=  $this->Task_model->get_task_details($project_id);
        $this->data['task_count']=$this->Task_model->increment_task_no($project_id);
        //$this->load->view('header_content');
        
        $this->load->view('index.php',$this->data);
        //$this->load->view('left_content',  $this->data);
        //$this->load->view('right_content',$indiv_project);
        $this->load->view('modal_box');
        $this->load->view('task_modal_box',$this->data);
        $this->load->view('task_view',  $this->data);
    }
    
    public function delete_project($project_id){
        //$this->load->view('task_view');
        //echo "<script>alert($project_id);</script>";
        $this->data['query_result']=  $this->project_model->remove_project($project_id);
        
        $this->data['projects']=$this->project_model->display_projects();
        
        header('Location:'.base_url());
        
    }
 
    public function add_task(){
        
        $task_number=null;
        $task_details=null;
        $project_id=null;
        
        extract($_POST);
        
        $params['t_number']=$task_number;
        $params['t_details']=$task_details;
        $params['p_id']=$project_id;
        
        if(isset($submit)){
            $this->Task_model->insert_tasks($params);
            //$c=$this->Task_model->increment_task_no($project_id);
            
        }
        
        header('Location:'.base_url());
    }
}
?>