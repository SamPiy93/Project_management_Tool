<?php

class Calendar extends CI_Controller{
    
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
        
        
        
        $this->load->model('CalendarModel');
        $day = $this->input->post('day');
        //Add Reminder
        if($day){
            
            $this->CalendarModel->addReminder(
                "$year-$month-$day",
                 $this->input->post('data'),
                 $this->input->post('members'),
                 $projectId,
                 $memberID
                );
            
        }
        $task = $this->input->post('task');
        if($task){
            $this->CalendarModel->clearTasks($task,$memberID);
        }
        
		
        $this->CalendarModel->expireStatus();
        $data['calendar'] = $this->CalendarModel->generate($year, $month, $projectId);
        $data['proData'] = $this->CalendarModel->retrieveProjects($projectId);
        $data['memberData'] = $this->CalendarModel->retrieveMembers($projectId);
        $data['taskData'] = $this->CalendarModel->retrieveTasks($memberID);
        $this->CalendarModel->expireStatus();
        
        //Setting For Notification System
        $this->load->model('NotificationModel');
        $clear = $this->input->post('clear');
        if($clear){
            $data["notifications"]=$this->NotificationModel->seenNotifications($memberID);
        }
        
        $data["notificationCount"]=$this->NotificationModel->countNotification($memberID);
        $data["notifications"]=$this->NotificationModel->getUnreadNotification($memberID);
        //End Of Notifications Settings
        
        //Setting For Message System
        $this->load->model('MessageModel');
        $data["messageCount"]=$this->MessageModel->countMessages($memberID);
        $data["unMsgs"]=$this->MessageModel->getUnreadMessages($memberID);
        //End of Message System
        
        
        
        $this->load->view('CalendarView',$data);
        
    }
}
