<header>
    <div class="spaceHorizon"></div>
    <div>
        <div class="mini"></div>
        <div class="titre">
            ToutaKramé
        </div>
        <div class="mini">
            <?php
            if($titre!="Erreur"){
                if(isset($_SESSION['user'])){
                    echo '<a href="index.php?codePage=Deconnexion">Deconnexion</a>';
                }else{
                    echo '<a href="index.php?codePage=Connexion">Connexion</a>';
                }
            }
            ?>
        </div>
    </div>
    <div class="spaceHorizon"></div>
</header>