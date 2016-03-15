<?php

class messages extends CI_Controller{ 
    function index($conv_mem_id=null){
        
        $user_id = 1 ;
        $this->showMessages($user_id,$conv_mem_id) ;
    }
    function showmessages($userID,$conv_mem_id=null){
        
        
        
        
        
        
        
        //Setting For Notification System
        $this->load->model('notification_model');
        
        $data["notificationCount"]=$this->notification_model->countNotification($userID);
        $data["unNotifications"]=$this->notification_model->getUnreadNotification($userID);
        $data["seenNotifications"]=$this->notification_model->getSeenNotification($userID);
        
        //Setting For Message System
        $this->load->model('message_model');
        if(!$conv_mem_id){
            $temp = $this->message_model->lastMsgSender($userID);
            foreach ($temp as $t){
            $conv_mem_id = $t->sender;
            }
        }
        $this->message_model->seenMessages($conv_mem_id,$userID);
        $data["messageCount"]=$this->message_model->countMessages($userID);
        $data["unMsgs"]=$this->message_model->getUnreadMessages($userID);
        $data["AllMsgs"]=$this->message_model->getAllMessages($userID);
        $data["messages"]=$this->message_model->retrieveMessages($userID, $conv_mem_id);
        //End of Message System
        
        //Sending Message
        $to = $this->input->post('to');
        $msg = $this->input->post('msg');
        
        if($msg){
            $this->message_model->sendMessage($userID, $to, $msg );
        }
        
        //passing user data to view
        $data["userID"] = $userID;
        $data["conv_mem_id"] = $conv_mem_id;
        
        $this->load->view('messages_view',$data);
    }
}
