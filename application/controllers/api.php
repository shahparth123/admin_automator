<?php //if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends CI_Controller {

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
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct() {
		parent::__construct();

		$this->load->model('api_model');
	}
	
	public function generate()
	{
		echo "<pre>";
		print_r($_POST);
		echo "</pre>";

	}

	public function index()
	{
		echo "<pre>";
		print_r($_POST);
		echo "</pre>";
		$opertation=$_POST['opertation'];
		if($opertation=="SELECT")
		{
			echo "select";
			foreach($_POST as $key => $values)
			{
				if($key=="fields")
				{
					foreach($values as $value)
					{
						echo $value.",";
					}
				}
				else if($key=="f1")
				{
					$i=0;
					foreach($values as $value)
					{
						$opcode=$_POST['opcode'][$i];
						$f1=$_POST['f1'][$i];
						$f2=$_POST['f2'][$i];
						$op=$_POST['op'][$i];
						if($opcode=="where")
						{
							echo "where('".$f1." ".$op."',".$f2.")";
						}
						else if($opcode=="or_where")
						{
							echo "or_where('".$f1." ".$op."',".$f2.")";
						}
						else if($opcode=="having")
						{
							echo "having('".$f1." ".$op."',".$f2.")";
						}
						$i++;
					}
				}

			}


		}
		else if($operation=="update")
		{
			echo "update";
		}
		else if($operation=="insert")
		{
			echo "insert";
		}
		else if($operation=="delete")
		{
			echo "delete";
		}
		else if($operation=="custom")
		{
			echo "custom";
		}


		//$this->load->view('includes/header');
		/*$data['title']="Dashboard";
		$data['permission']="Dashboard";
		$data['main_content']="dashboard/index";
		$this->load->view('template/template',$data);
		*/
		//$this->load->view('includes/footer');
	}
	public function insert()
	{
		//$this->load->view('includes/header');
		$data['title']="Dashboard";
		$data['permission']="Dashboard";
		$data['main_content']="dashboard/index";
		$this->load->view('template/template',$data);
		//$this->load->view('includes/footer');
	}

	public function select()
	{
		//$this->load->view('includes/header');
		$array = $this->uri->uri_to_assoc(3);
		$data['output']=$this->api_model->select($array);
		$this->load->view('template/json',$data);
		//http://localhost/admin_automator/api/insert/field0/username/field1/id/table0/auto_user/condition0/1
		//print_r($array);

		/*
		$data['title']="Dashboard";
		$data['permission']="Dashboard";
		$data['main_content']="dashboard/index";
		$this->load->view('template/template',$data);
		*/
		//$this->load->view('includes/footer');
	}

	public function update()
	{
		//$this->load->view('includes/header');
		$array = $this->uri->uri_to_assoc(3);
		$table = $array['table'];
		$id = $array['id'];
		unset($array['table']);
		unset($array['id']);

		//print_r($array);
		$result=$this->api_model->updatedata($table,$id,$array);
		if($result==0)
		{
			$status['status']=0;
		}
		else{
			$status['status']=1;
		}
		$data['output']=$status;
		$this->load->view('template/json',$data);
		//$this->load->view('includes/footer');
	}

	public function delete($table,$id)
	{
		//$this->load->view('includes/header');
		$result=$this->api_model->deleterecord($table,$id);
		if($result==0)
		{
			$status['status']=0;
		}
		else{
			$status['status']=1;
		}
		$data['output']=$status;
		$this->load->view('template/json',$data);
		//$this->load->view('includes/footer');
	}
	public function tables()
	{
		//$this->load->view('includes/header');
		$data['output']=$this->api_model->gettables();
		$this->load->view('template/json',$data);
		//$this->load->view('includes/footer');
	}
	public function column_table($table)
	{
		//$this->load->view('includes/header');
		$data['output']=$this->api_model->getcolumns($table);
		$this->load->view('template/json',$data);
		//$this->load->view('includes/footer');
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */