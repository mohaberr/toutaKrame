
<?php

$mode = $_GET['mode'];
echo '<div class="demiPage colonne">';
echo '<div id="DivSousTitre">';

//en fonction du mode, on modifie l'entet du form
switch ($mode) {
    case "ajout":
        {
            echo '
	<form id="formulaire" method="post" action="index.php?codePage=actionRecette&mode=ajoutRecette">';
            // Quand le formulaire sera soumit par clic sur le bouton, les informations qu il contient seront stockées dans la variable $_POST, parce que la methode post a été sélectionnée
            break;
        }
    case "edit":
        {
            echo '
	<form id="formulaire" method="post" >';
            // Quand le formulaire sera soumit par clic sur le bouton, les informations qu il contient seront stockées dans la variable $_POST, parce que la methode post a été sélectionnée
            break;
        }
    case "modif":
        {
            echo '
	<form id="formulaire" method="post" action="index.php?codePage=actionRecette&mode=modifRecette">';
            // Quand le formulaire sera soumit par clic sur le bouton, les informations qu il contient seront stockées dans la variable $_POST, parce que la methode post a été sélectionnée
            break;
        }
    case "delete":
        {
            echo '
            <div class="erreur">Les produits dépendants vont être supprimés</div>
	<form id="formulaire" method="post" action="index.php?codePage=actionRecette&mode=delRecette">';
            // Quand le formulaire sera soumit par clic sur le bouton, les informations qu il contient seront stockées dans la variable $_POST, parce que la methode post a été sélectionnée
            break;
        }
}
if (isset($_GET['id'])) {
    $prod = RecettesManager::findById($_GET['id']);
}


// on crée les inputs du formulaire
// il faut que les name des input correspondent aux attributs de la class
// si on a les informations (cas edit, modif, supp) on les mets à jour
?>
<main>
    <div></div>
<div class=column>
<input type="hidden" name="idRecette" <?php if (isset($prod)) echo 'value="'.$prod->getIdRecette().'"'; ?> >
<label for="titreRecette">
titre :
</label>
<input type="text" name="titreRecette" <?php if (isset($prod))echo 'value ="'.$prod->getTitreRecette().'"';if (($mode=="detail")||($mode=="suppr")) echo "disabled";?>>
<label for="tempRecette">
temp Recette :
</label>
<input type="time" min="00:00" max="3:00" name="tempRecette" <?php if (isset($prod))echo 'value ="'.$prod->getTempRecette().'"';if (($mode=="detail")||($mode=="suppr")) echo "disabled";?>>
<label for="niveauDifRecette">
Difficulté à raté :
</label>
<input type="number" min="0" max="5" name="niveauDifRecette" <?php if (isset($prod))echo 'value ="'.$prod->getNiveauDifRecette().'"';if (($mode=="detail")||($mode=="suppr")) echo "disabled";?>>

<label for="ingredients">
    ingredient
</label>
<?php
      if (isset($prod)) {  
          if ($mode == "detail"||$mode == "suppr") {
            $disabled="disabled";
          }
          else {
            $disabled="";
          }
       $listeContenu=ContenusManager:: getByIdRecette($_GET['id']);
       foreach ($listeContenu as $contenu ) {
        echo "<select ".$disabled." name =idIngredient id=ingredient>";
        $listeIngredient= IngredientsManager::getList();
        foreach ($listeIngredient as $Ingredient) {
            $contenu->getIdIngredient()==$Ingredient->getIdIngredient()?$selected="selected":$selected="";
            
            echo "<option ".$selected." value ='".$Ingredient->getIdIngredient()."' >".$Ingredient->getLibelleIngredient()."</option>";
        }
        echo "</select>";
       }
      }
      else {
          echo "<select name =idIngredient id=ingredient>";
         $listeIngredient= IngredientsManager::getList();
         foreach ($listeIngredient as $Ingredient) {
             echo "<option value ='".$Ingredient->getIdIngredient()."' >".$Ingredient->getLibelleIngredient()."</option>";
         }
         echo "</select>";
     }
?>




<label for="preparationRecette">
preparation de la Recette :
</label>
<input type="text" name="preparationRecette" <?php if (isset($prod))echo 'value ="'.$prod->getPreparationRecette().'"';if (($mode=="detail")||($mode=="suppr")) echo "disabled";?>>

                       

<?php 
// en fonction du mode, on affiche les boutons utils
	switch ($mode) {
		case "ajout":
			{
				echo '<div class="ligneDetail"><input type="submit" value="Ajout" class=" bouton"/>'; break;
			}
		case "modif":
			{
				echo '<div class="ligneDetail"><input type="submit" value="Modif" class="bouton"/>'; break;
			}
		case "delete":
			{
				echo '<div class="ligneDetail"><input type="submit" value="Suppr" class=" bouton" />'; break;
			}
        
        default:
        {
            echo '<div class="ligneDetail">';
        }
    }
// dans tous les cas, on met le bouton annuler
    ?>
    <a href="index.php?codePage=listeRecettes" class=" crudBtn crudBtnRetour">Annuler</a>
    
</div>

<div></div>
</main>