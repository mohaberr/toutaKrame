<main>
    <div>
        <div></div>
        <div class="column">
            <?php
                if (isset($_SESSION['user'])){
                    echo '<div class="spaceHorizon"></div>
                    <a href="index.php?codePage=formRecette&mod=ajout"> <i class="fas fa-plus"></i></a>';
                }
                $liste=RecettesManager::getList();
                foreach($liste as $recette){
                    $etoile="";
                    for ($i=0;$i<5;$i++){
                        $i<$recette->getNiveauDifRecette()?$etoile.='<i class="fas fa-star"></i>':$etoile.='<i class="far fa-star"></i>';
                    }
                    file_exists("IMG/".$recette->getImageRecette())?$url="IMG/".$recette->getImageRecette():$url="IMG/default.png";

                    echo'
                    <div class="spaceHorizon"></div>
                    <article>
                        <div class="titre unEmCinq">'.$recette->getTitreRecette().'</div>
                        <div class="spaceHorizon"></div>
                        <div> Difficulté à raté :'.$etoile.'</div>
                        <div class="spaceHorizon"></div>
                        <div>
                            <div class="mini"></div>
                            <div><img src="'.$url.'" alt="image de'.$recette->getTitreRecette().'"></div>
                            <div class="mini"></div>
                            <div class="demi column">
                            <a href="index.php?codePage=formRecette&mod=detail"> <i class="fas fa-search"></i></a>';
                            if (isset($_SESSION['user'])&&($_SESSION['user']->getIdRole()==1||$_SESSION['user']->getIdUser()==$recette->getIdUser())){
                                echo'
                                <div class="spaceHorizon"></div>
                                <a href="index.php?codePage=formRecette&mod=modif"><i class="fas fa-edit"></i></a>
                                <div class="spaceHorizon"></div>
                                <a href="index.php?codePage=formRecette&mod=suppr"><i class="fas fa-trash"></i></a>';
                            }

                    echo '
                            </div>
                            <div class="mini"></div>
                        </div>
                        <div class="spaceHorizon"></div>
                    </article>';
                }
                
            ?>
        </div>
        <div></div>
    </div>
    <div class="spaceHorizon"></div>
</main>