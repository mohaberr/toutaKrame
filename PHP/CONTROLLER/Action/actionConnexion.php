<?php
$user=UsersManager::findByPseudo($_POST["pseudo"]);

if($user){

    if($_POST["mdp"] == $user->getMdpUser()){
        $_SESSION['user']=$user;
        echo "connexion réussit";
        header("refresh:2;url=index.php?codePage=default");
    }else{
        echo "mot de passe incorrecte";
        header("refresh:2;url=index.php?codePage=Connexion");
    }
}else{
    echo "pseudo inexistant";
    header("refresh:2;url=index.php?codePage=Connexion");
}