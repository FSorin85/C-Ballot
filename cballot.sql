CREATE DATABASE IF NOT EXISTS cballot;

use cballot

CREATE TABLE user (
  iduser BIGINT  NOT NULL AUTO_INCREMENT,
  firstname VARCHAR(30)  NOT NULL ,
  lastname VARCHAR(30)  NOT NULL ,
  password VARCHAR(128)  NOT NULL ,
  email VARCHAR(30)  NOT NULL ,
  PRIMARY KEY (iduser),
  CONSTRAINT uc_person_email UNIQUE (email)
);

CREATE TABLE voter (
  idvoter BIGINT NOT NULL AUTO_INCREMENT,
  emailvoter VARCHAR(30) NOT NULL,
  iduser BIGINT NOT NULL,
  PRIMARY KEY (idvoter),
  FOREIGN KEY (iduser) REFERENCES user(iduser)
);

CREATE TABLE sondage (
  idsondage BIGINT NOT NULL AUTO_INCREMENT,
  questionsondage VARCHAR(128) NOT NULL,
  choix1sondage VARCHAR(128) NOT NULL,
  choix2sondage VARCHAR(128) NOT NULL,
  choix3sondage VARCHAR(128) NOT NULL,
  iduser BIGINT  NOT NULL,
  PRIMARY KEY (idsondage),
  FOREIGN KEY (iduser) REFERENCES user(iduser)
);

CREATE TABLE retention (
  idretention BIGINT AUTO_INCREMENT NOT NULL,
  email VARCHAR(30)  NOT NULL,
  firstname VARCHAR(30)  NOT NULL,
  lastname VARCHAR(30)  NOT NULL,
  PRIMARY KEY (idretention)
);
