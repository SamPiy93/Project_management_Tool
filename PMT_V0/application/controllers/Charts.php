<?php

class Charts extends CI_Controller {
    function index(){
        $projectID = 3;
        $userID = 1;
        $this->showCharts($projectID,$userID);
        
    }
    
    function showCharts($proID, $userID){
        
        $this->load->model('ChartsModel');
        $this->load->model('CalendarModel');
        
        $data["allCount"] = $this->ChartsModel->countCalNotes($proID);
        $data["sucCount"] = $this->ChartsModel->countSucCalNotes($proID);
        $data["projectStatus"] = $this->ChartsModel->getNoteStatus($proID);
        $this->CalendarModel->expireStatus();
        
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
        
        $this->load->view('ChartView',$data);
    }
}
