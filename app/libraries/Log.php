<?php

// Connect to database
// Prepare statements
// return results

class Log {
	private $host = DB_HOST;
	private $user = LOGS_USER;
	private $pass = LOGS_PASSWORD;
	private $dbname = LOGS_NAME;
	
	private $dbh;
	private $stmt;
	private $err;
	
	public function __construct(){
		$dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbname;
		$options = array(
			PDO::ATTR_PERSISTENT => true,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		);
		
		try{
			$this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
			
		}catch(PDOException $e){
			$this->err = $e->getMessage();
			echo $this->err;
		}	
	}
	
	
	public function query($sql){
		$this->stmt = $this->dbh->prepare($sql);
	}
	
	
	
	public function bind($param, $value, $type = null){
		if(is_null($type)){
			switch(true){
				case is_int($value):
					$type = PDO::PARAM_INT; break;
				case is_bool($value):
					$type = PDO::PARAM_BOOL; break;
				case is_null($value):
					$type = PDO::PARAM_NULL; break;
				default:
					$type = PDO::PARAM_STR;	
			}
		}
		
		$this->stmt->bindValue($param, $value, $type);
	}
	
	
	
	public function execute(){
		return $this->stmt->execute();
	}


	// Get ALL rows
	public function resultSet(){
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_OBJ);
	}
	
	
	// Get ONE row
	public function single(){
		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_OBJ);
	}
	
	
	public function rowCount(){
		return $this->stmt->rowCount();
	}
	
}



?>