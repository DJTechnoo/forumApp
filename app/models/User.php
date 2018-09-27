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


	// Return user row if password match
	public function login($fullname, $password){
		$this->db->query("SELECT * FROM users WHERE fullname = :fullname");
		$this->db->bind(":fullname", $fullname);
		$row = $this->db->single();
		$hashedPassword = $row->password;

		if(password_verify($password, $hashedPassword)){
			return $row;
		}
		return false;
	}


}



?>