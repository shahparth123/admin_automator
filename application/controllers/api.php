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
		$this->load->model('login_database');
	}
	
	public function generate()
	{

		//echo "<pre>";
		//print_r($_POST);
		//echo "</pre>";
		$a=json_encode($_POST);
		//print_r($a);
		$string = "/\?\?[0-9]+\?\?/";
		if (preg_match_all($string, $a, $matches)) {
			$parameter_count = count(array_unique($matches[0]));
		}else {
			$parameter_count = 0;
		}
		$this->login_database->admin_protect();
		$user_id=$this->session->userdata('logged_in')['id'];
		$auth_key=random_string('alnum', 10);
		$_POST['name']=preg_replace('/[^a-zA-Z0-9]/', '', $_POST['name']);
		$id= $this->api_model->generate($_POST['opertation'],$a,$parameter_count,$user_id,$auth_key,$_POST['comment'],$_POST['name']);

		$data['apiurl'] = base_url()."api/index/".$_POST['opertation']."/".$id."/".$auth_key."/".$_POST['name'];
		$role=$this->session->userdata('logged_in');
		$data['permission']=$role['permission'];

		$data['title']="Service Generated";
		$data['main_content']="service_generator/success";
		$this->load->view('template/template',$data);	
	}


	public function detail($oper,$id,$auth_key,$name)
	{
		$d=$this->api_model->retrive($oper,$id,$auth_key,$name);
		$c=$d[0]['perameter_count'];
		$a=$d[0]['fields'];
		$input=json_decode($a,true);
		
		$opertation=$input['opertation'];
		$join=array();
		$conditions=array();
		$fields=array();
		if($opertation=="SELECT")
		{
//  echo "select ";
			if(isset($input['fields'])==FALSE)
			{

				$select[]="ALL";
			}
			foreach($input as $key => $values)
			{
				if($key=="fields")
				{
					foreach($values as $value)
					{
						$select[]=$value.",";
      //  $this->db->select($value);
					}
				}
				else if($key=="pri_tab")
				{
     // $this->db->from($values);

					$primary_table=$values;
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
								$conditions[]= "like ".$f1." ".$op."',".$f2;
							}
							else{
								$conditions[]= "where ".$f1." ".$op."',".$f2;
							}
						}
						else if($opcode=="or_where")
						{
							if($opcode=="like")
							{
								$conditions[]=  "or like ".$f1." ".$op." ".$f2;
							}
							else{
								$conditions[]=  "or where ".$f1." ".$op." ".$f2;
							}


						}
						else if($opcode=="having")
						{
							$conditions[]=  "having ".$f1." ".$op." ".$f2;
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
						$jopcode=$input['jopcode'][$j];
						$jf1=$input['jf1'][$j];
						$jf2=$input['jf2'][$j];
						$jop=$input['jop'][$j];
						$join[] = $jtype." join ".$jtable." ".$jopcode." ".$jf1." ".$jop." ".$jf2;
						$j++;
					}
				}
				else if($key=="groupby" && $values!="")
				{
					$groupby[]=$values;
				}
				else if($key=="orderby" && $values!="")
				{
					$orderby=$values." ".$input['ascdesc'];
				}

			}
			foreach($select as $field)
			{
				echo $field."<br>";
			}

			foreach($join as $field1)
			{
				echo $field1."<br>";
			}

			foreach($conditions as $field)
			{
				echo $field."<br>";
			}


		}
		else if($opertation=="UPDATE")
		{
			if(isset($input['fields'])==FALSE)
			{

			}
			foreach($input as $key => $values)
			{
				if($key=="fields")
				{
					foreach($values as $value)
					{
						$select[]=$value."=".$input[str_replace(".","_",$value)]."<br>";

					}
				}
				else if($key=="pri_tab")
				{

					$primary_table=$input['pri_tab'];
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
								$conditions[]= "like ".$f1." ".$op." ".$f2;
							}
							else{
								$conditions[]= "where ".$f1." ".$op." ".$f2;
							}
						}
						else if($opcode=="or_where")
						{
							if($opcode=="like")
							{
								$conditions[]=  "or like ".$f1." ".$op." ".$f2;
							}
							else{
								$conditions[]=  "or where ".$f1." ".$op." ".$f2;
							}


						}
						else if($opcode=="having")
						{
							$conditions[]=  "having ".$f1." ".$op." ".$f2;
						}
						$i++;
					}
				}

			}
			foreach($select as $field)
			{
				echo $field."<br>";
			}
			foreach($conditions as $field)
			{
				echo $field."<br>";
			}


		}

		else if($opertation=="INSERT")
		{
			if(isset($input['fields'])==FALSE)
			{

			}
			foreach($input as $key => $values)
			{
				if($key=="fields")
				{
					foreach($values as $value)
					{
						if($input[str_replace(".","_",$value)]=="")
						{
							$input[str_replace(".","_",$value)]="NULL";
						}
						$select[]= $value."=".$input[str_replace(".","_",$value)]."<br/>";
					}
				}
				else if($key=="pri_tab")
				{
					$primary_table=$input['pri_tab'];
				}
			}

			foreach($select as $field)
			{
				echo $field."<br>";
			}

		}
		else if($opertation=="DELETE")
		{
			if(isset($input['fields'])==FALSE)
			{

			}
			foreach($input as $key => $values)
			{
				if($key=="fields")
				{
					foreach($values as $value)
					{
					}
				}
				else if($key=="pri_tab")
				{

					$primary_table= "from ".$values;
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

							if($op=="like")
							{
								$conditions[]= "Where ".$f1." like ".$f2.")" ;
							}
							else
							{
								$conditions[]= "where ".$f1." ".$op." ".$f2;
							}
						}
						else if($opcode=="or_where")
						{
							if($op=="like")
							{
								$conditions[]= "or ".$f1." ".$op." ".$f2;
							}
							else{
								$conditions[]= "or where ".$f1." ".$op." ".$f2;
							}


						}
						else if($opcode=="having")
						{
							$conditions[]= "having ".$f1." ".$op." ".$f2;
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
						$join[]= $jtype." join ".$jtable." ".$jopcode." ".$jf1." ".$jop." ".$jf2;
				        //$this->db->join($jtable,$jf1." ".$jop." ".$jf2,$jtype);
						$j++;
					}
				}

			}
			foreach($join as $field)
			{
				echo $field."<br>";
			}
			foreach($conditions as $field)
			{
				echo $field."<br>";
			}
		}
		else if($opertation=="CUSTOM")
		{
			if($input['custom_query']!="")
			{
				$customquery=$input['custom_query'];
				echo $customquery;  

			} 


		}
	}



