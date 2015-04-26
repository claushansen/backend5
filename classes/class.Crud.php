<?php

include_once('class.Connect.php');
include_once('interface.Crudinterface.php');
class Crud extends Connect implements Crudinterface{
	
	protected $result;
	protected $sql;
	
		
	public function select($what){
		
		$this->sql .= " SELECT ".$what;
		return $this;
		
	}
	
	public function from($table){
		
		$this->sql .= " FROM ".$table;
		return $this;
		
	}
	
	public function limit($limit){
		
		$this->sql .= " LIMIT ".$limit;
		return $this;
		
	}
	
	public function orderby($orderby){
		
		$this->sql .= " ORDER BY ".$orderby;
		return $this;
		
	}
	
	public function where($collumn,$value,$operator = '='){
		$value = $this->quote($value);
		$this->sql .= " WHERE ".$collumn .' '.$operator.' '.$value;
		return $this;
		
	}

	public function andwhere($collumn,$value,$operator = '='){
		$value = $this->quote($value);
		$this->sql .= " AND ".$collumn .' '.$operator.' '.$value;
		return $this;
		
	}
	
	public function quote($value){
		$ret = is_string($value) ? "'".$value."'" : $value;
		return $ret;
	}
	
	
	public function sql($sql){
		
		$this->sql = $sql;
		return $this;
		
	}
	
	public function execute(){

	$result = $this->_db->query($this->sql);
	
	if ($result->num_rows > 0) {
		  $this->result = array();
		  
		  while($row = $result->fetch_assoc()) {
			  $this->result[] = $row;
			}
		  $this->sql ='';
		  return $this->result;
		  } else {
			 $this->sql ='';
			 return false;
	  }
	
	}//end function execute
	
}//end class Crud



 ?>