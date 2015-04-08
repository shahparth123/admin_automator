<?php //if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Service_generator extends CI_Controller {
	public function __construct(){
		parent::__construct();



// Load session library
		$this->load->library('session');

// Load database
		$this->load->model('login_database');
	}

	public function index()
	{
		if ($this->login_database->is_logged_in()) {
			$this->login_database->admin_protect();
			$role=$this->session->userdata('logged_in');
			$data['title']="Generator";
			$data['permission']=$role['permission'];
			$data['main_content']="service_generator/index";
			$this->load->view('template/template',$data);
		}else{
			redirect(base_url() . 'user/login');
		}
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */