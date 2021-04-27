<?php
var_dump ($_POST);
if (($_POST["mdpUser"])==($_POST["confirmation"])) {
     // recherche si le pseudo existe
     $user = UsersManager::findByPseudo($_POST['pseudoUser']);
     if ($user == false)
     {
         $us = new users($_POST);
        //  encodage du mot de passe
        //  $us-> setMdpUser(crypte($us->getMdpUser()));
        $us->setIdRole(1);
        var_dump($us);
        UsersManager::add($us);
         echo " inscription reussit ";
     }
     else
     {
         echo "le pseudo existe deja";
     }
 }
 else
 {
     echo "la confirmation ne correspond pas au mot de passe";
 }


?>