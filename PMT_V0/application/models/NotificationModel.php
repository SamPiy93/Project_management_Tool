<?php

class NotificationModel extends CI_Model{
    function addNotification($memID, $proID, $ref, $type, $res_mem){
        $this->db->insert('notifications', array(
                    'target_member' => $memID ,
                    'project_id' => $proID,
                    'type' => $type,
                    'status' => 0,
                    'res_mem' =>$res_mem,
                    'refference' => $ref
                    ));
            
    }
    
    function getUnreadNotification($memID){
        $query = $this->db->query('
            SELECT c.date, c.note, n.date_time, p.project_name
            FROM notifications n, calendarnotes c, projects p 
            WHERE c.noteID=n.refference AND n.project_id = p.project_id AND n.type = 1 AND n.status = 0 AND n.target_member = '.$memID.' ORDER BY n.date_time DESC');
        
        foreach($query->result() as &$res){
           
            $res->date_time = $this->time_elapsed_string($res->date_time);
            $res->note = "Team Leader of ".$res->project_name."<br/> has added  a calendar note <br/>on ".$res->date." for you" ;
                
        }
       
       
        return $query->result() ;
    }
    
        function getSeenNotification($memID){
        $query = $this->db->query('
            SELECT c.date, c.note, n.date_time, p.project_name
            FROM notifications n, calendarnotes c, projects p 
            WHERE c.noteID=n.refference AND n.project_id = p.project_id AND n.type = 1 AND n.status = 1 AND n.target_member = '.$memID.' ORDER BY n.date_time DESC');
        
        foreach($query->result() as &$res){
           
            $res->date_time = $this->time_elapsed_string($res->date_time);
            $res->note = "Team Leader of ".$res->project_name."<br/> has added  a calendar note <br/>on ".$res->date." for you" ;
                
        }
       
       
        return $query->result() ;
    }
    
    function countNotification($memID){
        $this->db->select('notifications');
        $this->db->where('status',0)->where('target_member',$memID);
        $count = $this->db->count_all_results('notifications');
        return $count;
    }
    
    function seenNotifications($memID){
        $this->db->where('target_member',$memID)->where('status',0)->update('notifications',array(
                        'status' => 1
                        )) ;
    }
    
    function time_elapsed_string($datetime, $full = false) {
        date_default_timezone_set('Asia/Colombo');
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }
}
