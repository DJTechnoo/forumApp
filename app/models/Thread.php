<?php
class Thread {

	private $db;

	public function __construct(){
		$this->db = new Database();
	}

    public function getAllThreads(){
        $this->db->query("SELECT * FROM thread ORDER BY threadid DESC");
        $allThreads = $this->db->resultSet();
        return $allThreads;
    }

	public function insertThread($data){
		$this->db->query("INSERT INTO thread (threadname, userid)
						 VALUES (:threadname, :userid)");
		$this->db->bind(":threadname", $data["threadname"]);
		$this->db->bind(":userid", $data["userid"]);
		$this->db->execute();
	}

	public function deleteThread($del){
        $this->db->query("DELETE FROM thread WHERE threadid=:del");
		$this->db->bind(":del",$del);
		$this->db->execute();
    }

    public function deleteAllComment($del){
        $this->db->query("DELETE FROM comment WHERE postid=:del");
        $this->db->bind(":del",$del);
        $this->db->execute();
    }

	public function deleteAllPost($del){
        $this->db->query("DELETE FROM post WHERE threadid=:del");
        $this->db->bind(":del",$del);
        $this->db->execute();
    }

    public function checkPost($threadid) {
        $this->db->query("SELECT postid FROM post WHERE threadid=:threadid");
        $this->db->bind(":threadid",$threadid);
        $row = $this->db->single();
        return ($this->db->rowcount() > 0);
    }

    public function checkComment($postid) {
        $this->db->query("SELECT commentid FROM comment WHERE postid=:postid");
        $this->db->bind(":postid",$postid);
        $row = $this->db->single();
        return ($this->db->rowcount() > 0);
    }

    public function getAllPostsinThread($threadid) {
        $this->db->query("SELECT postid FROM post WHERE threadid=:threadid");
        $this->db->bind(":threadid",$threadid);
        $row = $this->db->single();
        return $row;
    }
}
?>