<main>
    <div class="bigSpaceHorizon"></div>
    <div>
        <div></div>
        <div>
            <?php
            echo '<form action="index.php?codePage=actionIngredient&id='.$_GET['id'].'" method="post">';
            ?>
                <div class="column">
                    <div>
                        <div class="centre">
                            <label for="libelleIngredient">Ingrédient :</label>
                        </div>
                        <div>
                            <input type="text" name="libelleIngredient" required/>
                        </div>
                    </div>
                    <div>
                        <div class="centre">
                            <label for="idUnité">unité de mesure :</label>
                        </div>
                        <div>
                            <select name="idUnite" id="unité">
                                <option value=null>sans unité</option>
                                <?php
                                    $listeUnite=UnitesManager::getList();
                                    foreach($listeUnite as $unite){
                                        echo'<option value='.$unite->getIdUnite().'>'.$unite->getLibelleUnite().'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div>
                        <div>
                            <?php echo'<a href="index.php?codePage=recette&mode=modif&id='.$_GET['id'].'">Annuler</a>';?>
                        </div>
                        <div>
                            <button type="submit"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div></div>
    </div>
    <div class="bigSpaceHorizon"></div>
</main>