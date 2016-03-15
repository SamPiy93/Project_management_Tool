<?php

class notifications extends CI_Controller {
    function index(){
        $user_id = 1 ;
        $this->showNotifications($user_id) ;
    }
    function showNotifications($userID){
        
        //Setting For Message System
        $this->load->model('message_model');
        $data["messageCount"]=$this->message_model->countMessages($userID);
        $data["unMsgs"]=$this->message_model->getUnreadMessages($userID);
        //End of Message System
        
        //Setting For Notification System
        $this->load->model('notification_model');
        
        $data["notificationCount"]=$this->notification_model->countNotification($userID);
        $data["unNotifications"]=$this->notification_model->getUnreadNotification($userID);
        $data["seenNotifications"]=$this->notification_model->getSeenNotification($userID);
        
        $data["notifications"]=$this->notification_model->seenNotifications($userID);
        $this->load->view('notifications_view',$data);
    }
}
