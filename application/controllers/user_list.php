<?php

//if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_list extends CI_Controller {

    public function __construct() {
        parent::__construct();



// Load session library
        $this->load->library('session');

// Load database
        $this->load->model('login_database');
// Load md5	        
        $this->load->helper('security');
    }

    public function index() {
        if ($this->login_database->is_logged_in()) {
            $this->login_database->admin_protect();
            $role = $this->session->userdata('logged_in');
            $data['user_detail'] = $this->login_database->user_list();
            $data['title'] = "Users";
            $data['permission'] = $role['permission'];
            $data['main_content'] = "user_list/index";
            $this->load->view('template/template', $data);
        } else {
            redirect(base_url() . 'user/login');
        }
    }

    public function delete() {
        $this->login_database->admin_protect();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $data = array(
                'is_delete' => 1,
            );
            $this->db->where('id', $id);
            $this->db->update('auto_user', $data);
            redirect('user_list/index');
        }
    }

    public function edit() {
        $this->login_database->admin_protect();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }

        $data['user_detail'] = $this->login_database->edituser($id);
        $role = $this->session->userdata('logged_in');
        $data['title'] = "Edit User Profile";
        $data['permission'] = $role['permission'];
        $data['main_content'] = "user_list/edit";
        $this->load->view('template/template', $data);
    }

    public function updateuser() {
        $this->login_database->admin_protect();
        //$id = $_GET['id'];	
        $id = $this->input->post('id');
        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'username' => $this->input->post('username'),
            'permission' => $this->input->post('priviledges')
        );
        $success = $this->login_database->updateuser($data, $id);
        
        if ($success == true) {
           $this->session->set_flashdata('msg', 'You have Successfully Updated User.');
            redirect('user_list/index');
        }
    }

    public function adduser() {
        $this->login_database->admin_protect();
        if ($this->input->post()) {
            $name = $this->input->post('name');
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $password = do_hash($this->input->post("password"), 'md5');
            $privileges = $this->input->post('privileges');
            $success = $this->login_database->adduser($name, $username, $email, $password, $privileges);
            if ($success == TRUE) {
                $this->session->set_flashdata('msg', 'You have Successfully Added User.');
                redirect('user_list/adduser');
            }
        }
        $role = $this->session->userdata('logged_in');
        $data['title'] = "Add User";
        $data['permission'] = $role['permission'];
        $data['main_content'] = "user_list/adduser";
        $this->load->view('template/template', $data);
    }

}
