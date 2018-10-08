<?php

class ThreadLog {

	private $log;

	public function __construct(){
		$this->log = new Log();
	}


	public function logThread($data){

		$this->log->query(
			"INSERT INTO threadlog (threadid, userid, threadname)
			VALUES (:threadid, :userid, :threadname)
			"
		);

		$this->log->bind(":threadid", $data["threadid"]);
		$this->log->bind(":userid", $data["userid"]);
		$this->log->bind(":threadname", $data["threadname"]);

		$this->log->execute();
	}



}





?>