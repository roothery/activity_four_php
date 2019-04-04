<?php

namespace Atividade\Controllers;

use Atividade\Model\Contato;
use Atividade\Model\GerenciadorContato;

require 'model/Contato.php';
require 'model/GerenciadorContatos.php';

class listController {
    
    public function __construct(){
        
        $gc = new GerenciadorContato();

        echo '<pre></pre>';

        $gc->printContatos();
    }
}