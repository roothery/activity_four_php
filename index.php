<?php

namespace Atividade;

use Atividade\Controllers\controle;
use Atividade\Controllers\novoController;
use Atividade\Controllers\listController;

require 'controller/Controle.php';
require 'controller/NewRegisterController.php';
require 'controller/ListController.php';

class index {

const NOVO_CADASTRO = 'NewRegisterController';
const INITIAL_PAGE = 'index';
const LIST = 'ListController';

    public function __construct (){
        $this->handleRequest ();
    }

    private function handleRequest (){
        
        $page = isset($_GET['page']) ? $_GET['page'] : self::INITIAL_PAGE;

        switch ($page){

            case self::NOVO_CADASTRO:
                echo 'page='."$page".' [1] <br/>';
                new listController();
                break;
            case self::LIST:
                echo 'page='."$page".' [2] <br/>';
                new novoController().start();
                break;
            default:
                echo 'page='."$page".' [3] <br/>';
                require 'view/index.php';
                break;
        }
    }
}

new index();
