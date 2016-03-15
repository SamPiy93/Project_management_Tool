<?php

class calendar extends CI_Controller{
    
    function index($year=null, $month=null){
        
        $this->showCal($year,$month);
        
    }
            
    function showCal($year=null, $month=null){
        $projectId = 3;
        $memberID = 1;
        
        if(!$year){
            $year = date("Y");
        }
        
        if(!$month){
            $month = date("m");
        }
        
        
        
        $this->load->model('calendar_model');
        $day = $this->input->post('day');
        //Add Reminder
        if($day){
            
            $this->calendar_model->addReminder(
                "$year-$month-$day",
                 $this->input->post('data'),
                 $this->input->post('members'),
                 $projectId,
                 $memberID
                );
            
        }
        $task = $this->input->post('task');
        if($task){
            $this->calendar_model->clearTasks($task,$memberID);
        }
        
	//Settings for calendar	
        $this->calendar_model->expireStatus();
        $data['calendar'] = $this->calendar_model->generate($year, $month, $projectId);
        $data['proData'] = $this->calendar_model->retrieveProjects($projectId);
        $data['memberData'] = $this->calendar_model->retrieveMembers($projectId);
        $data['taskData'] = $this->calendar_model->retrieveTasks($memberID);
        $this->calendar_model->expireStatus();
        
        //Setting For Notification System
        $this->load->model('notification_model');
        $clear = $this->input->post('clear');
        if($clear){
            $data["notifications"]=$this->notification_model->seenNotifications($memberID);
        }
        
        $data["notificationCount"]=$this->notification_model->countNotification($memberID);
        $data["notifications"]=$this->notification_model->getUnreadNotification($memberID);
        //End Of Notifications Settings
        
        //Setting For Message System
        $this->load->model('message_model');
        $data["messageCount"]=$this->message_model->countMessages($memberID);
        $data["unMsgs"]=$this->message_model->getUnreadMessages($memberID);
        //End of Message System
        
        
        
        $this->load->view('calendar_view',$data);
        
    }
}
