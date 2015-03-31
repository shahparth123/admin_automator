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
		if ($this->login_database->is_logged_in()) {
			redirect(base_url() . 'dashboard');
		} else {
			$this->load->view('user/login_form');
		}
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
			$email_code = uniqid();
			$data = array(
				'name' => $this->input->post('name'),
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password'),
				'emailcode' => $email_code
				);
			$result = $this->login_database->registration_insert($data);
			if ($result == TRUE) {
				$data['message_display'] = 'Registration Successfully !';
				$subject = "Email Verification";
				$message = "Welcome " . $data['username'] . " to Admin Automator. To verify click Here:" . base_url() . "user/verify?code=" . $email_code . "&usnm=" . $data['username'];
				$this->login_database->sendemail($data['username'], $data['email'], $subject, $message);
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
						'id' => $result[0]->id,
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
		$this->session->sess_destroy();
		$data['message_display'] = 'Successfully Logout';
		redirect(base_url() . 'user/login');
	}

	public function verify() {
		$username = $_GET['usnm'];
		$emailcode = $_GET['code'];
		$query = $this->db->query("SELECT username, emailcode FROM auto_user where username='$username' and emailcode='$emailcode'");
		if ($query->num_rows() == 1) {
			$this->db->query("Update auto_user set status = 1 where username='$username' and emailcode='$emailcode'");
			redirect(base_url() . 'user/login');
		}
	}

	public function forgotpassword() {

		if ($this->input->post()) {
			$email = $this->input->post("email");
			$emailcode = uniqid();
			$verified = $this->login_database->checkemailid($email,$emailcode);

			if ($verified == true) {
				$subject = "Forgot Password";
				$message = "Hello You have requested for new password. Please click Here: " . base_url() . "user/newpassword?email=" . $email . "?emailcode=" . $emailcode ;
				$this->login_database->sendemail($email, $emailcode, $subject, $message);
				$submitted_data['email']=$email;
				echo json_encode($submitted_data);
			}

		}
		else{
			$this->load->view('user/forgotpassword');
		}
		
	}

	public function changepassword() {
		if (isset($_GET['email']) && isset($_GET['emailcode']) )
		{	
			$email=$_GET['email'];
			$emailcode=$_GET['emailcode'];
			$password = $this->input->post("password");
			$changedpw = $this->login_database->changepassword($email,$emailcode,$password);
		}
		else
		{
			return FALSE;
		}

		$this->load->view('user/changepassword');
	}

	public function editpassword(){
		if ($this->input->post()) {
			$oldpassword = $this->input->post("oldpassword");
			$newpassword = $this->input->post("newpassword");
			$confirmpassword = $this->input->post("confirmpassword");
			if($newpassword == $confirmpassword){
				$checked = $this->login_database->editpassword($oldpassword,$newpassword);
				if($checked == true){
					$message="Your password is Successfully Changed";
					echo "<script type='text/javascript'>alert('$message');</script>";
				}
				else{
					$message="Your password is not Changed";
					echo "<script type='text/javascript'>alert('$message');</script>";
				}

			}
			else{
				$message="Please Enter Same Password";
				echo "<script type='text/javascript'>alert('$message');</script>";
			}
		}

		
		$data['title']="Edit Password";
		$data['permission']="Dashboard";
		$data['main_content']="user/editpassword";
		$this->load->view('template/template',$data);
		
		
	}
}

?>
