<?php

namespace Atividade\Controllers;

class novoController{    
    
    const ROUTED_ON_THIS_PAGE = 'index';
    const LOGIN = 'login';
    const RESET = 'reset';

    public function __construct (){
        $this->handleRequest();
    }

    private function setNewSession(){
        session_start();
        $_SESSION['users'] = array();
    }

    private function addSession($newUser){
        if (isset($_SESSION['users']) && isset($_SESSION))
            echo 'teste';
    }

    private function requirePage(){
        require 'view/novo.php';
    }

    private function handleRequest(){
        
        $pageParamn = isset($_GET['action']) ? $_GET['action'] : self::ROUTED_ON_THIS_PAGE;

        echo '<br/>:: '.$pageParamn;

        switch($pageParamn) {
            case self::LOGIN:
                $this->loginAction();
                break;
            case self::RESET:
                $this.resetSession();
                break;
            default:
                $this->requirePage();
        }
    }

    private function loginAction(){
        echo 'logged';
    }

    private function resetSession(){
        if (isset($_SESSION['users']))
            unset($_SESSION['users']);
    }

    private function redirect($page) {
        ob_get_clean ();
        
        header ('location: index.php?page='.$page);

        exit();
    }
}