<?php
class ContenusManager{
//******************************** select ****************************
public static function add(Contenus $cl){
$db=DbConnect::getDb();
$requete = $db->prepare("INSERT INTO Contenus(idIngredient,idRecette,quantite)VALUES (:idIngredient,:idRecette,:quantite)");
$requete->bindValue(':idIngredient',$cl->getIdIngredient());
$requete->bindValue(':idRecette',$cl->getIdRecette());
$requete->bindValue(':quantite',$cl->getQuantite());
$res = $requete->execute();
}
//******************************** UPDATE ****************************
public static function UPDATE(Contenus $cl){
$db=DbConnect::getDb();
$requete = $db->prepare("UPDATE Contenus SET idContenu=:idContenu,idIngredient=:idIngredient,idRecette=:idRecette,quantite=:quantite WHERE idContenu=:idContenu");

$requete->bindValue(':idContenu',$cl->getIdContenu());
$requete->bindValue(':idIngredient',$cl->getIdIngredient());
$requete->bindValue(':idRecette',$cl->getIdRecette());
$requete->bindValue(':quantite',$cl->getQuantite());
$res = $requete->execute();
}
//******************************** DELETE ****************************
 public static function delete(Contenus $cl)
        {
            $db=DbConnect::getDb();
            $db->exec('DELETE FROM Contenus WHERE idContenu=' .$cl->getIdContenu());
}
//******************************** FINDBYID ****************************
 public static function findById($id)
        {
            $db=DbConnect::getDb();
            $id=(int)$id;
            $requete = $db->query('SELECT * FROM Contenus WHERE idContenu =' .$id);
            $resultat = $requete->fetch(PDO::FETCH_ASSOC);
            if ($resultat!=false)
            {
                return new Contenus($resultat);
            }
            else{
                return false;
            }
        }
//******************************** GETLISTE ****************************
 public static function getList()
        {
            $db=DbConnect::getDb();
            $requete = $db->query('SELECT * FROM Contenus');
            $listeContenus=[];
            while($donnees = $requete->fetch(PDO::FETCH_ASSOC))
            {
                if ( $donnees !=false)
                {
                    $listeContenus[] = new Contenus($donnees);
                }
            }
            return $listeContenus;
        }
//******************************** GETBYIDRECETTE *********************
public static function getByIdRecette($id)
        {
            $db=DbConnect::getDb();
            $id=(int)$id;
            $listeContenus=[];
            $requete = $db->query('SELECT * FROM Contenus WHERE idRecette =' .$id);
            while($donnees = $requete->fetch(PDO::FETCH_ASSOC))
            {
                if ( $donnees !=false)
                {
                    $listeContenus[] = new Contenus($donnees);
                }
            }
            return $listeContenus;
        }

}
