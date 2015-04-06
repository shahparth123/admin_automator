<?php //if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_list extends CI_Controller {
	
	public function __construct() {
		parent::__construct();



// Load session library
		$this->load->library('session');

// Load database
		$this->load->model('login_database');
	}


	
	public function index()
	{
		if ($this->login_database->is_logged_in()) {
			$data['user_detail'] = $this->login_database->user_list();
			$data['title']="Users";
			$data['permission']="Dashboard";
			$data['main_content']="user_list/index";
			$this->load->view('template/template',$data);
		}else{
			redirect(base_url() . 'user/login');
		}
	}

	public function delete()
	{
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
}

