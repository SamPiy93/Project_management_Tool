<?php

class home_model extends CI_Model{
    
    
        /*
        * getMostMessages
        *
        * Get upmost recent messages
        *
        * @param $memID(integer) id of the member
        * @return String Array Object of upmost recent messages
        */
        function getMostMessages($memID){
            //get most recent three messages
            $query = $this->db->query('
                SELECT m.message, m.date_time, u.first_name, u.last_name, u.id, r.status
                FROM messages m, msg_recivers r, pusers u
                WHERE m.msg_id = r.msg_id AND m.sender = u.id AND r.user_id = '.$memID.' AND m.date_time = (SELECT MAX(date_time)
                                                                                                    FROM messages m1, msg_recivers r1
                                                                                                    WHERE m1.msg_id = r1.msg_id AND r1.user_id = '.$memID.' AND m1.sender = m.sender
                                                                                                    GROUP BY m.sender )
                GROUP BY m.sender 
                ORDER BY m.date_time DESC
                LIMIT 3');

            foreach($query->result() as &$res){

                $res->date_time = $this->time_elapsed_string($res->date_time);
                $res->first_name = $res->first_name." ".$res->last_name;   
            }


            return $query->result() ;
        }
    
        
        /*
        * getMostNotification
        *
        * Get upmost recent notifications
        *
        * @param $memID(integer) id of the member
        * @return String Array Object of upmost recent notifications
        */
        function getMostNotification($memID){
            $query = $this->db->query('
                SELECT c.date, c.note, n.date_time, p.project_name
                FROM notifications n, calendarnotes c, projects p 
                WHERE c.noteID=n.refference AND n.project_id = p.project_id AND n.type = 1  AND n.target_member = '.$memID.' '
                    . 'ORDER BY n.date_time DESC '
                    . 'LIMIT 3');

            foreach($query->result() as &$res){

                $res->date_time = $this->time_elapsed_string($res->date_time);
                $res->note = "Team Leader of ".$res->project_name."<br/> has added  a calendar note <br/>on ".$res->date." for you" ;

            }


            return $query->result() ;
        }
    
        
        /*
        * time_elapsed_string
        *
        * Set elapsed time compared to now, to a string
        *
        * @param $datetime(date) date and time
        * @return $string(string) time in elapsed format
        */
        function time_elapsed_string($datetime, $full = false) {
        //get how many hours ago
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

