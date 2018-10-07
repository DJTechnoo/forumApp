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

			
			// Check to see that all fields are filled
			// Check to see if the email is valid
			// Check to see if either username or email is taken
			if(empty($data["email"]) || empty($data["username"]) || empty($data["firstname"]) || empty($data["lastname"]) || empty($data["hash"]))
			{
				$this->view("users/empty");
				
			}elseif(!filter_var($data["email"], FILTER_VALIDATE_EMAIL))
			{
				$this->view("users/email", $data);
			}
			elseif($this->userModel->withThisName($data["username"]) || $this->userModel->withThisEmail($data["email"]))
			{
				$this->view("users/taken", $data);	
			}
			
			else
			{
				//$salt = random_bytes(15); //Generating 15 random bytes
				//$salt = base64_encode($salt); //Converting the random bytes to base64 
				//$salt = str_replace('+', '.', $salt); //Replacing all '+' with '.'
				$salt = salt();
				$data["hash"] = crypt($data["hash"], '$2y$12$'.$salt.'$');
				$this->userModel->register($data);
				redirect("users/login");
			}
		
		}
		
		else
		{
			$data = [
				"username"	=> "",
				"email"		=> "",
				"firstname"	=> "",
				"lastname"	=> "",
				"hash"		=> "",
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
		$_SESSION['user_priviliege'] = $user->userpriviliege;
		redirect("threads/index");
	}
	
	public function displayProfile(){
        $data = [
            "username" => $this->userModel->displayUsername($_SESSION["user_id"]),
            "userpriviliege" => $this->userModel->displayUserpriviliege($_SESSION["user_id"]),
            "firstname" => $this->userModel->displayFirstname($_SESSION["user_id"]),
            "lastname" => $this->userModel->displayLastname($_SESSION["user_id"]),
            "email" => $this->userModel->displayEmail($_SESSION["user_id"]),
        ];
        $this->view("users/profile", $data);
        
    }

    public function updatePassword() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                "password" => trim($_POST["pwd"]),
                "userid" => $_SESSION["user_id"]
            ];

            if (empty($data["password"])) {
                $this->view("users/empty");

            } else {
                #$salt = random_bytes(15); //Generating 15 random bytes
                #$salt = base64_encode($salt); //Converting the random bytes to base64
                #$salt = str_replace('+', '.', $salt); //Replacing all '+' with '.'
                $salt = salt();
                $data["hash"] = crypt($data["password"], '$2y$12$'.$salt.'$');
                $this->userModel->updatePassword($data);
                redirect("pages/index");     #Evt. redirect tilbake til profil page

            }
        }else $this->view("users/updatepwd");
    }
}


?>