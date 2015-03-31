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
    
	public function sendemail($email, $emailcode, $subject, $message) {
		$this->load->library('email');

		$this->email->from('admin@lanet.com', 'Admin');
		$this->email->to($email); 

//		$this->email->cc('another@another-example.com'); 
//		$this->email->bcc('them@their-example.com'); 

		$this->email->subject($subject);
		$this->email->message($message);	

		$this->email->send();
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
   
    

}

?>