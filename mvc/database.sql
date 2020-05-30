DROP DATABASE IF EXISTS netws;

CREATE DATABASE netws;
USE netws;

CREATE TABLE contact ( 
	id         INT NOT NULL AUTO_INCREMENT,
	email      VARCHAR(255) NOT NULL,
	comment    TEXT NOT NULL,

    PRIMARY KEY (id)
);