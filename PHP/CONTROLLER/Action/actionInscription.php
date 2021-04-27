<main>
<?php
// var_dump ($_POST);
if (($_POST["mdpUser"])==($_POST["confirmation"])) {
     // recherche si le pseudo existe
     $user = UsersManager::findByPseudo($_POST['pseudoUser']);
     if ($user == false)
     {
         $us = new users($_POST);
        //  encodage du mot de passe
        //  $us-> setMdpUser(crypte($us->getMdpUser()));
        $us->setIdRole(2);
        // var_dump($us);
        UsersManager::add($us);
         echo "<h1> inscription reussit </h1>";
         $_SESSION['user']=$us;
         echo "<h1>connexion réussit</h1>";
         header("refresh:2;url=index.php?codePage=default");
     }
     else
     {
         echo "<h1>le pseudo existe deja</h1>";
         header("refresh:2;url=index.php?codePage=inscription");
     }
 }
 else
 {
     echo "<h1>la confirmation ne correspond pas au mot de passe</h1>";
     header("refresh:2;url=index.php?codePage=inscription");
 }

?>
<div class="bigSpaceHorizon"></div>
</main>