<?php
class Users{
 private $_idUser;
 private $_pseudoUser;
 private $_mdpUser;
 private $_idRole;
      /* ****************Accesseurs***************** */
public function getIdUser(){ 
 return $this->_idUser;
}
public function setIdUser($idUser){ 
$this->_idUser =$idUser;
}
public function getPseudoUser(){ 
 return $this->_pseudoUser;
}
public function setPseudoUser($pseudoUser){ 
$this->_pseudoUser =$pseudoUser;
}
public function getMdpUser(){ 
 return $this->_mdpUser;
}
public function setMdpUser($mdpUser){ 
$this->_mdpUser =$mdpUser;
}
public function getIdRole(){ 
 return $this->_idRole;
}
public function setIdRole($idRole){ 
$this->_idRole =$idRole;
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
