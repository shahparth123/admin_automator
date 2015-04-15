<?php

//if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ticket extends CI_Controller {

    public function __construct() {
        parent::__construct();



// Load session library
        $this->load->library('session');

// Load database
        $this->load->model('ticket_model');
// Load md5	        
        $this->load->helper('security');
    }

    public function newticket() {
        $role = $this->session->userdata('logged_in');
        
        if($this->input->post())
        {
            $message = $this->input->post('message');
            //print_r($role);
            $userid= $role['id'];
            $ticket_id=$this->ticket_model->new_ticket($userid,$message);
            redirect(base_url()."ticket/viewticket/".$ticket_id);
        }
        $data['title'] = "New Ticket";
        $data['permission'] = $role['permission'];
        $data['main_content'] = "ticket/newticket";
        $this->load->view('template/template', $data);            
    }

    public function listticket() {
       
        $role = $this->session->userdata('logged_in');
        $data['title'] = "List Ticket";
        $data['permission'] = $role['permission'];
        $data['main_content'] = "ticket/listticket";
        $this->load->view('template/template', $data);
    }

    public function viewticket($ticketid) {
       
        $role = $this->session->userdata('logged_in');
        $userid=$role['id'];
        $data['title'] = "View Ticket";
        $data['content']=$this->ticket_model->view_ticket($userid,$ticketid);
        $data['permission'] = $role['permission'];
        $data['main_content'] = "ticket/viewticket";
        $this->load->view('template/template', $data);
    }
}