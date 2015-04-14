<?php

//if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api_list extends CI_Controller {

    public function __construct() {
        parent::__construct();



// Load session library
        $this->load->library('session');

// Load database
        $this->load->model('login_database');
    }

    public function index() {
        if ($this->login_database->is_logged_in()) {

            $role = $this->session->userdata('logged_in');
            $data['api_list'] = $this->login_database->api_list();
            $data['title'] = "API List";
            $data['permission'] = $role['permission'];
            $data['main_content'] = "api_list/index";
            $this->load->view('template/template', $data);
        } else {
            redirect(base_url() . 'user/login');
        }
    }

    public function delete() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $data = array(
                'is_delete' => 1,
            );
            $this->db->where('id', $id);
            $this->db->update('query_param', $data);
            $this->session->set_flashdata('msg', 'You have Successfully Deleted API.');
            redirect('api_list/index');
        }
    }

}
