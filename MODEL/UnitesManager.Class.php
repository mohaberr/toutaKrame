<?php
class UnitesManager{
//******************************** select ****************************
public static function add(Unites $cl){
$db=DbConnect::getDb();
$requete = $db->prepare("INSERT INTO Unites(libelleUnite)VALUES (:libelleUnite)");
$requete->bindValue(':libelleUnite',$cl->getLibelleUnite());
$res = $requete->execute();
}
//******************************** UPDATE ****************************
public static function UPDATE(Unites $cl){
$db=DbConnect::getDb();
$requete = $db->prepare("UPDATE Unites SET idUnite=:idUnite,libelleUnite=:libelleUnite WHERE idUnite=:idUnite");

$requete->bindValue(':idUnite',$cl->getIdUnite());
$requete->bindValue(':libelleUnite',$cl->getLibelleUnite());
$res = $requete->execute();
}
//******************************** DELETE ****************************
 public static function delete(Unites $cl)
        {
            $db=DbConnect::getDb();
            $db->exec('DELETE FROM Unites WHERE idUnite=' .$cl->getIdUnite());
}
//******************************** FINDBYID ****************************
 public static function findById($id)
        {
            $db=DbConnect::getDb();
            $id=(int)$id;
            $requete = $db->query('SELECT * FROM Unites WHERE idUnite =' .$id);
            $resultat = $requete->fetch(PDO::FETCH_ASSOC);
            if ($resultat!=false)
            {
                return new Unites($resultat);
            }
            else{
                return false;
            }
        }
//******************************** GETLISTE ****************************
 public static function getList()
        {
            $db=DbConnect::getDb();
            $requete = $db->query('SELECT * FROM Unites');
            while($donnees = $requete->fetch(PDO::FETCH_ASSOC))
            {
                if ( $donnees !=false)
                {
                    $listeUnites[] = new Unites($donnees);
                }
            }
            return $listeUnites;
        }
    }
