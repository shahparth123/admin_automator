<?php

Class Login_Database extends CI_Model {

// Insert registration data in database
	public function registration_insert($data) {

// Query to check whether username already exist or not
		$condition = "username =" . "'" . $data['username'] . "'";
		$this->db->select('*');
		$this->db->from('auto_user'); //TABLE NAME
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {

// Query to insert data in database
			$this->db->insert('auto_user', $data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}
		} else {
			return false;
		}
	}

// Read data using username and password
	public function login($data) {
//print_r($data);
		//$condition = "username =" . "'" . $data['username'] . "' AND " . "password =" . "'" . $data['password'] . "' and status = 1";
		$this->db->select('*');
		$this->db->from('auto_user');
		$this->db->where('username', $data['username']);
		$this->db->where('password', $data['password']);
		$this->db->where('status', 1); 
		$this->db->limit(1);
		$query = $this->db->get();
		
		if ($query->num_rows() == 1) {
			
			return true;
		} else {
			return false;
		}
		
	}

// Read data from database to show data in admin page
	public function read_user_information($sess_array) {

		$condition = "username =" . "'" . $sess_array['username'] . "'";
		$this->db->select('*');
		$this->db->from('auto_user');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}
	
	public function is_logged_in()
	{
		$user = $this->session->userdata('logged_in');
		if(!empty($user)){
			return isset($user);
		}
		return false;
	}

	public function sendemail($email,$subject, $message) {
		

		$this->email->from('admin', 'Admin');
		$this->email->to($email); 

//		$this->email->cc('another@another-example.com'); 
//		$this->email->bcc('them@their-example.com'); 

		$this->email->subject($subject);
		$this->email->message($message);	
//echo $subject;
//echo $message;
		$this->email->send() or die("error");
		//echo $this->email->print_debugger();
	}

	public function checkemailid($email,$emailcode) {
		$this->db->select('email');
		$this->db->from('auto_user');
		$this->db->where('email', $email);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			
			$data = array(
				'emailcode' => $emailcode,
				);

			$this->db->where('email', $email);
			$this->db->update('auto_user', $data); 
			return true;
		} else {
			return false;
		}
		

	}

	public function changepassword($email,$emailcode,$password) {
		$this->db->select('*');
		$this->db->from('auto_user');
		$this->db->where('email', $email);
		$this->db->where('emailcode', $emailcode);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			$data = array(
				'password' => $password,
				);

			$this->db->where('email', $email);
			$this->db->update('auto_user', $data); 
			return true;
		}

	}

	public function editpassword($id,$newpassword) {
		$this->db->select('*');
		$this->db->from('auto_user');
		$this->db->where('id', $id);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			$data = array(
				'password' => $newpassword,
				);

			$this->db->where('id', $id);
			$this->db->update('auto_user', $data); 
			return true;
		}
	}

	public function editprofile(){
		$user_data = $this->session->all_userdata();
		$id = $user_data['logged_in']['id'];
		$this->db->select('id,name,username,email');
		$this->db->from('auto_user');
		$this->db->where('id', $id);
		$result = $this->db->get()->result_array();

		return $result;
		//$query = $this->db->query('SELECT name, username ,email FROM auto_user');
		//$result = $query->result();
		//return $result;
		
	}	
	public function updateprofile($data,$id){
		
		$this->db->where('id',$id );
		$this->db->update('auto_user', $data);
		return true; 

	}	
	public function user_list(){
		$this->db->select('*');
		$this->db->from('auto_user');
		$this->db->where('is_delete', 0);
		$result = $this->db->get()->result_array();
		return $result;
		
		
	}	

	public function api_list(){
		$this->db->select('*');
		$this->db->from('query_param');
		$this->db->where('is_delete', 0);
		$result = $this->db->get()->result_array();
		return $result;
		
		
	}	
	public function admin_protect(){
		$role=$this->session->userdata('logged_in');
		if($role['permission']!=2)
		{
			redirect(base_url() . 'dashboard/index');
		}
	}

	public function edituser($id){
		$this->db->select('*');
		$this->db->from('auto_user');
		$this->db->where('id', $id);
		$result = $this->db->get()->result_array();
		return $result;
		//$query = $this->db->query('SELECT name, username ,email FROM auto_user');
		//$result = $query->result();
		//return $result;
		
	}

	public function updateuser($data,$id){
		$this->db->where('id',$id );
		return $this->db->update('auto_user', $data);
	

	}		
}

?>