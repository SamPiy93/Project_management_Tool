<?php

class message_model extends CI_Model{
    
    /*
     * getUnreadMessages
     *
     * Get all unread messages
     *
     * @param $memID(integer) id of the member
     * @return String Array Object of all unread messages
     */
    function getUnreadMessages($memID){
        $query = $this->db->query('
            SELECT m.message, m.date_time, m.sender, u.first_name, u.last_name
            FROM messages m, msg_recivers r, pusers u
            WHERE m.sender=u.id AND r.msg_id = m.msg_id AND  r.status = 0 
            AND m.date_time =(SELECT MAX(m1.date_time) FROM messages m1 WHERE m1.sender = m.sender GROUP BY m1.sender) 
            AND r.user_id = '.$memID.'
            GROUP BY m.sender
            ORDER BY m.date_time DESC');
        
        foreach($query->result() as &$res){
           
            $res->date_time = $this->time_elapsed_string($res->date_time);
            $res->first_name = $res->first_name." ".$res->last_name;
                
        }
       
       
        return $query->result() ;
    }
    
        /*
        * getAllMessages
        *
        * Get all unread messages
        *
        * @param $memID(integer) id of the member
        * @return String Array Object of all  messages
        */
        function getAllMessages($memID){
        $query = $this->db->query('
            SELECT m.message, m.date_time, u.first_name, u.last_name, u.id, r.status
            FROM messages m, msg_recivers r, pusers u
            WHERE m.msg_id = r.msg_id AND m.sender = u.id AND r.user_id = '.$memID.' AND m.date_time = (SELECT MAX(date_time)
                                                                                                FROM messages m1, msg_recivers r1
                                                                                                WHERE m1.msg_id = r1.msg_id AND r1.user_id = '.$memID.' AND m1.sender = m.sender
                                                                                                GROUP BY m.sender )
            GROUP BY m.sender 
            ORDER BY m.date_time DESC');
        foreach($query->result() as &$res){
           
            $res->date_time = $this->time_elapsed_string($res->date_time);
            $res->first_name = $res->first_name." ".$res->last_name;   
        }
       
       
        return $query->result() ;
    }
    
    /*
     * countMessages
     *
     * Count unread messages
     *
     * @param $memID(integer) id of the member
     * @return $count(integer) number of messages for the user
     */
    function countMessages($memID){
        //count all messages
        $count = 0;
        $query = $this->db->query('
            SELECT u.id
            FROM messages m, msg_recivers r, pusers u 
            WHERE m.sender=u.id AND r.msg_id = m.msg_id AND r.status = 0 
            AND m.date_time =(SELECT MAX(m1.date_time) FROM messages m1 WHERE m1.sender = m.sender GROUP BY m1.sender) 
            AND r.user_id = '.$memID.'
            GROUP BY m.sender');
        
        foreach($query->result() as &$res){
               $count++; 
        }
        
        return $count;
    }
    
    /*
     * seenMessages
     *
     * Set status of messages to seen
     *
     * @param $memID(integer) id of the member
     * @param $targetMem(integer) id of the target member
     * @return $status(boolean)
     */
    function seenMessages($memID,$targetMem){
        $query = $this->db->query("SELECT msg_id 
                                    FROM messages
                                    WHERE sender =".$memID );
        foreach($query->result() as &$res){
               $this->db->where('user_id',$targetMem)->where('status',0)->where('msg_id',$res->msg_id)->update('msg_recivers',array(
                        'status' => 1
                        )) ;
        }
        
        
    }
    
    /*
     * retrieveMessages
     *
     * Retireve all messaages
     *
     * @param $memID(integer) id of the member
     * @param $targetMemID(integer) id of the target member
     * @return String Array Object of all messages and senders
     */
    function retrieveMessages($memID, $tarMemID){
        $query = $this->db->query('SELECT m.message, m.date_time, m.sender
            FROM messages m, msg_recivers r 
            WHERE (m.msg_id = r.msg_id AND m.sender='.$memID.' AND r.user_id = '.$tarMemID.') OR (m.msg_id = r.msg_id AND m.sender='.$tarMemID.' AND r.user_id = '.$memID.')
            ORDER BY m.date_time ');
        foreach($query->result() as &$res){
           
            $res->date_time = $this->time_elapsed_string($res->date_time);
                
        }
        return $query->result() ;
    }
    
    /*
     * lastMsgSender
     *
     * get the id of last message sender
     *
     * @param $memID(integer) id of the member
     * @return String Array Object of sender details
     */
    function lastMsgSender($memID){
        $query = $this->db->query(" SELECT m.sender
                    FROM messages m, msg_recivers r
                    WHERE m.msg_id = r.msg_id AND r.user_id = ".$memID."
                    ORDER BY m.date_time DESC 
                    LIMIT 1;");
        
        return $query->result();
        
    }
      
    /*
     * sendMessage
     *
     * get the id of last message sender
     *
     * @param $from(integer) id of the member
     * @param $to(integer) id of the reciever to be
     * @return $status(boolean)
     */
    function sendMessage($from, $to, $message){
        //send messages
        $this->db->insert('messages', array(
                    'sender' => $from ,
                    'message' => $message
                    ));
        $message_id = $this->db->insert_id();
        
        $this->db->insert('msg_recivers', array(
                    'msg_id' => $message_id ,
                    'user_id' => $to,
                    'status' => 0
                    ));
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
