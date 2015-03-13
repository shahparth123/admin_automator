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
		
	}

	function register() {
		$this->load->view('user/register');
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */