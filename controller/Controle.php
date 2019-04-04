<?php

namespace Atividade\Controllers;

class controle {

    public function __construct() {
        $this->handleRequest();
    }
    
    public function handleRequest (){
        require 'view/mostra.php';
    }
}