<?php 

class Connect{
	
	private $_host;
	private $_database;
	private $_username;
	private $_password;
	private $_port;
	protected $_db;
	
	
	public function __construct($host,$username,$password,$database,$port = 3306){
		
		$this->_host = $host;
		$this->_username = $username;
		$this->_password = $password;
		$this->_database = $database;
		$this->_port = (int)$port;
		
		$this->_db = new mysqli($this->_host,$this->_username,$this->_password,$this->_database,$this->_port);

		// Check connection
		if (mysqli_connect_errno())
		  {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		  }
		
	}//end function __construct
	
}//end class Connect





?>