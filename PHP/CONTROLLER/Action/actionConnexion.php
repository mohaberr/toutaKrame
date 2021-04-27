<main>
<?php
$user=UsersManager::findByPseudo($_POST["pseudo"]);

if($user){

    if($_POST["mdp"] == $user->getMdpUser()){
        $_SESSION['user']=$user;
        echo "<h1>connexion réussit</h1>";
        header("refresh:2;url=index.php?codePage=default");
    }else{
        echo "<h1>mot de passe incorrecte</h1>";
        header("refresh:2;url=index.php?codePage=Connexion");
    }
}else{
    echo "<h1>pseudo inexistant</h1>";
    header("refresh:2;url=index.php?codePage=Connexion");
}
?>
<div class="bigSpaceHorizon"></div>
</main>