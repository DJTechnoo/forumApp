<?php

// Handles URL
// Format: /Controller/Method/params

class Core {
	protected $currentController = 'pages';
	protected $currentMethod = 'index';
	protected $params = [];
	
	public function __construct(){
		$url = $this->getUrl();
		if(file_exists("../app/controllers/".$url[0] . '.php')){
			echo "It exists!";
		}
	}
	
	public function getUrl(){
		if(isset($_GET['url'])){
			$url = rtrim($_GET['url'], '/');
			$url = filter_var($url, FILTER_SANITIZE_URL);
			$url = explode('/', $url);
			print_r($url);
			return $url;
		}
	}
}


?>