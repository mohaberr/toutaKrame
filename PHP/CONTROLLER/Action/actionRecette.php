<?php

$erreur =false;
// var_dump($_POST);
$p = new Recettes($_POST);
// var_dump($p);
switch ($_GET['mode']) {
    case "ajoutCategorie":
        {
            RecettesManager::add($p);
            break;
        }
    case "modifCategorie":
        {
            RecettesManager::update($p);
            break;
        }
    case "delCategorie":
        {
           $listeRecettes= ProduitsManager::getListByRecette($p->getIdRecette());
           /**** Technique informative */
        //    if (count($listeProduit)>0)
        //    {
        //        echo 'Il reste des produits';
        //        $erreur=true;
               
        //    }
        //    else{
        //     RecettesManager::delete($p);
        //    }

           /**** Technique de suppression en cascade */
            foreach ($listeRecettes as $uneRecette)
            {
                RecettesManager::delete($uneRecette);
            }
            RecettesManager::delete($p);
            break;
        }
}

if (!$erreur){  // si pas d'erreur
    header("location:index.php?codePage=listeRecttes");   //redirection directe
}
else{
    header( "refresh:3;url=index.php?codePage=listeRecttes" );    // on attend 3 secondes avant la redirection
}?>