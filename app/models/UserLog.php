
<?php

class UserLog{


	private $log;

	public function __construct(){
		$this->log = new Log();
	}


	public function loginAttempt($email, $success, $ipaddress){
		$this->log->query(
			"INSERT INTO loginattempts (email, success, date, ipaddress)
			VALUES (:email, :success, :date, :ipaddress)
			"
		);

		$this->log->bind(":email", $email);
		$this->log->bind(":success", $success);
		$this->log->bind(":date", date('Y-m-d G:i:s'));
		$this->log->bind(":ipaddress", $ipaddress);
		$this->log->execute();
	
	}




}


?>