<?php
class Unites{
 private $_idUnite;
 private $_libelleUnite;
      /* ****************Accesseurs***************** */
public function getIdUnite(){ 
 return $this->_idUnite;
}
public function setIdUnite($idUnite){ 
$this->_idUnite =$idUnite;
}
public function getLibelleUnite(){ 
 return $this->_libelleUnite;
}
public function setLibelleUnite($libelleUnite){ 
$this->_libelleUnite =$libelleUnite;
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
