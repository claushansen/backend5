<?php 

interface Crudinterface{
	public function select($what);
	public function from($table);
	public function limit($limit);
	public function orderby($orderby);
	public function sql($sql);
	public function execute();
	
}//end interface





?>