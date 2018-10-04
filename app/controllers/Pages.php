<?php

class Pages extends Controller {
	
	public function __construct(){
		
	}
	
	
	public function index(){		
		$data = [
			"title" => "Home"
		
		];
		$this->view("pages/index", $data);
		//$this->view("pages/captcha", $data);
		
	}
	
	public function about(){
		$this->view("pages/about", ["title" => "About Us"]);
	}
	
	
	
}




?>