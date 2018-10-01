<?php

class Thread {
	
	private $db;


	public function __construct(){
		$this->db = new Database();
	}


	public function getAllThreads(){
		$this->db->query("SELECT * FROM thread");
		$allThreads = $this->db->resultSet();
		return $allThreads;
	}

}




?>