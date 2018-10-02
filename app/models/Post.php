<?php

class Post {


	private$db;

	public function __construct(){
		$this->db = new Database();
	}


	public function getPostsOfThread($id){
		$this->db->query(	"SELECT post.title, post.date, users.username, thread.threadid
							FROM post
							JOIN thread ON thread.threadid = post.threadid
							JOIN users ON post.userid = users.userid
							WHERE thread.threadid = :id");
		$this->db->bind(":id", $id);
		$allPosts = $this->db->resultSet();
		return $allPosts;
	}

}


?>