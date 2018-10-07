<?php

class Post {


	private$db;

	public function __construct(){
		$this->db = new Database();
	}


	public function getPostsOfThread($id){
		$this->db->query(	"SELECT post.title, post.date, users.username, thread.threadid, post.text
							FROM post
							JOIN thread ON thread.threadid = post.threadid
							JOIN users ON post.userid = users.userid
							WHERE thread.threadid = :id
							ORDER BY post.date");
		$this->db->bind(":id", $id);
		$allPosts = $this->db->resultSet();
		return $allPosts;
	}

	
	public function threadExists($id){
		$this->db->query("SELECT * FROM thread WHERE threadid LIKE :threadid");
		$this->db->bind(":threadid", $id);
		$row = $this->db->single();
		return ($this->db->rowCount() > 0);
	}




	public function insertPost($data){
		$this->db->query("INSERT INTO post (title, text, userid, threadid, date)
								   VALUES (:title, :text, :userid, :threadid, :date)");
		$this->db->bind(":title", $data["posttitle"]);
		$this->db->bind(":text", $data["posttext"]);
		$this->db->bind(":userid", $data["userid"]);
		$this->db->bind(":threadid", $data["threadid"]);
		$this->db->bind(":date", date('Y-m-d G:i:s'));
		$this->db->execute();
	}
	
	/*public function deletePost($del){
        $this->db->query("DELETE FROM post WHERE threadid=':del'");
		$this->db->bind(":del",$del);
		$this->db->execute();
    }*/

}


?>