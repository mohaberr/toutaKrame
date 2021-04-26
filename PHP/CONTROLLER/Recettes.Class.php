<?php
class Recettes{
 private $_idRecette;
 private $_titreRecette;
 private $_tempRecette;
 private $_niveauDifRecette;
 private $_imageRecette;
 private $_preparationRecette;
 private $_idUser;
      /* ****************Accesseurs***************** */
public function getIdRecette(){ 
 return $this->_idRecette;
}
public function setIdRecette($idRecette){ 
$this->_idRecette =$idRecette;
}
public function getTitreRecette(){ 
 return $this->_titreRecette;
}
public function setTitreRecette($titreRecette){ 
$this->_titreRecette =$titreRecette;
}
public function getTempRecette(){ 
 return $this->_tempRecette;
}
public function setTempRecette($tempRecette){ 
$this->_tempRecette =$tempRecette;
}
public function getNiveauDifRecette(){ 
 return $this->_niveauDifRecette;
}
public function setNiveauDifRecette($niveauDifRecette){ 
$this->_niveauDifRecette =$niveauDifRecette;
}
public function getImageRecette(){ 
 return $this->_imageRecette;
}
public function setImageRecette($imageRecette){ 
$this->_imageRecette =$imageRecette;
}
public function getPreparationRecette(){ 
 return $this->_preparationRecette;
}
public function setPreparationRecette($preparationRecette){ 
$this->_preparationRecette =$preparationRecette;
}
public function getIdUser(){ 
 return $this->_idUser;
}
public function setIdUser($idUser){ 
$this->_idUser =$idUser;
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
