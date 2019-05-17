<?php
namespace Atividade;

use Activity\Controllers\controle;
use Activity\Controllers\newRegisterController;
use Activity\Controllers\ListController;
use Activity\Controllers\EditController;

require 'controller/Controle.php';
require 'controller/NewRegisterController.php';
require 'controller/ListController.php';
require 'controller/EditController.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);


class index
{

    const NOVO_CADASTRO = 'NewRegisterController';
    const INITIAL_PAGE = 'index';
    const LIST = 'ListController';
    const SHOW_PAGE_NEW_REGISTER = 'confirmNewRegister';
    const EDIT_PAGE = 'EditPage';


    public function __construct()
    {
        $this->handleRequest();
    }


    private function handleRequest()
    {
        $page = isset($_GET['page']) ? $_GET['page'] : self::INITIAL_PAGE;
        //echo '?: '.$page;
        switch ($page) {
            case self::SHOW_PAGE_NEW_REGISTER:
                new controle();
                break;
            case self::NOVO_CADASTRO:
                new newRegisterController();
                break;
            case self::LIST:
                new ListController();
                break;
            case self::EDIT_PAGE:
                new EditController();
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
