<?php

class Users extends Controller {
	
	public function __construct(){
		$this->userModel = $this->model("User");
	}


	public function register(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){

			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			$data = [
					"email"		=> trim($_POST["email"]),
					"hash"		=> trim($_POST["hash"]),
					"username"	=> trim($_POST["username"]),
					"firstname"	=> trim($_POST["firstname"]),
					"lastname"	=> trim($_POST["lastname"])
			];


			// Check to see if either username or email is taken
			if($this->userModel->withThisName($data["username"])|| $this->userModel->withThisEmail($data["email"]))	
			{
				$this->view("users/taken", $data);
			}else{
				$data["hash"] = password_hash($data["hash"], PASSWORD_DEFAULT);
				$this->userModel->register($data);
				redirect("users/login");
			}
		
		}else{
			$data = [
				"username"		=> "",
				"email"	=> ""
			];

			$this->view("users/register", $data);
		}
	}




	public function login(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$data = [
				"email" => trim($_POST["email"]),
				"hash" => trim($_POST["hash"])
			];

			if($this->userModel->withThisEmail($data["email"])){
				$loggedInUser = $this->userModel->login($data["email"], $data["hash"]);
				if($loggedInUser){

				// AT THIS POINT THE USER IS SUCCESSFULLY LOGGED IN
					$this->createSession($loggedInUser);

				
				}else{
					$this->view("users/login", $data);
				}
			} else $this->view("users/login", $data);		
		}else{
			$data = [
					"email"		=> "",
					"hash"		=> "",
					"username"		=> ""
			];	

			$this->view("users/login", $data);
		}
	}



	public function logout(){

		unset($_SESSION['user_id']);
		unset($_SESSION['user_name']);
		unset($_SESSION['user_year']);
		session_destroy();

		redirect("users/login");
	}



	public function createSession($user){
		
		$_SESSION['user_id'] = $user->userid;
		$_SESSION['user_name'] = $user->username;
		$_SESSION['user_email'] = $user->email;
		redirect("threads/index");
	}

}


?>