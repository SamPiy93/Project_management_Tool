<?php

class Notifications extends CI_Controller {
    function index(){
        $user_id = 1 ;
        $this->showNotifications($user_id) ;
    }
    function showNotifications($userID){
        
        //Setting For Message System
        $this->load->model('MessageModel');
        $data["messageCount"]=$this->MessageModel->countMessages($userID);
        $data["unMsgs"]=$this->MessageModel->getUnreadMessages($userID);
        //End of Message System
        
        //Setting For Notification System
        $this->load->model('NotificationModel');
        
        $data["notificationCount"]=$this->NotificationModel->countNotification($userID);
        $data["unNotifications"]=$this->NotificationModel->getUnreadNotification($userID);
        $data["seenNotifications"]=$this->NotificationModel->getSeenNotification($userID);
        
        $data["notifications"]=$this->NotificationModel->seenNotifications($userID);
        $this->load->view('NotificationsView',$data);
    }
}
