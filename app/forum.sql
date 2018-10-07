CREATE DATABASE forum
DEFAULT COLLATE utf8_danish_ci;


CREATE TABLE users
(
    userid INT AUTO_INCREMENT NOT NULL,
    userpriviliege ENUM('admin', 'moderator', 'user') DEFAULT 'user',
    email VARCHAR(255) NOT NULL,
    firstname VARCHAR(255) NOT NULL,
    lastname VARCHAR(255) NOT NULL,
    username VARCHAR(255) NOT NULL,
    salt VARCHAR(100) NOT NULL,
    hash VARCHAR(255) NOT NULL,

    PRIMARY KEY (userid)
);

CREATE TABLE thread
(
    threadid INT AUTO_INCREMENT NOT NULL,
    userid INT NOT NULL,
    threadname VARCHAR(255) NOT NULL,
    postcount INT,

    PRIMARY KEY (threadid),
    FOREIGN KEY (userid) REFERENCES users(userid) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE post
(
    postid INT AUTO_INCREMENT NOT NULL,
    threadid INT NOT NULL,
    userid INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    text TEXT NOT NULL,
    date DATETIME NOT NULL,

    PRIMARY KEY (postid),
    FOREIGN KEY (threadid) REFERENCES thread(threadid) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (userid) REFERENCES users(userid) ON UPDATE CASCADE ON DELETE CASCADE
);
CREATE TABLE comment
(
    commentid INT AUTO_INCREMENT NOT NULL,
    postid INT NOT NULL,
    userid INT NOT NULL,
    text TEXT NOT NULL,
    date DATETIME NOT NULL,

    PRIMARY KEY (commentid),
    FOREIGN KEY (postid) REFERENCES post(postid) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (userid) REFERENCES users(userid) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE report
(
    reportid INT AUTO_INCREMENT NOT NULL,
    userid INT NOT NULL,
    commentid INT NOT NULL,
    postid INT NOT NULL,
    reportersuserid INT NOT NULL,
    reporttype ENUM('racism','hate speech','spam','self promotion') NOT NULL,
    reporttext TEXT NOT NULL,

    PRIMARY KEY (reportid),
    FOREIGN KEY (postid) REFERENCES post(postid) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (commentid) REFERENCES comment(commentid) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (userid) REFERENCES users(userid) ON UPDATE CASCADE ON DELETE CASCADE
);