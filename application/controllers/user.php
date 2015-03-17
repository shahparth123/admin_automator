<?php

session_start(); //we need to start session in order to access it through CI

Class User extends CI_Controller {

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

// Show login page
	public function login() {
		$this->load->view('user/login_form');
	}

// Show registration page
	public function registration() {
		$this->load->view('user/registration_form');
	}

// Validate and store registration data in database
	public function new_user_registration() {

// Check validation for user input in SignUp form
		$this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
		if ($this->form_validation->run() == FALSE) {
			//$this->load->view('user/registration_form');
		} else {
			$data = array(
			    'name' => $this->input->post('name'),
			    'username' => $this->input->post('username'),
			    'email' => $this->input->post('email_value'),
			    'password' => $this->input->post('password')
			);
			$result = $this->login_database->registration_insert($data);
			if ($result == TRUE) {
				$data['message_display'] = 'Registration Successfully !';
				//$this->load->view('login_form', $data);
				echo json_encode(array("success" => "true"));
			} else {
				$data['message_display'] = 'Username already exist!';
				//$this->load->view('user/registration_form', $data);
			}
		}
	}

// Check for user login process
	public function user_login_process() {


		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('user/login_form');
		} else {
			$data = array(
			    'username' => $this->input->post('username'),
			    'password' => $this->input->post('password')
			);
			$result = $this->login_database->login($data);
			if ($result == TRUE) {
				$sess_array = array(
				    'username' => $this->input->post('username')
				);

// Add user data in session
				$this->session->set_userdata('logged_in', $sess_array);
				$result = $this->login_database->read_user_information($sess_array);
				if ($result != false) {
					$data = array(
					    'id'=> $result[0]->id,
					    'name' => $result[0]->name,
					    'username' => $result[0]->username,
					    'email' => $result[0]->email,
					);
					//	$this->load->view('user/admin_page', $data);
				}$this->session->set_userdata('logged_in', $data);
				$op['login_status'] = "success";
				$op['redirect_url'] = base_url() . 'dashboard';
				echo json_encode($op);
				
			} else {
				$op['login_status'] = "invalid";
				echo json_encode($op);

			}
		}
	}

// Logout from admin page
	public function logout() {

// Removing session data
		$sess_array = array(
		    'id'=>'',
		    'name'=>'',
		    'email'=>'',
		    'username' => ''
		);
		$this->session->unset_userdata('logged_in', $sess_array);
		$data['message_display'] = 'Successfully Logout';
		redirect('user/login');
	}

}

?>