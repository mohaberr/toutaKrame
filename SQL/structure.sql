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
        titreRecette       Varchar (50) ,
        tempRecette        Time  ,
        niveauDifRecette   Int  ,
        imageRecette       Varchar (50)  ,
        preparationRecette Varchar (1000)  ,
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
        idUnite           Int NOT NULL
)ENGINE=InnoDB;

#------------------------------------------------------------
# Table: contenus
#------------------------------------------------------------

CREATE TABLE contenus(
        idContenu int auto_increment not null primary key ,
        idIngredient Int NOT NULL ,
        idRecette    Int NOT NULL ,
        quantite     Float NOT NULL

)ENGINE=InnoDB;


 alter Table Ingredients 
       add CONSTRAINT Ingredients_Unites0_FK FOREIGN KEY (idUnite) REFERENCES Unites(idUnite);

 alter Table Recettes add 
    	CONSTRAINT Recettes_users_FK FOREIGN KEY (idUser) REFERENCES Users(idUser);
alter Table Users add 
	CONSTRAINT Users_Roles_FK FOREIGN KEY (idRole) REFERENCES Roles(idRole);
        
 alter Table contenus add 
        CONSTRAINT contenus_Ingredients_FK FOREIGN KEY (idIngredient) REFERENCES Ingredients(idIngredient),
	add CONSTRAINT contenus_Recettes0_FK FOREIGN KEY (idRecette) REFERENCES Recettes(idRecette);

        