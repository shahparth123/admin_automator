<?php

Class Ticket_model extends CI_Model {

    public function new_ticket($userid,$subject,$message) {
        $this->db->set('user_id',$userid);
        $this->db->set('subject',$subject);
        $this->db->set('message',$message);
        $this->db->set('is_active',1);
        $this->db->insert('tickets'); //TABLE NAME
        $id=$this->db->insert_id();                 
        return $id;
    }
    public function check_ticket($ticketid) {
        $this->db->select('*');
        $this->db->from('tickets');
        $this->db->where('id =',$ticketid);
        $query=$this->db->get()->result_array();
        return $query;

    }
    
    public function view_ticket($userid,$ticketid) {
        //SELECT * FROM `comments` inner join tickets on comments.ticket_id=tickets.id left join auto_user on auto_user.id=comments.user_id where tickets.user_id=1 order by comments.created_at and tickets.id=1
        $this->db->select('*,comments.created_at as comment_created');
        $this->db->from('comments');
        $this->db->join('tickets','comments.ticket_id=tickets.id','LEFT');
        $this->db->join('auto_user','auto_user.id=comments.user_id','LEFT');
        $this->db->where('tickets.user_id =',$userid);
        $this->db->where('tickets.id =',$ticketid);
        $this->db->order_by('comments.created_at','ASC');
        $query=$this->db->get()->result_array();
        $this->db->set('read_status',1);
        $this->db->where('comments.user_id =',$userid);
        $this->db->where('ticket_id =',$ticketid);
        $this->db->update('comments');
        return $query;
    }

    public function list_ticket($userid,$permission) {
        //SELECT * FROM `tickets` inner join auto_user on auto_user.id=tickets.user_id where tickets.user_id=1 order by tickets.created_at
        $this->db->select('*,tickets.id as ticketid');
        $this->db->from('tickets');
        $this->db->join('auto_user','auto_user.id=tickets.user_id','LEFT');
        if($permission!=2)
        {
            $this->db->where('tickets.user_id =',$userid);
        }        
        $this->db->order_by('created_at','ASC');
        $query=$this->db->get()->result_array();
        return $query;
    }


}

?>