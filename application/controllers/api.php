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
		$a=json_encode($_POST);
		print_r($a);
		$string = "/\?\?[0-9]+\?\?/";
		if (preg_match_all($string, $a, $matches)) {
			$parameter_count = count(array_unique($matches[0]));
		}else {
			$parameter_count = 0;
		}
		echo $this->api_model->generate($a,$parameter_count);

	}

	public function index($id)
	{
		/*echo "<pre>";
		echo $a=json_encode($_POST);
		//echo serialize($_POST);
		echo "</pre>";
		*/
				$d=$this->api_model->retrive($id);
				$c=$d[0]['perameter_count'];
				$a=$d[0]['fields'];
		for($count=1;$count<=$c;$count++)
		{
		$string = "/\?\?".$count."\?\?/";
		$a= preg_replace($string,"hello".$count,$a);
			
		}
		
		$input=json_decode($a,true);
		//print_r($input);
		$opertation=$input['opertation'];
		if($opertation=="SELECT")
		{
		//	echo "select ";
			 $this->db->trans_start();
			foreach($input as $key => $values)
			{
				if($key=="fields")
				{
					foreach($values as $value)
					{
		//				echo $value.",";
						$this->db->select($value);
					}
				}
				else if($key=="pri_tab")
				{
					$this->db->from($values);
					
		//			echo "from(".$values.")";
				}
				else if($key=="f1")
				{
					$i=0;
					foreach($values as $value)
					{
						$opcode=$input['opcode'][$i];
						$f1=$input['f1'][$i];
						$f2=$input['f2'][$i];
						$op=$input['op'][$i];
						
						if($opcode=="where")
						{

							if($opcode=="like")
							{
		//						echo "like(".$f1." ".$op."',".$f2.")";
								$this->db->like($f1." ".$op,$f2);
							}
							else{
		//						echo "where('".$f1." ".$op."',".$f2.")";
								$this->db->where($f1." ".$op,$f2);
							}
						}
						else if($opcode=="or_where")
						{
							if($opcode=="like")
							{
		//						echo "or_like(".$f1." ".$op."',".$f2.")";
								$this->db->or_like($f1." ".$op,$f2);
							}
							else{
		//						echo "or_where('".$f1." ".$op."',".$f2.")";
								$this->db->or_where($f1." ".$op,$f2);
							}


						}
						else if($opcode=="having")
						{
		//					echo "having('".$f1." ".$op."',".$f2.")";
						}
						$i++;
					}
				}
				else if($key=="jtype")
				{
					$j=0;
					foreach($values as $value)
					{
						$jtype=$input['jtype'][$j];
						$jtable=$input['jtable'][$j];
						$jf1=$input['jf1'][$j];
						$jf2=$input['jf2'][$j];
						$jop=$input['jop'][$j];
		//				echo "join(".$jtable.",".$jf1." ".$jop." ".$jf2.",".$jtype.")";
					}
				}

			}
			$ans=$this->db->get()->result_array();
			$this->db->trans_complete();
			$data['output']=$ans;
			$this->load->view('template/json',$data);
		//	print_r($ans);
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
		else if($opertation=="CUSTOM")
		{
			$customquery=$_POST['customquery'];
			echo $customquery;
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