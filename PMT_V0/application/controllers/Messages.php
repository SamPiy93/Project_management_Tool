<?php

class Messages extends CI_Controller{ 
    function index($conv_mem_id=null){
        
        $user_id = 1 ;
        $this->showMessages($user_id,$conv_mem_id) ;
    }
    function showmessages($userID,$conv_mem_id=null){
        
        
        
        
        
        
        
        //Setting For Notification System
        $this->load->model('NotificationModel');
        
        $data["notificationCount"]=$this->NotificationModel->countNotification($userID);
        $data["unNotifications"]=$this->NotificationModel->getUnreadNotification($userID);
        $data["seenNotifications"]=$this->NotificationModel->getSeenNotification($userID);
        
        //Setting For Message System
        $this->load->model('MessageModel');
        if(!$conv_mem_id){
            $temp = $this->MessageModel->lastMsgSender($userID);
            foreach ($temp as $t){
            $conv_mem_id = $t->sender;
            }
        }
        $this->MessageModel->seenMessages($conv_mem_id,$userID);
        $data["messageCount"]=$this->MessageModel->countMessages($userID);
        $data["unMsgs"]=$this->MessageModel->getUnreadMessages($userID);
        $data["AllMsgs"]=$this->MessageModel->getAllMessages($userID);
        $data["messages"]=$this->MessageModel->retrieveMessages($userID, $conv_mem_id);
        //End of Message System
        
        //Sending Message
        $to = $this->input->post('to');
        $msg = $this->input->post('msg');
        
        if($msg){
            $this->MessageModel->sendMessage($userID, $to, $msg );
        }
        
        $data["userID"] = $userID;
        $data["conv_mem_id"] = $conv_mem_id;
        
        $this->load->view('MessagesView',$data);
    }
}
