<?php
    // $truc=ContenusManager::findById(1);
    // var_dump($truc);
    // ContenusManager::add($truc);
    // $truc->setQuantite(200);
    // ContenusManager::UPDATE($truc);
    // $list=ContenusManager::getList();
    // var_dump($list);
    // ContenusManager::delete($truc);

    $truc=usersManager::findById(2);
    // var_dump($truc);
    // usersManager::add($truc);
    // $truc->setMdpUser(200);
    // usersManager::UPDATE($truc);
    // $list=usersManager::getList();
    // var_dump($list);
    // usersManager::delete($truc);
   $var=usersManager::findByPseudo($truc->getPseudoUser());
   var_dump($var);
  
    // $list=ContenusManager::getByIdRecette(2);
    // var_dump($list);
    // ContenusManager::delete($truc);

    
?>