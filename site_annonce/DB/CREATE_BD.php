<?php
$codesql = "CREATE DATABASE IF NOT EXISTS $db_name;
USE $db_name;
CREATE TABLE IF NOT EXISTS ANNONCE (
  idannonce INT AUTO_INCREMENT,
  titreannonce VARCHAR(300),
  texteannonce VARCHAR(1500),
  prix DOUBLE,
  dateannonce DATE,
  idcategorie INT,
  idutilisateur INT,
  lienImage VARCHAR(300),
  PRIMARY KEY (idannonce)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS CATEGORIE (
  idcategorie INT AUTO_INCREMENT,
  nomcategorie VARCHAR(100),
  PRIMARY KEY (idcategorie)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS FAVORIS (
  idannonce INT,
  idutilisateur INT,
  PRIMARY KEY (idannonce, idutilisateur)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS UTILISATEUR (
  idutilisateur INT AUTO_INCREMENT,
  nomutilisateur VARCHAR(100),
  prenomsutilisateur VARCHAR(100),
  email VARCHAR(100),
  mot_pass VARCHAR(1000),
  roles VARCHAR(100),
  PRIMARY KEY (idutilisateur)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE ANNONCE ADD FOREIGN KEY (idutilisateur) REFERENCES UTILISATEUR (idutilisateur);
ALTER TABLE ANNONCE ADD FOREIGN KEY (idcategorie) REFERENCES CATEGORIE (idcategorie);
ALTER TABLE FAVORIS ADD FOREIGN KEY (idutilisateur) REFERENCES UTILISATEUR (idutilisateur);
ALTER TABLE FAVORIS ADD FOREIGN KEY (idannonce) REFERENCES ANNONCE (idannonce);";
?>