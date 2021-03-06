<?php
class Ingredients{
 private $_idIngredient;
 private $_libelleIngredient;
 private $_idUnite;
      /* ****************Accesseurs***************** */
public function getIdIngredient(){ 
 return $this->_idIngredient;
}
public function setIdIngredient($idIngredient){ 
$this->_idIngredient =$idIngredient;
}
public function getLibelleIngredient(){ 
 return $this->_libelleIngredient;
}
public function setLibelleIngredient($libelleIngredient){ 
$this->_libelleIngredient =$libelleIngredient;
}
public function getIdUnite(){ 
 return $this->_idUnite;
}
public function setIdUnite($idUnite){ 
$this->_idUnite =$idUnite;
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
