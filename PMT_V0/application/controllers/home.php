<?php
class home extends CI_Controller{
    
    public function index(){
        $userID = 1;
        //Setting For Notification System
        $this->load->model('notification_model');
        //Clear Notifications
        $clear = $this->input->post('clear');
        if($clear){
            $data["notifications"]=$this->notification_model->seenNotifications($userID);
        }
        $data["notificationCount"]=$this->notification_model->countNotification($userID);
        $data["notifications"]=$this->notification_model->getUnreadNotification($userID);
        
        //Setting For Message System
        $this->load->model('message_model');
        $data["messageCount"]=$this->message_model->countMessages($userID);
        $data["unMsgs"]=$this->message_model->getUnreadMessages($userID);
        //End of Message System
        
        //settings for homepage
        $this->load->model('home_model');
        $data["seenNotifications"]=$this->home_model->getMostNotification($userID);
        $data["AllMsgs"]=$this->home_model->getMostMessages($userID);
        
        
        $this->load->view('home_view',$data);
    }
    
}
