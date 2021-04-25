<?php
class contientsIngredients{
 private $_idContientsIngredient;
 private $_idIngredient;
 private $_idRecette;
 private $_quantite;
      /* ****************Accesseurs***************** */
public function getIdContientsIngredient(){ 
 return $this->_idContientsIngredient;
}
public function setIdContientsIngredient($idContientsIngredient){ 
$this->_idContientsIngredient =$idContientsIngredient;
}
public function getIdIngredient(){ 
 return $this->_idIngredient;
}
public function setIdIngredient($idIngredient){ 
$this->_idIngredient =$idIngredient;
}
public function getIdRecette(){ 
 return $this->_idRecette;
}
public function setIdRecette($idRecette){ 
$this->_idRecette =$idRecette;
}
public function getQuantite(){ 
 return $this->_quantite;
}
public function setQuantite($quantite){ 
$this->_quantite =$quantite;
}
  /* ****************Constructeur***************** */
public function __construct(array $options = []){
        if (!empty($options)){ // empty : renvoi vrai si le tableau est vide
            $this->hydrate($options);
        }
        }

        public function hydrate($data){
            foreach ($data as $key => $value){
                $methode = 'set'.ucfirst($key); //ucfirst met la 1ere lettre en majuscule
                if (is_callable(([$this, $methode]))){ // is_callable verifie que la methode existe
                    $this->$methode($value);
                }
            }
        }
        }
