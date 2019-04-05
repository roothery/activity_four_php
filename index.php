<?php

namespace Atividade;

use Atividade\Controllers\controle;
use Atividade\Controllers\newRegisterController;
use Atividade\Controllers\ListController;

require 'controller/Controle.php';
require 'controller/NewRegisterController.php';
require 'controller/ListController.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);


class index
{

    const NOVO_CADASTRO = 'NewRegisterController';
    const INITIAL_PAGE = 'index';
    const LIST = 'ListController';
    const SHOW_PAGE_SUCCESS_REGISTER = 'successRegister';

    public function __construct()
    {
        $this->handleRequest();
    }

    private function handleRequest()
    {

        $page = isset($_GET['page']) ? $_GET['page'] : self::INITIAL_PAGE;

        //echo '?: '.$page;

        switch ($page) {
            case self::SHOW_PAGE_SUCCESS_REGISTER:
                new controle();
                break;
            case self::NOVO_CADASTRO:
                new newRegisterController();
                break;
            case self::LIST:
                new ListController();
                break;
            default:
                require 'view/index.php';
                break;
        }
    }
}

session_start(); 
//session_save_path();

new index();
