<?php
class IngredientsManager{
//******************************** select ****************************
public static function add(Ingredients $cl){
$db=DbConnect::getDb();
$requete = $db->prepare("INSERT INTO Ingredients(libelleIngredient,idUnite)VALUES (:libelleIngredient,:idUnite)");
$requete->bindValue(':libelleIngredient',$cl->getLibelleIngredient());
$requete->bindValue(':idUnite',$cl->getIdUnite());
$res = $requete->execute();
}
//******************************** UPDATE ****************************
public static function UPDATE(Ingredients $cl){
$db=DbConnect::getDb();
$requete = $db->prepare("UPDATE Ingredients SET idIngredient=:idIngredient,libelleIngredient=:libelleIngredient,idUnite=:idUnite WHERE idIngredient=:idIngredient");

$requete->bindValue(':idIngredient',$cl->getIdIngredient());
$requete->bindValue(':libelleIngredient',$cl->getLibelleIngredient());
$requete->bindValue(':idUnite',$cl->getIdUnite());
$res = $requete->execute();
}
//******************************** DELETE ****************************
 public static function delete(Ingredients $cl)
        {
            $db=DbConnect::getDb();
            $db->exec('DELETE FROM Ingredients WHERE idIngredient=' .$cl->getIdIngredient());
}
//******************************** FINDBYID ****************************
 public static function findById($id)
        {
            $db=DbConnect::getDb();
            $id=(int)$id;
            $requete = $db->query('SELECT * FROM Ingredients WHERE idIngredient =' .$id);
            $resultat = $requete->fetch(PDO::FETCH_ASSOC);
            if ($resultat!=false)
            {
                return new Ingredients($resultat);
            }
            else{
                return false;
            }
        }
//******************************** GETLISTE ****************************
 public static function getList()
        {
            $db=DbConnect::getDb();
            $requete = $db->query('SELECT * FROM Ingredients');
            while($donnees = $requete->fetch(PDO::FETCH_ASSOC))
            {
                if ( $donnees !=false)
                {
                    $listeIngredients[] = new Ingredients($donnees);
                }
            }
            return $listeIngredients;
        }
    
//******************************** FINDBYLIBELLE ***********************
public static function findByLibelle($libelleIngredient)
        {
            $db = DbConnect::getDb();
            $libelleIngredient = stristr ($libelleIngredient.";" , ";",true);
            $q = $db->query("SELECT * FROM Utilisateurs WHERE libelleIngredient='". $libelleIngredient ."'");
            $results = $q->fetch(PDO::FETCH_ASSOC);
            if ($results != false)
            {
                return new Ingredients($results);
            }
            else
            {
                return false;
            }
        }

}