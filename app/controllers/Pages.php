<?php

class Pages extends Controller {
	
	public function __construct(){
		
	}
	
	
	public function index(){
		$this->view("omg");
	}
	
	public function about($id){
		echo "<br><h1>About $id</h1>";
	}
	
	
	
}




?>