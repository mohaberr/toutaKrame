<?php
class contientsIngredientsManager{
//******************************** select ****************************
public static function add(contientsIngredients $cl){
$db=DbConnect::getDb();
$requete = $db->prepare("INSERT INTO contientsIngredients(idIngredient,idRecette,quantite)VALUES (:idIngredient,:idRecette,:quantite)");
$requete->bindValue(':idIngredient',$cl->getIdIngredient());
$requete->bindValue(':idRecette',$cl->getIdRecette());
$requete->bindValue(':quantite',$cl->getQuantite());
$res = $requete->execute();
}
//******************************** UPDATE ****************************
public static function UPDATE(contientsIngredients $cl){
$db=DbConnect::getDb();
$requete = $db->prepare("UPDATE contientsIngredients SET idContientsIngredient=:idContientsIngredient,idIngredient=:idIngredient,idRecette=:idRecette,quantite=:quantite WHERE idContientsIngredient=:idContientsIngredient");

$requete->bindValue(':idContientsIngredient',$cl->getIdContientsIngredient());
$requete->bindValue(':idIngredient',$cl->getIdIngredient());
$requete->bindValue(':idRecette',$cl->getIdRecette());
$requete->bindValue(':quantite',$cl->getQuantite());
$res = $requete->execute();
}
//******************************** DELETE ****************************
 public static function delete(contientsIngredients $cl)
        {
            $db=DbConnect::getDb();
            $db->exec('DELETE FROM contientsIngredients WHERE idContientsIngredient=' .$cl->getIdContientsIngredient());
}
//******************************** FINDBYID ****************************
 public static function findById($id)
        {
            $db=DbConnect::getDb();
            $id=(int)$id;
            $requete = $db->query('SELECT * FROM contientsIngredients WHERE idContientsIngredient =' .$id);
            $resultat = $requete->fetch(PDO::FETCH_ASSOC);
            if ($resultat!=false)
            {
                return new contientsIngredients($resultat);
            }
            else{
                return false;
            }
        }
//******************************** GETLISTE ****************************
 public static function getList()
        {
            $db=DbConnect::getDb();
            $requete = $db->query('SELECT * FROM contientsIngredients');
            while($donnees = $requete->fetch(PDO::FETCH_ASSOC))
            {
                if ( $donnees !=false)
                {
                    $listeContientsIngredients[] = new contientsIngredients($donnees);
                }
            }
            return $listeContientsIngredients;
        }
    }
