<?php
class Home extends CI_Controller{
    
    public function index(){
        $userID = 1;
        //Setting For Notification System
        $this->load->model('NotificationModel');
        //Clear Notifications
        $clear = $this->input->post('clear');
        if($clear){
            $data["notifications"]=$this->NotificationModel->seenNotifications($userID);
        }
        $data["notificationCount"]=$this->NotificationModel->countNotification($userID);
        $data["notifications"]=$this->NotificationModel->getUnreadNotification($userID);
        
        //Setting For Message System
        $this->load->model('MessageModel');
        $data["messageCount"]=$this->MessageModel->countMessages($userID);
        $data["unMsgs"]=$this->MessageModel->getUnreadMessages($userID);
        //End of Message System
        
        $this->load->model('home_model');
        $data["seenNotifications"]=$this->home_model->getMostNotification($userID);
        $data["AllMsgs"]=$this->home_model->getMostMessages($userID);
        
        
        $this->load->view('HomeView',$data);
    }
    
}
