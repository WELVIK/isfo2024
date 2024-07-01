#CREATE DATABASE gestionstagiaire;
USE gestionstagiaire;

#CREATE TABLE administrateurs (
    #id INT AUTO_INCREMENT PRIMARY KEY,
    #nom VARCHAR(50) NOT NULL,
    #prenom VARCHAR(50) NOT NULL,
    #login VARCHAR(50) NOT NULL UNIQUE,
    #password VARCHAR(255) NOT NULL
#);

#CREATE TABLE filieres (
    #id INT AUTO_INCREMENT PRIMARY KEY,
    #intitule VARCHAR(100) NOT NULL UNIQUE
#);

CREATE TABLE stagiaires (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    filiere VARCHAR(100) NOT NULL,
    image VARCHAR(255)
);

-- Insertion d'un administrateur par défaut
INSERT INTO administrateurs (nom, prenom, login, password) VALUES ('Admin', 'User', 'admin', 'adminpass');

-- Insertion de quelques filières par défaut
INSERT INTO filieres (intitule) VALUES ('Informatique');
INSERT INTO filieres (intitule) VALUES ('Gestion');
INSERT INTO filieres (intitule) VALUES ('Marketing');
