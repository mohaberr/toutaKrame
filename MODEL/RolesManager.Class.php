<?php
class RolesManager{
//******************************** select ****************************
public static function add(Roles $cl){
$db=DbConnect::getDb();
$requete = $db->prepare("INSERT INTO Roles(libelleRole)VALUES (:libelleRole)");
$requete->bindValue(':libelleRole',$cl->getLibelleRole());
$res = $requete->execute();
}
//******************************** UPDATE ****************************
public static function UPDATE(Roles $cl){
$db=DbConnect::getDb();
$requete = $db->prepare("UPDATE Roles SET idRole=:idRole,libelleRole=:libelleRole WHERE idRole=:idRole");

$requete->bindValue(':idRole',$cl->getIdRole());
$requete->bindValue(':libelleRole',$cl->getLibelleRole());
$res = $requete->execute();
}
//******************************** DELETE ****************************
 public static function delete(Roles $cl)
        {
            $db=DbConnect::getDb();
            $db->exec('DELETE FROM Roles WHERE idRole=' .$cl->getIdRole());
}
//******************************** FINDBYID ****************************
 public static function findById($id)
        {
            $db=DbConnect::getDb();
            $id=(int)$id;
            $requete = $db->query('SELECT * FROM Roles WHERE idRole =' .$id);
            $resultat = $requete->fetch(PDO::FETCH_ASSOC);
            if ($resultat!=false)
            {
                return new Roles($resultat);
            }
            else{
                return false;
            }
        }
//******************************** GETLISTE ****************************
 public static function getList()
        {
            $db=DbConnect::getDb();
            $requete = $db->query('SELECT * FROM Roles');
            while($donnees = $requete->fetch(PDO::FETCH_ASSOC))
            {
                if ( $donnees !=false)
                {
                    $listeRoles[] = new Roles($donnees);
                }
            }
            return $listeRoles;
        }
    }
