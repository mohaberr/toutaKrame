<main>
    <div class="bigSpaceHorizon"></div>
    <div>
        <div></div>
        <div>
            <form action="index.php?codePage=actionIngredient" method="GET">
                <div class="column">
                    <div>
                        <div class="centre">
                            <label for="ingredient">Choix d'ingerdient</label>
                        </div>
                        <div>
                        <select name="ingredient" id="">
                                  <?php $listeIngredient = ContenusManager::getByIdRecette(2);
                                //  var_dump($listeIngredient);
                                   foreach ($listeIngredient as $key) {
                                          $libelleIng= IngredientsManager:: findById ($key->getIdIngredient());
                                      echo  "<option>". $libelleIng->getLibelleIngredient()."</option>";
                                                                            
                                   } ;
                                        
                                   ?>
                            </select>
                        </div>
                    </div>
                    <div>
                        <div>
                            <a href="index.php?codePage=default">Annuler</a>    
                        </div>
                        <div>
                            <button type="submit">Confirmation</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div></div>
    </div>
    <div class="bigSpaceHorizon"></div>
</main>