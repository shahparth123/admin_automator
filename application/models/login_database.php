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

		$condition = "username =" . "'" . $data['username'] . "' AND " . "password =" . "'" . $data['password'] . "'";
		$this->db->select('*');
		$this->db->from('auto_user');
		$this->db->where($condition);
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
		
	}else{
		$this->load->view('user/registration_form');
	}
    }

}

?>