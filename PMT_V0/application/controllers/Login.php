<?php
class Login extends CI_Controller{
    
    public function index(){
        $this->load->view('LoginView');
    }
    
    public function checkLogin(){
        
        
        $this->form_validation->set_rules('email','Email','required|valid_email');
        $this->form_validation->set_rules('password','Password','required|callback_verifyUser');
        
        if($this->form_validation->run()== false){
            $this->load->view('LoginView');
            
        }
        else{
            redirect('http://localhost/codeignitertest/index.php/Home/');
        }
         
         
        
    }
    
    public function verifyUser(){
        $email      =   $this->input->post('email');
        $password   =   $this->input->post('password');   
        
        $this->load->model('LoginModel');
        
        if($this->LoginModel->login($email,$password)){
            return true;
        }  
        else {
            $this->form_validation->set_message('verifyUser','Incorrect Email or Password');
            return false;
        }
    }   
}




