<?php
class InvoiceView{
	
	public function __construct($model){
	$this->display($model);
	}
	
	public function display($model){
	include_once('invoice.tpl.php');	
	}
	
}


