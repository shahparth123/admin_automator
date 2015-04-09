<?php

Class Api_model extends CI_Model {
	public function __construct()
	{
		
	}

	public function index() {
		
	}

	public function generate($oper,$query_fields,$perameter_count,$user_id,$auth_key,$comment,$name) {
		$this->db->set("fields",$query_fields);
		$this->db->set("perameter_count",$perameter_count);
		$this->db->set("user_id",$user_id);
		$this->db->set("auth_key",$auth_key);
		$this->db->set("comment",$comment);
		$this->db->set("opertation",$oper);
		$this->db->set("name",$name);
		$this->db->insert("query_param");
		return $this->db->insert_id();
	}

	public function retrive($oper,$id,$auth_key,$name) {
		$this->db->select("*");
		$this->db->from("query_param");
		$this->db->where("id =",$id);
		$this->db->where("opertation =",$oper);
		$this->db->where("name =",$name);
		$this->db->where("auth_key =",$auth_key);
		return $this->db->get()->result_array();
	}


// Read data using username and password
	public function gettables() {
		$sql = "CALL gettables()"; 
		$qry_res = $this->db->query($sql);		
		$res = $qry_res->result_array();
		//print_r($res);
		$qry_res->free_result();
		if (count($res) > 0)
		{
			return $res;
		} 
		else 
		{
			return 0;
		}
	}

	public function select($values) {
		$i=0;
		$j=0;
		$k=0;
		$fields= array();
		$tables= array();
		$conditions= array('1');
		foreach ($values as $key => $value) {
			if($key=="field".$i)
			{
				if($value=='ALL')
				{
					//$fields[]="*";
					$this->db->select("*");
				}
				else{
				//	$fields[]=$value;
					$this->db->select($value);	
				}
				$i++;
			}
			else if($key=="condition".$j)
			{
				//$con=split(":", $value)
				$conditions[]=$value;
				$j++;
			}
			else if($key=="table".$k)
			{
				//$tables[]=$value;
				$this->db->from($value);
				$k++;
			}
			/*if($key=="field".$i)
			{
				if($value=='ALL')
				{
					$fields[]="*";
				}
				else{
					$fields[]=$value;
					
				}
				$i++;
			}
			else if($key=="condition".$j)
			{
				//$con=split(":", $value)
				$conditions[]=$value;
				$j++;
			}
			else if($key=="table".$k)
			{
				$tables[]=$value;
				$k++;
			}*/
		}
		//$field = implode(',', $fields);
		//$condition = implode(' and ', $conditions);
		//$table = implode(',', $tables);
		//echo "select ".$field." from ".$table." where ".$condition;
		//$sql= "select ".$field." from ".$table." where ".$condition;
		//$qry_res = $this->db->query($sql);		
		$qry_res = $this->db->get();		
		$res = $qry_res->result_array();
		//print_r($res);
		$qry_res->free_result();
		if (count($res) > 0)
		{
			return $res;
		} 
		else 
		{
			return 0;
		}
	}
	public function getcolumns($tbl) {
		$sql = "CALL getcolumn(?)"; 
		$qry_res = $this->db->query($sql,$tbl);		
		$res = $qry_res->result_array();
		//print_r($res);
		$qry_res->free_result();
		if (count($res) > 0)
		{
			return $res;
		} 
		else 
		{
			return 0;
		}
	}

	public function deleterecord($tbl,$id) {
		$data = array(
			'is_deleted' => '1'
			);
		$this->db->where('id', $id);
		$this->db->update($tbl, $data); 
		return $this->db->affected_rows();
	}

	public function updatedata($tbl,$id,$data) {
		
		$this->db->where('id', $id);
		$this->db->update($tbl, $data); 
		return $this->db->affected_rows();
	}

	public function insertrow(){
		
	}

}

?>