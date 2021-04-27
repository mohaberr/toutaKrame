<main>
<?php
$ingredient=new Ingredients($_POST);
if(!IngredientsManager::findByLibelle($ingredient->getLibelleIngredient())){
    if($ingredient->getIdUnite()=="null")$ingredient->setIdUnite(null);
    IngredientsManager::add($ingredient);
    header("location:index.php?codePage=ingredients".$_GET['id']);
}else{
    echo'<h1> cet ingrédient existe déjà</h1>';
    header("refresh:2;url=index.php?codePage=ingredients&id=".$_GET['id']);
}
?>
</main>