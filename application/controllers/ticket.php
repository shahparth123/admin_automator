<?php

//if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ticket extends CI_Controller {

    public function __construct() {
        parent::__construct();

// Load database
        $this->load->model('login_database');

// Load session library
        $this->load->library('session');

// Load database
        $this->load->model('ticket_model');
// Load md5	        
        $this->load->helper('security');
    }

    public function newticket() {
        if ($this->login_database->is_logged_in()) {
            $role = $this->session->userdata('logged_in');
            $data['users']=$this->login_database->getalluser();
           

            if ($this->input->post()) {
               
                if(!empty($this->input->post('uid'))){
                    $uid=$this->input->post('uid');
                    $userid=$uid;
                }else{
                     $userid = $role['id'];
                }
                //echo $userid;exit;
                $message = $this->input->post('message');
                $subject = $this->input->post('subject');
               
                $ticket_id = $this->ticket_model->new_ticket($userid, $subject, $message);
                redirect(base_url() . "ticket/viewticket/" . $ticket_id);
            }
            $data['title'] = "New Ticket";
            $data['permission'] = $role['permission'];
            $data['main_content'] = "ticket/newticket";
            $this->load->view('template/template', $data);
        } else {
            redirect(base_url() . 'user/login');
        }
    }

    public function listticket() {
        if ($this->login_database->is_logged_in()) {
            $role = $this->session->userdata('logged_in');
            $userid = $role['id'];
            $data['title'] = "List Ticket";
            $data['permission'] = $role['permission'];
            $data['content'] = $this->ticket_model->list_ticket($userid, $role['permission']);
            if (count($data['content']) == 0) {
               // redirect(base_url());
               // exit;
            }

            $data['main_content'] = "ticket/listticket";
            $this->load->view('template/template', $data);
        } else {
            redirect(base_url() . 'user/login');
        }
    }

    public function viewticket($ticketid = null) {
        if ($this->login_database->is_logged_in()) {
            $role = $this->session->userdata('logged_in');
            $userid = $role['id'];

            if ($this->input->post()) {
                $ticket_id = $this->input->post('ticket_id');
                $message = $this->input->post('message');
                $status = $this->input->post('status');
                //print_r($role);
                $ticket_id = $this->ticket_model->reply_ticket($userid, $ticket_id, $message, $status);
                redirect(base_url() . "ticket/viewticket/" . $ticket_id);
            }

            $data['title'] = "View Ticket";
            $data['content'] = $this->ticket_model->view_ticket($userid, $ticketid, $role['permission']);
            $ticket_detail = $this->ticket_model->check_ticket($ticketid, $userid, $role['permission']);
            $data['isreply'] = 1;

            if (count($data['content']) == 0) {
                if (count($ticket_detail) == 1) {
                    //print_r($ticket_detail);
                    $content[0]['ticket_id'] = $ticket_detail[0]['id'];
                    $content[0]['subject'] = $ticket_detail[0]['subject'];
                    $content[0]['message'] = $ticket_detail[0]['message'];
                    $content[0]['message'] = $ticket_detail[0]['message'];
                    $content[0]['created_at'] = $ticket_detail[0]['created_at'];
                    $content[0]['is_active'] = $ticket_detail[0]['is_active'];
                    $data['content'] = $content;
                    $data['isreply'] = 0;
                } else {
                    redirect(base_url());
                    exit;
                }
            }
            $data['permission'] = $role['permission'];
            $data['main_content'] = "ticket/viewticket";
            $this->load->view('template/template', $data);
        } else {
            redirect(base_url() . 'user/login');
        }
    }

}
