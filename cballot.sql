CREATE DATABASE IF NOT EXISTS cballot;

use cballot

CREATE TABLE user (
  iduser BIGINT  NOT NULL AUTO_INCREMENT,
  firstname VARCHAR(30)  NOT NULL ,
  lastname VARCHAR(30)  NOT NULL ,
  password VARCHAR(128)  NOT NULL ,
  email VARCHAR(30)  NOT NULL ,
  PRIMARY KEY (iduser)
);

CREATE TABLE voter (
  idvoter BIGINT NOT NULL AUTO_INCREMENT,
  emailvoter VARCHAR(30) NOT NULL,
  iduser BIGINT NOT NULL,
  PRIMARY KEY (idvoter),
  FOREIGN KEY (iduser) REFERENCES user(iduser)
);
