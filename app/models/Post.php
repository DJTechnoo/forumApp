<?php

class Post {

	private$db;

	public function __construct(){
		$this->db = new Database();
	}

	public function getPostsOfThread($id){
		$this->db->query(	"SELECT post.postid, post.title, post.date, users.username, thread.threadid, post.text
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

	public function getTitleOfPost($id){
		$this->db->query(	"SELECT title as posttitle
							 FROM POST
							 WHERE postid = :id");
		$this->db->bind(":id", $id);
		$row = $this->db->single();
		return $row;	
	}
	
	public function getTextOfPost($id){
		$this->db->query(	"SELECT text as posttext
							 FROM POST
							 WHERE postid = :id");
		$this->db->bind(":id", $id);
		$row = $this->db->single();
		return $row;	
	}

	public function getCommentsOfPost($id){
		$this->db->query(	"SELECT post.title as posttitle, comment.date, comment.commentid, comment.text, users.username, comment.userid
							FROM comment
							JOIN post ON post.postid = comment.postid
							JOIN users ON comment.userid = users.userid
							WHERE post.postid = :id
							ORDER BY comment.date");
		$this->db->bind(":id", $id);
		$comments = $this->db->resultSet();
		return $comments;

	}

	public function insertComment($data){
		$this->db->query("INSERT INTO comment (text, userid, postid, date)
								   VALUES (:text, :userid, :postid, :date)");
		$this->db->bind(":text", $data["commenttext"]);
		$this->db->bind(":userid", $data["userid"]);
		$this->db->bind(":postid", $data["postid"]);
		$this->db->bind(":date", date('Y-m-d G:i:s'));
		$this->db->execute();
	}
	
	public function deleteComment($del){
        $this->db->query("DELETE FROM comment WHERE commentid=':del'");
        $this->db->bind(":del",$del);
        $this->db->execute();
    }

    public function deleteAllComment($del){
        $this->db->query("DELETE FROM comment WHERE postid=':del'");
        $this->db->bind(":del",$del);
        $this->db->execute();
    }
	
	public function deleteAllPost($del){
        $this->db->query("DELETE FROM post WHERE threadid=':del'");
        $this->db->bind(":del",$del);
        $this->db->execute();
    }

    public function deletePost($del){
        $this->db->query("DELETE FROM post WHERE postid=':del'");
        $this->db->bind(":del",$del);
        $this->db->execute();
    }
	
	public function getCommentUserid($commentid) {
        $this->db->query("SELECT userid FROM comment WHERE commentid=':commentid'");
        $this->db->bind(":commentid",$commentid);
        $row = $this->db->single();
        return $row;
    }
}
?>