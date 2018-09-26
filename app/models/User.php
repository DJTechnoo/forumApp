<?php

class User {

	private $db;

	public function __construct(){
		$this->db = new Database();
	}

	public function withThisName($name){
		$this->db->query("SELECT * FROM users WHERE fullname LIKE :name");
		$this->db->bind(":name", $name);
		$row = $this->db->single();
		return ($this->db->rowCount() > 0);

	}


	public function register($data){
		$this->db->query("INSERT INTO users (fullname, password, birthyear)
						 VALUES (:fullname, :password, :birthyear)");
		$this->db->bind(":fullname", $data["fullname"]);
		$this->db->bind(":password", $data["password"]);
		$this->db->bind(":birthyear", $data["birthyear"]);
		$this->db->execute();
	}


}



?>