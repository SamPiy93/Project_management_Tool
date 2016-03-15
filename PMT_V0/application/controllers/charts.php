<?php

class charts extends CI_Controller {
    function index(){
        $projectID = 3;
        $userID = 1;
        $this->showCharts($projectID,$userID);
        
    }
    
    function showCharts($proID, $userID){
        
        //settings for chart
        $this->load->model('charts_model');
        $this->load->model('calendar_model');
        
        $data["allCount"] = $this->charts_model->countCalNotes($proID);
        $data["sucCount"] = $this->charts_model->countSucCalNotes($proID);
        $data["projectStatus"] = $this->charts_model->getNoteStatus($proID);
        $this->calendar_model->expireStatus();
        
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
        
        $this->load->view('chart_view',$data);
    }
}
