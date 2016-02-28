<?php

class Login extends CI_Controller {
	
	
    function __construct(){
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }
    function index(){
       $this->load->view("includes/header");
       $this->load->view("login_form");
       $this->load->view("includes/footer");
    }
    
    
    function getpeople(){
        $p = $this->db->query("select * from pusers");
        
        $this->output
             ->set_content_type('application/json')
             ->set_status_header(200)
             ->set_output(json_encode(array(
                    'count' => count($p->result_array()),
                    'data' => $p->result_array()
            )));
        
    }
    
    
    function loginCheck(){
        $username=$_REQUEST["username"];
        $pw=$_REQUEST["password"];
        
        
        $check = $this->db->query("SELECT * FROM `pusers` WHERE `username` = '$username' AND `password` = '$pw'");
        
        if(empty($check->result_array()))
        {
            $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode(array(
                    'status' => '0'
            ))); 
            
        }         
        else
            {
            $info = json_encode(array(
                    'data' => $check->result_array()
            ));
             
            $infoJson = (array) json_decode($info);
            $adminuser = $infoJson['data'][0]->type;
            $userstat = $infoJson['data'][0]->state;
            $_SESSION['ID'] = $infoJson['data'][0]->id;
            $_SESSION['IMG'] = $infoJson['data'][0]->img_path;
            $_SESSION['NAME'] = $infoJson['data'][0]->first_name." ".$infoJson['data'][0]->last_name ;
            $_SESSION['USERSTATUS'] = $infoJson['data'][0]->state;
            $_SESSION['USERTYPE'] = $adminuser;
             
            $login_data = array(
				'username' => $username	
			);
			
	    $this->db->insert('loginlog', $login_data);
            $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode(array(
                    'status' => '1',
                    'usertype' => $adminuser,
                     'ustatus' => $userstat
            )));
            }
			
        
    }
    
    	
    function login1(){
        session_destroy();
        $this->load->view('login_form');
        
    }
    
    
    function loadSignup(){
        $this->load->view("signup2");      
    }
	 
     public function signupData(){
	
        $email =  $this->input->post('email');
    
        $un= $this->input->post('username');
    
        $config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '1000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);
				
		$img_path = '';
		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$img_path = $data['upload_data']['file_name'];
		}
    
     	$check = $this->db->query("SELECT * FROM `pusers` WHERE `email` = '$email' or `username`='$un'");
     
         if(empty($check->result_array())){
            
           
			$sign_up_data = array(
				'first_name' => $this->input->post('firstname'),
				'last_name' => $this->input->post('lastname'),
				'email' => $this->input->post('email'),
				'username' => $this->input->post('username'),
				'Password' => $this->input->post('password'),
                                'State' => 'Deactive',
			        'img_path'=>$img_path
			);
			
			$this->db->insert('pusers', $sign_up_data);
             
                         $this->output
                         ->set_content_type('application/json')
                         ->set_status_header(200)
                         ->set_output("1"); 
    
           
        }
        
         else{
             
            $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output("0"); 
             
         }

// Show submitted data on view page again.
//header("Location:../login/?id=your registration was successful");


} 

     public function checkemail(){
     $email =  $this->input->post('email');
    
     $un= $this->input->post('username');
     $check = $this->db->query("SELECT * FROM `pusers` WHERE `email` = '$email' or `username`='$un'");
     
     if(empty($check->result_array())){
              $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode(array(
                    'status' => '1'
            ))); 
    }
    else{ 
            $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode(array(
                    'status' => '0'
            ))); 
             
         }
}


     public function logout(){
	session_destroy();
	header("Location:../login/");
     }



}


?>