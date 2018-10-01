<?php

class Threads extends Controller {

	public function __construct(){
		$this->threadModel = $this->model("Thread");
	}


	public function index(){
		$data = [];
		$data["title"] = "Threads";
		$data["threads"] = $this->threadModel->getAllThreads();
		$this->view("/threads/index", $data);
	}
}



?>