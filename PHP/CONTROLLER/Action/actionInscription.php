<?php
var_dump ($_POST);
if (($_POST["mdp"])==($_POST["confirmation"])) {
     // recherche si le pseudo existe
     $user = UsersManager::findByPseudo($_POST['pseudo']);
     if ($user == false)
     {
         $us = new users($_POST);
         //encodage du mot de passe
        //  $us-> setMdpUser(crypte($us->getMdpUser()));
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