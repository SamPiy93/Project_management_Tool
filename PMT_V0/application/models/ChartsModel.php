<?php

class ChartsModel extends CI_Model{
    public function countCalNotes($projectID){
        $this->db->select('noteID');
        $this->db->where('project_id',$projectID);
        $count = $this->db->count_all_results('calendarnotes');
        return $count;
    }
    public function countSucCalNotes($projectID){
        $this->db->select('noteID');
        $this->db->where('project_id',$projectID)->where('status',1);
        $count = $this->db->count_all_results('calendarnotes');
        return $count;
    }
    

    
    public function getNoteStatus($proID){
        $query = $this->db->query('
            SELECT c.date, c.note, m.first_name, m.last_name, t.status
            FROM calendarnotes c, target_members t, pusers m, project_members p
            WHERE c.noteID=t.note_id AND t.member_id = m.id AND  p.member_id = m.id AND p.project_id = '.$proID.'
            ORDER BY c.date');
        
        foreach($query->result() as &$res){
           
            $res->first_name = $res->first_name." ".$res->last_name;
                
        }
        
        return $query->result();
        
    }
}
