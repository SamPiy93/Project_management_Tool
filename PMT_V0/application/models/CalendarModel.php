<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CalendarModel
 *
 * @author Malin
 */
class CalendarModel extends CI_Model{
    
    function generate($year, $month, $project_id){
     
        $preff = array(
            'day_type' => 'short',
            'start_day' => 'monday',
            'show_next_prev' => TRUE,
            'next_prev_url' =>  'http://localhost/codeignitertest/index.php/Calendar/showCal'
        );
        
        $reminders = $this->getReminders($year, $month, $project_id);
        
        
        $preff['template'] = '

        {table_open}<table border="0" cellpadding="0" cellspacing="0" class="calendar">{/table_open}

        {heading_row_start}<tr>{/heading_row_start}

        {heading_previous_cell}<th style="text-align:center !important;"><a href="{previous_url}"><i class="fa fa-angle-left"></i><i class="fa fa-angle-left"></i></a></th>{/heading_previous_cell}
        {heading_title_cell}<th colspan="{colspan}" style="text-align:center !important;">{heading}</th>{/heading_title_cell}
        {heading_next_cell}<th style="text-align:center !important;"><a href="{next_url}"><i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i></a></th>{/heading_next_cell}

        {heading_row_end}</tr>{/heading_row_end}

        {week_row_start}<tr>{/week_row_start}
        {week_day_cell}<td>{week_day}</td>{/week_day_cell}
        {week_row_end}</tr>{/week_row_end}

        {cal_row_start}<tr class="days">{/cal_row_start}
        {cal_cell_start}<td class="day">{/cal_cell_start}
        {cal_cell_start_today}<td>{/cal_cell_start_today}
        {cal_cell_start_other}<td class="other-month">{/cal_cell_start_other}

        {cal_cell_content}
        <div class="day_num">{day}</div>
        <div class="content">{content}</div>
        {/cal_cell_content}
        {cal_cell_content_today}
        <div class="day_num highlight">{day}</div>
        <div class="content">{content}</div>
        {/cal_cell_content_today}

        {cal_cell_no_content}<div class="day_num">{day}</div>{/cal_cell_no_content}
        {cal_cell_no_content_today}<div class="day_num highlight">{day}</div>{/cal_cell_no_content_today}

        {cal_cell_blank}&nbsp;{/cal_cell_blank}

        {cal_cell_other}{day}{/cal_cel_other}

        {cal_cell_end}</td>{/cal_cell_end}
        {cal_cell_end_today}</td>{/cal_cell_end_today}
        {cal_cell_end_other}</td>{/cal_cell_end_other}
        {cal_row_end}</tr>{/cal_row_end}

        {table_close}</table>{/table_close}
';

        
        
        $this->load->library('calendar',$preff);
        return $this->calendar->generate($year, $month, $reminders );
    }
    
    function getReminders($year, $month, $proID){
        $query = $this->db->select('date,note')->from('CalendarNotes')
                ->like('date',"$year-$month",'after')->where('project_id',$proID)->get();
        $calData = array();
        
        foreach($query->result() as $row){
            $calData[intval(substr($row->date,8,2))] = $row->note;
        }
        return $calData;
    }
    
    function addReminder($date, $reminder, $members, $project_id, $res_mem){
        
        $this->load->model('NotificationModel');
        
        $temp = $this->db->select('date')->from('CalendarNotes')
                ->where('date',$date)->count_all_results();
        
        
        
        if($temp){
                $this->db->where('date',$date)->update('CalendarNotes',array(
                'date' => $date ,
                'note' => $reminder,
                'project_id' => $project_id,
                'status' => '0'
                )) ;
                
                $noteid = $this->db->select('noteID')->from('CalendarNotes')
                ->where('date',$date)->get();
                
                foreach($noteid->result() as $noid){
                    $nid = $noid->noteID ;
                }
                
                foreach ($members as $mem){
                    $temp2 = $this->db->select('note_id')->from('target_members')
                        ->where('note_id',$nid)->where('member_id',$mem)->count_all_results();
                    if($temp2){
                        $this->db->where('note_id',$nid)->where('member_id',$mem)->update('target_members',array(
                        'status' => 0
                        )) ;
                        //Create Notification
                        $this->NotificationModel->addNotification($mem,$project_id,$nid,1,$res_mem);
                        
                    }
                    else{
                        $this->db->insert('target_members', array(
                        'note_id' => $nid,
                        'member_id' => $mem,
                        'project_id' => $project_id,
                        'status' => 0
                    ));
                        //Create Notification
                        $note = "has added a Calendar Note for ".$date ;
                        $this->NotificationModel->addNotification($mem,$project_id,$nid,1,$res_mem);
                    }
                }
        }
        else {
            $this->db->insert('CalendarNotes', array(
                'date' => $date ,
                'note' => $reminder,
                'project_id' => $project_id,
                'status' => '0'
                ));
            
            $insert_id = $this->db->insert_id();
           
            foreach ($members as $mem){
                    //Adding Data
                    $this->db->insert('target_members', array(
                    'note_id' => $insert_id ,
                    'member_id' => $mem,
                    'project_id' => $project_id,
                    'status' => 0
                    ));
                    //Create Notification
                    $this->NotificationModel->addNotification($mem,$project_id,$insert_id,1,$res_mem);
            }
                
                    
            
            
        }
    }
    
    public function retrieveProjects($proID){
        $this->db->select('*');
        $this->db->from('projects');
        $this->db->where('project_id',$proID);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function retrieveMembers($proID){
        
        $query = $this->db->query('SELECT u.id, u.first_name, u.last_name
                                    FROM pusers u, project_members p
                                    WHERE p.member_id = u.id AND p.project_id = '.$proID.'
                                    ');
        
        foreach($query->result() as &$res){
           
            $res->first_name = $res->first_name." ".$res->last_name;
                
        }
        return $query->result();
        
    }
    
    public function retrieveTasks($memberID){
        $this->db->select('calendarnotes.date, calendarnotes.note, calendarnotes.noteID, target_members.status');
        $this->db->from('target_members');
        $this->db->join('calendarnotes', 'calendarnotes.noteID = target_members.note_id');
        $this->db->where('target_members.member_id',$memberID)->where('target_members.status !=',1);
        
        $query = $this->db->get();
        return $query->result();
    }
    
    public function clearTasks($taskID, $memberID){
       
        $this->db->where('note_id' , $taskID)->where('member_id', $memberID)->update('target_members',array(
                'status' => 1
                )) ;
        
        $this->db->select('note_id');
        $this->db->where('note_id',$taskID);
        $allcount = $this->db->count_all_results('target_members');
        
        $this->db->select('note_id');
        $this->db->where('note_id',$taskID)->where('status',1);
        $succount = $this->db->count_all_results('target_members');
        
        if($allcount == $succount){
            $this->db->where('noteID' , $taskID)->update('calendarnotes',array(
                'status' => 1
                )) ;
        }
        
    }
	
	    
    public function expireStatus(){
		
        $cur_date = date('Y-m-d');
		
        $query = $this->db->query("select c.noteID
                            from target_members t, calendarnotes c
                            where c.date < '".$cur_date."' AND t.status = 0 AND c.noteID = t.note_id");
        
        
		foreach($query->result() as $row){
			$this->db->where('note_id ' , $row->noteID)->update('target_members',array(
                'status' => 2
                )) ;
        
		}
    }
}
