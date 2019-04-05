<?php

namespace Atividade\Controllers;

class controle {

    public function __construct() {
        $this->handleRequest();
    }
    
    public function handleRequest (){
        require 'view/mostra.php';

        $doc = new DOMDocument();
        $localDiv = $doc->getElementByClassName("mensagem");

        $aviso = isset($_GET['aviso']) ? $_GET['aviso'] : 'false';
        if($aviso == 'true'){
            $localDiv->innerHTML = "See that man! It's WORKING";
            //'quero colocar a mensagem no lugar correto!';
        }else{
            $localDiv->innerHTML = "Sorry man, try AGAIN!";
            //echo 'quero colocar a mensagem no lugar correto!';
        }
    }
}