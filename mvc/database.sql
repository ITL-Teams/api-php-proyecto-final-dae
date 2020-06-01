DROP DATABASE IF EXISTS netws;

CREATE DATABASE netws;
USE netws;

CREATE TABLE contact ( 
    id         INT NOT NULL AUTO_INCREMENT,
    email      VARCHAR(255) NOT NULL,
    comment    TEXT NOT NULL,

    PRIMARY KEY (id)
);

CREATE TABLE services ( 
    id           INT NOT NULL AUTO_INCREMENT,
    type         VARCHAR(10) NOT NULL,
    privacy      VARCHAR(10) NOT NULL,
    service_name VARCHAR(255) NOT NULL,
    description  TEXT NOT NULL,
    code         TEXT NOT NULL,
    reference    VARCHAR(40),
    user_email   VARCHAR(50) NOT NULL,

    PRIMARY KEY (id)
);

CREATE TABLE auth_list ( 
    reference    VARCHAR(40) NOT NULL,
    token        VARCHAR(20) NOT NULL
);
CREATE TABLE users ( 
    id           INT NOT NULL AUTO_INCREMENT,
    name         VARCHAR(50) NOT NULL,
    email        VARCHAR(50) NOT NULL,
    password     VARCHAR(50) NOT NULL,
    token        VARCHAR(20) NOT NULL,

    PRIMARY KEY (id),
    UNIQUE KEY (email,token)
); 