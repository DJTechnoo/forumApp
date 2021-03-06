<?php

class Posts extends Controller {


	public function __construct(){
		$this->postModel = $this->model("Post");
	}



	public function listPosts ($id){
		$data = [
			"title" => "Posts",
			"posts" => $this->postModel->getPostsOfThread($id),
			"currentThread" => $id
		];
		$this->view("posts/allposts", $data);
	}


	public function addPost($id){
		if(isset($_SESSION["user_id"])	&& $this->postModel->threadExists($id)){
			if($_SERVER['REQUEST_METHOD'] == 'POST'){

				$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
				$data = [
						"posttitle"	=> trim($_POST["posttitle"]),
						"posttext"	=> trim($_POST["posttext"]),
						"userid"	=> $_SESSION["user_id"],
						"threadid"	=> $id
				];

				$this->postModel->insertPost($data);		// add thread to db
				redirect("posts/listPosts/" . $id);
			}else {
				$data = ["currentThread" => $id];
				$this->view("/posts/addpost", $data);
			}
		}else	redirect("users/login");
	}

	/*public function deletePost($del) {
		if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$this->postModel->deletePost($del);
			redirect("posts/allposts");
		}
	}*/


	public function seePost($id){
		$comments 	= $this->postModel->getCommentsOfPost($id);
		$title	  	= $this->postModel->getTitleOfPost($id);
		$text	  	= $this->postModel->getTextOfPost($id);
		$data = [
			"title" => $title->posttitle,
			"text" => $text->posttext,
			"comments" => $comments,
			"currentPost" => $id
		];
		$this->view("posts/comments", $data);
	}



	public function addComment($id){


		if(isset($_SESSION["user_id"])){//	&& $this->postModel->threadExists($id)){
			if($_SERVER['REQUEST_METHOD'] == 'POST'){

				$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
				$data = [
						"commenttext"	=> trim($_POST["commenttext"]),
						"userid"	=> $_SESSION["user_id"],
						"postid"	=> $id
				];

				$this->postModel->insertComment($data);		// add thread to db
				redirect("posts/seepost/" . $id);
			}else {
				$data = ["currentPost" => $id];
				$this->view("/posts/addcomment", $data);
			}
		}else	redirect("posts/seePost/" . $id);
	}

	public function deleteAllComment($del) {
        if(/*$_SESSION["user_id"] === $this->postModel->getCommentUserid($del)*/isset($_SESSION["user_id"]) && ($_SESSION["user_priviliege"] === 'admin' || $_SESSION["user_priviliege"] === 'moderator')) {
            //if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->postModel->deleteAllComment($del);
            //}
        }
    }

    public function deleteComment($del) {
        if(/*$_SESSION["user_id"] === $this->postModel->getCommentUserid($del)*/isset($_SESSION["user_id"]) && ($_SESSION["user_priviliege"] === 'admin' || $_SESSION["user_priviliege"] === 'moderator')) {
            //if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $this->postModel->deleteComment($del);
                redirect("threads/index");
          //  }
        }
    }

	public function deleteAllPost($del) {
        if(/*$_SESSION["user_id"] === $this->postModel->getCommentUserid($del)*/isset($_SESSION["user_id"]) && ($_SESSION["user_priviliege"] === 'admin' || $_SESSION["user_priviliege"] === 'moderator')) {
            //if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->postModel->checkComment($del)) {
                $this->deleteAllComment($del);
            }
            $this->postModel->deleteAllPost($del);
            redirect("posts/seePost/");
            //}
        }
    }

    public function deletePost($del) {
        if(/*$_SESSION["user_id"] === $this->postModel->getCommentUserid($del)*/isset($_SESSION["user_id"]) && ($_SESSION["user_priviliege"] === 'admin' || $_SESSION["user_priviliege"] === 'moderator')) {
            //if ($_SERVER['REQUEST_METHOD'] == 'POST') {
             if (($this->postModel->checkComment($del)) > 0) {
                 $this->deleteAllComment($del);
             }
            $this->postModel->deletePost($del);
            redirect("threads/index");
            // }
        }
    }
}
?>