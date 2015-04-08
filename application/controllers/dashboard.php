<?php //if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.}php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		if ($this->login_database->is_logged_in()) {
			$role=$this->session->userdata('logged_in');
			$this->db->select('id');
			$this->db->from('auto_user');
			$num_results = $this->db->count_all_results();

			$this->db->select('id');
			$this->db->from('query_param');
			$num_results_api = $this->db->count_all_results();
			$data = array('num_results_api' => $num_results_api,'num_results' => $num_results);

			$data['title']="Dashboard";
			$data['permission']=$role['permission'];
			$data['main_content']="dashboard/index";
			$this->load->view('template/template',$data);
		}else{
			redirect(base_url() . 'user/login');
		}
	}
}

