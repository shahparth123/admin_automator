<?php

Class Api_model extends CI_Model {
	public function __construct()
	{
		
	}

// Insert registration data in database
public function registration_insert($data) {

// Query to check whether username already exist or not
$condition = "user_name =" . "'" . $data['user_name'] . "'";
$this->db->select('*');
$this->db->from('user_login');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();
if ($query->num_rows() == 0) {

// Query to insert data in database
$this->db->insert('user_login', $data);
if ($this->db->affected_rows() > 0) {
return true;
}
} else {
return false;
}
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
				$fields[]=$value;
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
			}
		}
		$field = implode(',', $fields);
		$condition = implode(' and ', $conditions);
		$table = implode(',', $tables);
		//echo "select ".$field." from ".$table." where ".$condition;
		$sql= "select ".$field." from ".$table." where ".$condition;
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

// Read data from database to show data in admin page
public function read_user_information($sess_array) {

$condition = "user_name =" . "'" . $sess_array['username'] . "'";
$this->db->select('*');
$this->db->from('user_login');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();

if ($query->num_rows() == 1) {
return $query->result();
} else {
return false;
}
}

}

?>