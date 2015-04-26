<?php 

class Connect{
	
	private $_host;
	private $_database;
	private $_username;
	private $_password;
	private $_port;
	protected $_db;
	
	
	public function __construct($port = 3306){
		
		$this->_host = DB_HOST;
		$this->_username = DB_USER;
		$this->_password = DB_PASS;
		$this->_database = DB_DATABASE;
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