<?php
class RecettesManager{
//******************************** select ****************************
public static function add(Recettes $cl){
$db=DbConnect::getDb();
$requete = $db->prepare("INSERT INTO Recettes(titreRecette,tempRecette,niveauDifRecette,imageRecette,preparationRecette,idUser)VALUES (:titreRecette,:tempRecette,:niveauDifRecette,:imageRecette,:preparationRecette,:idUser)");
$requete->bindValue(':titreRecette',$cl->getTitreRecette());
$requete->bindValue(':tempRecette',$cl->getTempRecette());
$requete->bindValue(':niveauDifRecette',$cl->getNiveauDifRecette());
$requete->bindValue(':imageRecette',$cl->getImageRecette());
$requete->bindValue(':preparationRecette',$cl->getPreparationRecette());
$requete->bindValue(':idUser',$cl->getIdUser());
$res = $requete->execute();
}
//******************************** UPDATE ****************************
public static function UPDATE(Recettes $cl){
$db=DbConnect::getDb();
$requete = $db->prepare("UPDATE Recettes SET idRecette=:idRecette,titreRecette=:titreRecette,tempRecette=:tempRecette,niveauDifRecette=:niveauDifRecette,imageRecette=:imageRecette,preparationRecette=:preparationRecette,idUser=:idUser WHERE idRecette=:idRecette");

$requete->bindValue(':idRecette',$cl->getIdRecette());
$requete->bindValue(':titreRecette',$cl->getTitreRecette());
$requete->bindValue(':tempRecette',$cl->getTempRecette());
$requete->bindValue(':niveauDifRecette',$cl->getNiveauDifRecette());
$requete->bindValue(':imageRecette',$cl->getImageRecette());
$requete->bindValue(':preparationRecette',$cl->getPreparationRecette());
$requete->bindValue(':idUser',$cl->getIdUser());
$res = $requete->execute();
}
//******************************** DELETE ****************************
 public static function delete(Recettes $cl)
        {
            $db=DbConnect::getDb();
            $db->exec('DELETE FROM Recettes WHERE idRecette=' .$cl->getIdRecette());
}
//******************************** FINDBYID ****************************
 public static function findById($id)
        {
            $db=DbConnect::getDb();
            $id=(int)$id;
            $requete = $db->query('SELECT * FROM Recettes WHERE idRecette =' .$id);
            $resultat = $requete->fetch(PDO::FETCH_ASSOC);
            if ($resultat!=false)
            {
                return new Recettes($resultat);
            }
            else{
                return false;
            }
        }
//******************************** GETLISTE ****************************
 public static function getList()
        {
            $db=DbConnect::getDb();
            $requete = $db->query('SELECT * FROM Recettes');
            while($donnees = $requete->fetch(PDO::FETCH_ASSOC))
            {
                if ( $donnees !=false)
                {
                    $listeRecettes[] = new Recettes($donnees);
                }
            }
            return $listeRecettes;
        }
    }
