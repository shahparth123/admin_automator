<?php

Class Ticket_model extends CI_Model {

    public function new_ticket($userid,$message) {
        $this->db->set('user_id',$userid);
        $this->db->set('message',$message);
        $this->db->set('is_active',1);
        $this->db->insert('tickets'); //TABLE NAME
        $id=$this->db->insert_id();                 
        return $id;
    }

    public function view_ticket($userid,$ticketid) {
        //SELECT * FROM `comments` inner join tickets on comments.ticket_id=tickets.id left join auto_user on auto_user.id=comments.user_id where tickets.user_id=1 order by comments.created_at and tickets.id=1
        $this->db->select('*');
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

    public function list_ticket($userid) {
        //SELECT * FROM `tickets` inner join auto_user on auto_user.id=tickets.user_id where tickets.user_id=1 order by tickets.created_at
        $this->db->select('*');
        $this->db->from('tickets');
        $this->db->join('auto_user','auto_user.id=tickets.user_id','LEFT');
        $this->db->where('tickets.user_id =',$userid);
        $this->db->order_by('created_at','ASC');
        $query=$this->db->get()->result_array();
        return $query;
    }


}

?>