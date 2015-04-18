<?php

//if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();

// Load form helper library
        $this->load->helper('form');

// Load form validation library
        $this->load->library('form_validation');

// Load session library
        $this->load->library('session');

// Load database
        $this->load->model('login_database');
    }

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.}php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {
        if ($this->login_database->is_logged_in()) {
            $role = $this->session->userdata('logged_in');
            $this->db->select('id');
            $this->db->from('auto_user');
            $this->db->where('is_delete', 0);
            $num_results = $this->db->count_all_results();

            $this->db->select('id');
            $this->db->from('query_param');
            $this->db->where('is_delete', 0);
            $num_results_api = $this->db->count_all_results();

            $this->db->select('admin_read_status');
            $this->db->from('tickets');
            $this->db->where('admin_read_status', 0);
            $num_results_message = $this->db->count_all_results();

            $user_data = $this->session->all_userdata();
            $id = $user_data['logged_in']['id'];
            $this->db->select('read_status');
            $this->db->from('tickets');
            $this->db->where('user_id', $id);
            $this->db->where('read_status', 0);
            $num_results_user_message = $this->db->count_all_results();

            $this->db->select('*');
            $this->db->from('log');
            $this->db->where('user_id', $id);
            $this->db->order_by('id', 'DESC');
            $this->db->limit('5');

            $login = $this->db->get();
            $query = $login->result_array();


            $this->db->select('admin_read_status');
            $this->db->from('comments');
            $this->db->where('admin_read_status', 0);
            $results_comment_admin = $this->db->count_all_results();
            if ($role['permission'] != 2) {
                $results_comment_user = $this->db->query('SELECT count(read_status) FROM `comments` where read_status=0 and ticket_id in (select id from tickets where user_id=2)')->result_array();
            } else {

                $results_comment_user = $this->db->query('SELECT count(admin_read_status) FROM `comments` where admin_read_status=0 and ticket_id in (select id from tickets)')->result_array();
            }
            $data = array('num_results_api' => $num_results_api, 'num_results' => $num_results, 'num_results_message' => $num_results_message, 'num_results_user_message' => $num_results_user_message, 'results_comment_admin' => $results_comment_admin, 'results_comment_user' => $results_comment_user[0], 'query' => $query);

            $data['title'] = "Dashboard";
            $data['permission'] = $role['permission'];
            $data['main_content'] = "dashboard/index";
            $this->load->view('template/template', $data);
        } else {
            redirect(base_url() . 'user/login');
        }
    }

}
