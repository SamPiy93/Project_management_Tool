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
    
    function __construct() {
        parent::__construct();
        $this->load->model(array('project_model','Task_model'));
    }
    public function index(){
        $this->data['projects']=$this->project_model->display_projects();
        $this->US['u']=  $this->project_model->getMembers();
        $this->load->view('index.php',$this->data);
        $this->load->view('pro_modal',$this->US);
        $this->load->view('modal_box');
        $this->load->view('task_modal_box');
        $this->load->view('task_view');
        $this->load->view('confirmation_pop_box');
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
        $this->data['projects']=$this->project_model->display_projects();
        $this->data['row']=$this->project_model->get_details($project_id);
        $this->data['task_data']=  $this->Task_model->get_task_details($project_id);
        $this->data['task_count']=$this->Task_model->increment_task_no($project_id); 
        $this->US['u']=  $this->project_model->getMembers();
        
        $this->load->view('index.php',$this->data);
        $this->load->view('modal_box');
        $this->load->view('pro_modal',  $this->US);
        $this->load->view('task_modal_box',$this->data);
        $this->load->view('task_view',  $this->data);
        $this->load->view('confirmation_pop_box');
        $this->load->view('member_box');
    }
    
    public function delete_project($project_id){
        $result=$this->project_model->remove_project($project_id);

        if($result){
            echo "<script>alert('successfully deleted');</script>";
            $this->data['projects']=$this->project_model->display_projects();
            $this->index();
        }else{
            echo "<script>alert('There are one or more tasks inside the project');</script>";
            echo "<script>window.location.href=\"";
            echo base_url();
            echo "\"</script>";
        }
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
        }
        
        header('Location:'.base_url());
    }
    public function delete_task($task_project_id,$task_number){
        $status=$this->Task_model->delete_task($task_project_id,$task_number);
        header('Location:http://localhost/PMT_V0/Index_controller/');
    }
    
    public function assign_task_controller($mem_id,$pro_id,$task_id){
        $status=$this->Task_model->assign_task($mem_id,$pro_id,$task_id);
        
        if($status==1){
            echo "<script>alert('Task '+$task_id+' assigned to Member '+$mem_id+' successfully!')</script>";
            echo "<script>window.location.href=\"";
            echo base_url()."Index_controller/project_tasks/$pro_id";
            echo "\"</script>";
        }else{
            echo "<script>alert('System Error: (Member already assigned or Database Error)!')</script>";
            echo "<script>window.location.href=\"";
            echo base_url()."Index_controller/project_tasks/$pro_id";
            echo "\"</script>";
        }
    }
    
    public function searchProjects(){
        $project_search=null;

        extract($_POST);
        
        $result=$this->project_model->searchProjects($project_search);
        
        if($result==0){
            echo "<script>alert('No Records Found!')</script>";
            $this->index();
        }else{
            $this->data['search']=$result;
            $this->data['projects']=$this->project_model->display_projects();
            $this->US['u']=  $this->project_model->getMembers();
        
            $this->load->view('index.php',$this->data);
            $this->load->view('pro_modal',$this->US);
            $this->load->view('modal_box');
            $this->load->view('task_modal_box');
            $this->load->view('task_view');
            $this->load->view('confirmation_pop_box');
        }
    } 
}
?>