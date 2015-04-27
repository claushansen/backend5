<?php
include_once('class.Crud.php');
class Invoice{
	private $_id;
	private $_db;
	private $_order_date;
	private $_total = 0;
	private $_user_id;
	private $_user;
	private $_products;
	
	public function __construct(){
		$this->_id = isset($_GET['oid']) ? $_GET['oid'] : '';
		if(!$this->_id){
		die('Need an order id');	
		}
		$this->_db = new Crud();
		$this->init();
	
	}
	
	
	
	private function init(){
		$orderdata = $this->_db->select('*')->from('orders')->where('id',$this->_id)->execute();
		if(!$orderdata)die('Wrong orderid, no orders with that id');
		if($orderdata){
		$this->_order_date = $orderdata[0]['order_date'];	
		$this->_user_id = $orderdata[0]['user_id'];
		}
		$this->setProducts();
		$this->calculateTotal();
		$this->setUser();
		
	}
	private function setProducts(){
		$sql = "SELECT order_items.amount, products.* FROM order_items JOIN products ON order_items.prod_id = products.id WHERE order_items.order_id = ".$this->_id;
		$productsdata = $this->_db->sql($sql)->execute();
		$this->_products = $productsdata;
		//print_r($productsdata);
	}
	
	private function calculateTotal(){
	if(is_array($this->_products) && count($this->_products)){
		foreach($this->_products as $product){
		$this->_total += ($product['price'] * $product['amount'] );	
		}
	}
	}
	
	private function setUser(){
		$userdata = $this->_db->select('*')->from('user')->where('id',$this->_user_id)->execute();
		//if(!$userdata)die('no userdata');
		$this->_user = $userdata[0];
		//print_r($this->_user);
	}
	
	public function getOrderId(){
	return $this->_id;	
	}
	
	public function getOrderDate(){
	return $this->_order_date;	
	}
	
	public function getTotal(){
	return $this->_total;	
	}
	
	public function getProducts(){
	return $this->_products;	
	}
	
	public function getUser(){
	return $this->_user;	
	}
	
	public function getUserFullName(){
		$name = $this->_user['firstname']. ' '. $this->_user['lastname'];
	return $name;	
	}
	
	public function getUserAddress(){
		$address  = $this->_user['address'];
	return $address;	
	}
	
	public function getUserCity(){
		$ret  = $this->_user['city'];
	return $ret;	
	}
	
	public function getUserZip(){
		$ret  = $this->_user['zip'];
	return $ret;	
	}
	
	public function getUserId(){
	return $this->_user_id;	
	}
	
	
	
}

