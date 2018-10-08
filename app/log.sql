CREATE DATABASE log
DEFAULT COLLATE utf8_danish_ci;

CREATE TABLE reportlog
(
	reportid INT AUTO_INCREMENT NOT NULL,
	userid INT NOT NULL,
	reportersuserid INT NOT NULL,
	commentid INT NOT NULL,
	postid INT NOT NULL,
	reporttype ENUM('racism','hate speech','spam','self promotion') NOT NULL,
	reporttext TEXT NOT NULL,
	reporttime DATETIME NOT NULL,
	
	PRIMARY KEY (reportid)
);

CREATE TABLE postlog
(
	postid INT AUTO_INCREMENT NOT NULL, 
	threadid INT NOT NULL,
	userid INT NOT NULL,
	title VARCHAR(255) NOT NULL,
	text TEXT NOT NULL,
	datetime DATETIME NOT NULL,
	
	PRIMARY KEY (postid)
);

CREATE TABLE commentlog
(
	commentid INT AUTO_INCREMENT NOT NULL,
	postid INT NOT NULL,
	userid INT NOT NULL,
	reporttext TEXT NOT NULL,
	reporttime DATETIME NOT NULL,
	
	PRIMARY KEY (commentid)
);

CREATE TABLE loginattempts
(
	loginid INT AUTO_INCREMENT NOT NULL,
	email VARCHAR(255) NOT NULL,
	ipaddress VARCHAR(60) NOT NULL,
	success BOOLEAN NOT NULL,
	date DATETIME NOT NULL,
	
	PRIMARY KEY (loginid)
);

CREATE TABLE threadlog
(
	threadid INT AUTO_INCREMENT NOT NULL,
	userid INT NOT NULL,
	threadname VARCHAR(255) NOT NULL,
	postcount INT,
	
	PRIMARY KEY (threadid)
);