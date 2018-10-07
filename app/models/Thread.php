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
	
	/*public function deleteThread($del){
        $this->db->query("DELETE FROM thread WHERE threadid=':del'");
		$this->db->bind(":del",$del);
		$this->db->execute();
    }*/

}




?>