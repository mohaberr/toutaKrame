<?php
class UsersManager{
//******************************** select ****************************
public static function add(Users $cl){
$db=DbConnect::getDb();
$requete = $db->prepare("INSERT INTO Users(pseudoUser,mdpUser,idRole)VALUES (:pseudoUser,:mdpUser,:idRole)");
$requete->bindValue(':pseudoUser',$cl->getPseudoUser());
$requete->bindValue(':mdpUser',$cl->getMdpUser());
$requete->bindValue(':idRole',$cl->getIdRole());
$res = $requete->execute();
}
//******************************** UPDATE ****************************
public static function UPDATE(Users $cl){
$db=DbConnect::getDb();
$requete = $db->prepare("UPDATE Users SET idUser=:idUser,pseudoUser=:pseudoUser,mdpUser=:mdpUser,idRole=:idRole WHERE idUser=:idUser");

$requete->bindValue(':idUser',$cl->getIdUser());
$requete->bindValue(':pseudoUser',$cl->getPseudoUser());
$requete->bindValue(':mdpUser',$cl->getMdpUser());
$requete->bindValue(':idRole',$cl->getIdRole());
$res = $requete->execute();
}
//******************************** DELETE ****************************
 public static function delete(Users $cl)
        {
            $db=DbConnect::getDb();
            $db->exec('DELETE FROM Users WHERE idUser=' .$cl->getIdUser());
}
//******************************** FINDBYID ****************************
 public static function findById($id)
        {
            $db=DbConnect::getDb();
            $id=(int)$id;
            $requete = $db->query('SELECT * FROM Users WHERE idUser =' .$id);
            $resultat = $requete->fetch(PDO::FETCH_ASSOC);
            if ($resultat!=false)
            {
                return new Users($resultat);
            }
            else{
                return false;
            }
        }
//******************************** GETLISTE ****************************
 public static function getList()
        {
            $db=DbConnect::getDb();
            $requete = $db->query('SELECT * FROM Users');
            while($donnees = $requete->fetch(PDO::FETCH_ASSOC))
            {
                if ( $donnees !=false)
                {
                    $listeUsers[] = new Users($donnees);
                }
            }
            return $listeUsers;
        }
    
    //******************************** findByPseudo ****************************
    public static function findByPseudo($pseudo)
    {
		$db = DbConnect::getDb();
        if (strstr($pseudo,";")=== false) // s'il n'y a pas de ; , je lance la requete
        {
            $q = $db->query("SELECT * FROM users WHERE pseudoUser ='" . $pseudo . "'");
            $results = $q->fetch(PDO::FETCH_ASSOC);
            if ($results != false)
            {
                return new users($results);
            }
            else
            {
                return false;
            }
        }
        else
        {
            // on arrete l'action  
            die();
            
        }
    }
}