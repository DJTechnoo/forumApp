<?php

class Posts extends Controller {


	public function __construct(){
		$this->postModel = $this->model("Post");	
	}



	public function listPosts ($id){
		$data = [
			"title" => "Posts",
			"posts" => $this->postModel->getPostsOfThread($id)
		];
		$this->view("posts/allposts", $data);
	}



} 

?>