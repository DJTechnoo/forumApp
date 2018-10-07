<?php

class User {

	private $db;

	public function __construct(){
		$this->db = new Database();
	}

	public function withThisName($username){
		$this->db->query("SELECT * FROM users WHERE username LIKE :username");
		$this->db->bind(":username", $username);
		$row = $this->db->single();
		return ($this->db->rowCount() > 0);

	}


	public function withThisEmail($email){
		$this->db->query("SELECT * FROM users WHERE email LIKE :email");
		$this->db->bind(":email", $email);
		$row = $this->db->single();
		return ($this->db->rowCount() > 0);
	}


	public function register($data){
		$this->db->query("INSERT INTO users (email, hash, username, firstname, lastname)
						 VALUES (:email, :hash, :username, :firstname, :lastname)");
		$this->db->bind(":email", $data["email"]);
		$this->db->bind(":hash", $data["hash"]);
		$this->db->bind(":username", $data["username"]);
		$this->db->bind(":firstname", $data["firstname"]);
		$this->db->bind(":lastname", $data["lastname"]);
		$this->db->execute();
	}


	// Return user row if password match
	public function login($email, $password){
		$this->db->query("SELECT * FROM users WHERE email = :email");
		$this->db->bind(":email", $email);
		$row = $this->db->single();
		$hashedPassword = $row->hash;

		if(password_verify($password, $hashedPassword)){
			return $row;
		}
		return false;
	}

	/*public function displayProfile($id) {
        $this->db->query( "SELECT username, userpriviliege, firstname, lastname, email FROM users WHERE userid = :userid");
        $this->db->bind(":userid", $id);
        $row = $this->db->single();
        return $row;

    }*/
	
	public function displayUsername($id) {
        $this->db->query("SELECT username FROM users WHERE userid = :userid");
        $this->db->bind("userid", $id);
        $user = $this->db->single();
        return $user; 
    }

    public function displayUserpriviliege($id) {
        $this->db->query("SELECT userpriviliege FROM users WHERE userid = :userid");
        $this->db->bind("userid", $id);
        $row = $this->db->single();
        return $row;
    }

    public function displayFirstname($id) {
        $this->db->query("SELECT firstname FROM users WHERE userid = :userid");
        $this->db->bind("userid", $id);
        $row = $this->db->single();
        return $row;
    }
    
	public function displayLastname($id) {
        $this->db->query("SELECT lastname FROM users WHERE userid = :userid");
        $this->db->bind("userid", $id);
        $row = $this->db->single();
        return $row;
    }
	
    public function displayEmail($id) {
        $this->db->query("SELECT email FROM users WHERE userid = :userid");
        $this->db->bind("userid", $id);
        $row = $this->db->single();
        return $row;
    }
	
    public function updatePassword($data) {
        $this->db->query("UPDATE users SET hash = :hash WHERE userid = :userid");
        $this->db->bind(":userid", $data["userid"]);
        $this->db->bind(":hash", $data["hash"]);
        $this->db->execute();
    }
}



?>