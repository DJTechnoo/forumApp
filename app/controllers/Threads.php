<?php

class Threads extends Controller {

	public function __construct(){
		$this->threadModel = $this->model("Thread");
		$this->threadLogModel = $this->model("ThreadLog");
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
		if(isset($_SESSION["user_id"]) && $_SESSION["user_priviliege"] === 'admin' || $_SESSION["user_priviliege"] === 'moderator'){
			if($_SERVER['REQUEST_METHOD'] == 'POST'){

				$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
				$data = [
						"threadname"		=> trim($_POST["threadname"]),
						"userid" => $_SESSION["user_id"]
				];

				$data["threadid"] = $this->threadModel->insertThread($data);		// add thread to db
				$this->threadLogModel->logThread($data);
				redirect("threads/index");
			}else $this->view("/threads/addthread", []);
		}else	redirect("users/login");
	}

	public function deleteThread($id) {
		if(isset($_SESSION["user_id"]) && $_SESSION["user_priviliege"] === 'admin' || $_SESSION["user_priviliege"] === 'moderator'){
            if ($this->threadModel->checkPost($id)) {
                $this->deleteAllPostsAndComments($id);
            }
                $this->threadModel->deleteThread($id);

			redirect("threads/index");
		}
	}

    public function deleteAllPost($del) {
        if(/*$_SESSION["user_id"] === $this->postModel->getCommentUserid($del)*/isset($_SESSION["user_id"]) && ($_SESSION["user_priviliege"] === 'admin' || $_SESSION["user_priviliege"] === 'moderator')) {
            //if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->threadModel->checkComment($del)) {
                $this->deleteAllComment($del);
            }
            $this->threadModel->deleteAllPost($del);

            redirect("posts/seePost/");
            //}
        }
    }

    public function deleteAllComment($del) {
        if(/*$_SESSION["user_id"] === $this->postModel->getCommentUserid($del)*/isset($_SESSION["user_id"]) && ($_SESSION["user_priviliege"] === 'admin' || $_SESSION["user_priviliege"] === 'moderator')) {
            //if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->threadModel->deleteAllComment($del);
            //}
        }
    }

    public function deleteAllPostsAndComments($del) {
        if(/*$_SESSION["user_id"] === $this->postModel->getCommentUserid($del)*/isset($_SESSION["user_id"]) && ($_SESSION["user_priviliege"] === 'admin' || $_SESSION["user_priviliege"] === 'moderator')) {
            $posts = $this->threadModel->getAllPostsinThread($del);

            foreach ($posts as $post) {
                if ($this->threadModel->checkComment($post)) {
                    $this->deleteAllComment($post);
                }
            }
            $this->deleteAllPost($del);
        }
    }

}



?>