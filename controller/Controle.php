<?php

namespace Atividade\Controllers;

class controle {

    const NOVO_CONTROLLER = 'novoControler';

    public function __construct() {
        echo 'construct';
    }
    
    public function handleRequest ($page){
        
        obj_get_clean ();
        header ('location: index.php?pagina='.$page);
        
        exit();
    }
}