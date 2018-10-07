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

} 

?>