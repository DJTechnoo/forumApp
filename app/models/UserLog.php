<?php
class UserLog{

	private $log;

	public function __construct(){
		$this->log = new Log();
	}

	public function loginAttempt($email, $success){
		$this->log->query(
			"INSERT INTO loginattempts (email, success, date)
			VALUES (:email, :success, :date)
			"
		);

		$this->log->bind(":email", $email);
		$this->log->bind(":success", $success);
		$this->log->bind(":date", date('Y-m-d G:i:s'));
		$this->log->execute();	
	}
}
?>