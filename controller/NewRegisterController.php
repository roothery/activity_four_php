<?php

namespace Atividade\Controllers;

use Atividade\Model\GerenciadorContato;

//require 'model/GerenciadorContatos.php';

class NewRegisterController{    

    const ROUTED_ON_THIS_PAGE = 'index';
    const LOGIN = 'login';
    const RESET = 'reset';

    public function __construct (){
        $this->handleRequest();
    }

    private function requirePage(){
        require 'view/novo.php';
    }

    private function handleRequest(){
        
        $pageParamn = isset($_GET['action']) ? $_GET['action'] : self::ROUTED_ON_THIS_PAGE;

        //echo '<br/>:: '.$pageParamn;

        switch($pageParamn) {
            case self::LOGIN:
                $this->loginAction();
                break;
            case self::RESET:
                $this->resetSession();
                break;
            default:
                $this->requirePage();
        }
    }

    private function loginAction(){

        $username = $_POST['username'];
        $email = $_POST['email'];

        if (empty($username) || empty($email))
            $this->redirect ('successRegister', 'false');

        $gc = new GerenciadorContato();
        $gc->set($username, $email);

        $this->redirect('successRegister', 'true');
        //See that man! It's WORKING!

        //Sorry man, try AGAIN!

    }

    private function resetSession(){
        if (isset($_SESSION['users']))
            unset($_SESSION['users']);
    }

    private function redirect($page, $message) {
        ob_get_clean ();
        
        header ('location: index.php?page='.$page.'&aviso='.$message);

        exit();
    }
}