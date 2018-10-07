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

	public function listPosts($threadId){
		echo "posts from $threadId <br>";
	}

	public function addThread(){
		if(isset($_SESSION["user_id"])){
			if($_SERVER['REQUEST_METHOD'] == 'POST'){

				$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
				$data = [
						"threadname"		=> trim($_POST["threadname"]),
						"userid" => $_SESSION["user_id"]
				];

				$this->threadModel->insertThread($data);		// add thread to db
				redirect("threads/index");
			}else $this->view("/threads/addthread", []);
		}else	redirect("users/login");
	}
	
	/*public function deleteThread($id) {
		if(isset($_SESSION["user_id"]) && $_SESSION["user_priviliege"] === 'admin' || $_SESSION["user_priviliege"] === 'moderator'){
			$this->threadModel->deleteThread($id);
			redirect("threads/index");
		}
	}*/

}



?>