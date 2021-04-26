#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------
DROP DATABASE if EXISTS toutaKrame;
CREATE DATABASE IF NOT EXISTS toutaKrame ;
USE toutaKrame;

#------------------------------------------------------------
# Table: Roles
#------------------------------------------------------------

DROP TABLE IF EXISTS Roles;
CREATE TABLE Roles(
        idRole      Int  Auto_increment  NOT NULL PRIMARY KEY ,
        libelleRole Varchar (50) NOT NULL
)ENGINE=InnoDB;

#------------------------------------------------------------
# Table: Users
#------------------------------------------------------------

DROP TABLE IF EXISTS Users;
CREATE TABLE Users(
        idUser     Int  Auto_increment  NOT NULL PRIMARY KEY ,
        pseudoUser Varchar (50) NOT NULL ,
        mdpUser    Varchar (50) NOT NULL ,
        idRole     Int NOT NULL

)ENGINE=InnoDB;

#------------------------------------------------------------
# Table: Recettes
#------------------------------------------------------------

DROP TABLE IF EXISTS Recettes;
CREATE TABLE Recettes(
        idRecette          Int  Auto_increment  NOT NULL PRIMARY KEY,
        titreRecette       Varchar (50) NOT NULL ,
        tempRecette        Time NOT NULL ,
        niveauDifRecette   Int NOT NULL ,
        imageRecette       Varchar (50) NOT NULL ,
        preparationRecette Varchar (1000) NOT NULL ,
        idUser             Int NOT NULL

)ENGINE=InnoDB;

#------------------------------------------------------------
# Table: Unites
#------------------------------------------------------------

DROP TABLE IF EXISTS Unites;
CREATE TABLE Unites(
        idUnite      Int  Auto_increment  NOT NULL PRIMARY KEY,
        libelleUnite Varchar (10) NOT NULL
)ENGINE=InnoDB;

#------------------------------------------------------------
# Table: Ingredients
#------------------------------------------------------------

DROP TABLE IF EXISTS Ingredients;
CREATE TABLE Ingredients(
        idIngredient      Int  Auto_increment  NOT NULL PRIMARY KEY,
        libelleIngredient Varchar (50) NOT NULL ,
        quantite          Float NOT NULL ,
        idRecette         Int NOT NULL ,
        idUnite           Int NOT NULL
)ENGINE=InnoDB;

 alter Table Ingredients add 
 	CONSTRAINT Ingredients_Recettes_FK FOREIGN KEY (idRecette) REFERENCES Recettes(idRecette)
       ,add CONSTRAINT Ingredients_Unites0_FK FOREIGN KEY (idUnite) REFERENCES Unites(idUnite);

 alter Table Recettes add 
    	CONSTRAINT Recettes_users_FK FOREIGN KEY (idUser) REFERENCES Users(idUser);
alter Table Users add 
	CONSTRAINT Users_Roles_FK FOREIGN KEY (idRole) REFERENCES Roles(idRole);
        