<?php

class Users extends Controller {
	
	public function __construct(){
		$this->userModel = $this->model("User");
	}


	public function register(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){

			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			$data = [
					"fullname"		=> trim($_POST["name"]),
					"password"		=> trim($_POST["password"]),
					"birthyear"	=> trim($_POST["birthyear"])
			];


			if($this->userModel->withThisName($data["fullname"])){
				$this->view("users/taken", $data);
			}else{
				$data["password"] = password_hash($data["password"], PASSWORD_DEFAULT);
				$this->userModel->register($data);
				redirect("users/login");
			}
		
		}else{
			$data = [
				"name"		=> "",
				"birthyear"	=> ""
			];

			$this->view("users/register", $data);
		}
	}




	public function login(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$data = [
				"fullname" => trim($_POST["name"]),
				"password" => trim($_POST["password"])
			];

			if($this->userModel->withThisName($data["fullname"])){
				$loggedInUser = $this->userModel->login($data["fullname"], $data["password"]);
				if($loggedInUser){

				// AT THIS POINT THE USER IS SUCCESSFULLY LOGGED IN

				
				}else{
					$this->view("users/login");
				}
			}	
		}else{
			$data = [
					"fullname"		=> "",
					"password"		=> "",
					"birthyear"		=> ""
			];	

			$this->view("users/login", $data);
		}
	}



}


?>