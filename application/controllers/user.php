<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct() {
		parent::__construct();

		$this->load->library(array('session', 'form_validation'));
		$this->load->helper(array('form', 'url', 'date'));

		//$this->load->config('app', TRUE);
		//$this->data['app'] = $this->config->item('app');
	}

	function Form() {
		parent::Controller();
	}

	function index() {
		
		$this->load->view('user/register');
		
	}

	function register() {
		
		 $data = array(
            'name' => $this->input->post('name'),
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password')
        );

        //insert the form data into database
        $this->db->insert('admin_user', $data);

        //display success message
        $this->session->set_flashdata('msg','Details added to Database!!!');
        
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */