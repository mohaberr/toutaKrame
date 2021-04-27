<header>
    <div class="spaceHorizon"></div>
    <div>
        <div class="mini"></div>
        <div class="titre">
            ToutaKramé
        </div>
        <div class="mini">
            <?php
            if($titre!="formulaireDeConnexion"){
                if(isset($_SESSION['user'])){
                    echo '<a href="index.php?codePage=Deconnexion">Deconnexion</a>';
                }else{
                    echo '<a href="index.php?codePage=Connexion">Connexion</a>
                    <a href="index.php?codePage=inscription">Inscription</a>';
                }
            }
            ?>
        </div>
    </div>
    <div class="spaceHorizon"></div>
</header>