public function index($oper,$id,$auth_key,$name)
{
		/*echo "<pre>";
		echo $a=json_encode($_POST);
		//echo serialize($_POST);
		echo "</pre>";
		*/
		$d=$this->api_model->retrive($oper,$id,$auth_key,$name);
		$c=$d[0]['perameter_count'];
		$a=$d[0]['fields'];
 		//echo file_get_contents('php://input');
 		//exit();
		for($count=1;$count<=$c;$count++)
		{
			$string = "/\?\?".$count."\?\?/";
			$a= preg_replace($string,$_POST['p'.$count],$a);
			//echo $a;	
		}
		
		$input=json_decode($a,true);
		//print_r($input);
		$opertation=$input['opertation'];

		if($opertation=="SELECT")
		{
		//	echo "select ";
			$this->db->trans_start();
			if(isset($input['fields'])==FALSE)
			{
				$this->db->select("*");

			}
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

							if($op=="LIKE")
							{
		//						echo "like(".$f1." ".$op."',".$f2.")";
								$this->db->like($f1,$f2);

							}
							else{
		//						echo "where('".$f1." ".$op."',".$f2.")";
								$this->db->where($f1." ".$op,$f2);
							}
						}
						else if($opcode=="or_where")
						{
							if($op=="LIKE")
							{
		//						echo "or_like(".$f1." ".$op."',".$f2.")";
								$this->db->or_like($f1,$f2);
							}
							else{
		//						echo "or_where('".$f1." ".$op."',".$f2.")";
								$this->db->or_where($f1." ".$op,$f2);
							}


						}
						else if($opcode=="having")
						{
		//					echo "having('".$f1." ".$op."',".$f2.")";
							$this->db->having($f1." ".$op,$f2);
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
						$this->db->join($jtable,$jf1." ".$jop." ".$jf2,$jtype);
						$j++;
					}
				}
				else if($key=="groupby" && $values!="")
				{
					$this->db->group_by($values);
				}
				else if($key=="orderby" && $values!="")
				{
					$this->db->order_by($values,$input['ascdesc']);
				}

			}
			$ans=$this->db->get()->result_array();
			$this->db->trans_complete();
			$data['output']=$ans;
			$this->load->view('template/json',$data);
		//	print_r($ans);
		}
		else if($opertation=="UPDATE")
		{
			//echo "update";
			$this->db->trans_start();
			if(isset($input['fields'])==FALSE)
			{
				//$this->db->select("*");

			}
			foreach($input as $key => $values)
			{
				if($key=="fields")
				{
					foreach($values as $value)
					{
		//				echo $value.",";
						$this->db->set($value,$input[str_replace(".","_",$value)]);
					}
				}
				else if($key=="pri_tab")
				{
					$tab=$input['pri_tab'];
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

							if($opcode=="LIKE")
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
							if($opcode=="LIKE")
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
							$this->db->having($f1." ".$op,$f2);
						}
						$i++;
					}
				}
				
			}
			
			$status=$this->db->update($tab);
			
			$count=$this->db->affected_rows();					
			$this->db->trans_complete();
			if($count>0)
			{
				$ans['status']=1;
				$ans['count']=$count;
			}
			else
			{
				$ans['status']=0;
				$ans['count']=$count;
				
			}
			$data['output']=$ans;
			$this->load->view('template/json',$data);



		}
		else if($opertation=="INSERT")
		{
			//echo "insert";

			$this->db->trans_start();
			if(isset($input['fields'])==FALSE)
			{
				//$this->db->select("*");

			}
			foreach($input as $key => $values)
			{
				if($key=="fields")
				{
					foreach($values as $value)
					{
		//				echo $value.",";
						$this->db->set($value,$input[str_replace(".","_",$value)]);
					}
				}
				else if($key=="pri_tab")
				{
					$tab=$input['pri_tab'];
		//			echo "from(".$values.")";
				}
			}
			
			$status=$this->db->insert($tab);
			
			$id=$this->db->insert_id();					
			$this->db->trans_complete();
			if($status==true)
			{
				$ans['status']=1;
				$ans['id']=$id;
			}
			else
			{
				$ans['status']=0;
				$ans['id']=0;
				
			}
			$data['output']=$ans;
			$this->load->view('template/json',$data);

		}
		else if($opertation=="DELETE")
		{
		//	echo "select ";
			$this->db->trans_start();
			if(isset($input['fields'])==FALSE)
			{
				$this->db->select("*");

			}
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
							$this->db->having($f1." ".$op,$f2);
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
						$this->db->join($jtable,$jf1." ".$jop." ".$jf2,$jtype);
						$j++;
					}
				}
				

			}
			$ans=$this->db->delete($input['pri_tab']);
			$count=$this->db->affected_rows();
			$this->db->trans_complete();
			if($count>0)
			{
				$ans=array('status' => 1,'count'=>$count);
			}
			else{
				$ans=array('status' => 0,'count'=>$count);
			}
			$data['output']=$ans;
			$this->load->view('template/json',$data);

		}
		else if($opertation=="CUSTOM")
		{
			if($input['custom_query']!="")
			{
				$customquery=$input['custom_query'];
				//echo $customquery;	
				$sql= $customquery;
				$qry_res = $this->db->query($sql);		
				$res=$qry_res->result_array();
				$qry_res->free_result();
				$data['output']=$res;
				$this->load->view('template/json',$data);
			}	
			

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