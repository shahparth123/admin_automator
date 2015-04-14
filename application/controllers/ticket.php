<?php

//if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ticket extends CI_Controller {

    public function __construct() {
        parent::__construct();



// Load session library
        $this->load->library('session');

// Load database
        $this->load->model('login_database');
// Load md5	        
        $this->load->helper('security');
    }

    public function newticket() {
       
        $role = $this->session->userdata('logged_in');
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

    public function viewticket() {
       
        $role = $this->session->userdata('logged_in');
        $data['title'] = "View Ticket";
        $data['permission'] = $role['permission'];
        $data['main_content'] = "ticket/viewticket";
        $this->load->view('template/template', $data);
    }
}