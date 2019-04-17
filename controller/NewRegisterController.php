<?php

namespace Activity\Controllers;

use Activity\Model\GerenciadorContato;
use Activity\Model\ContatoFactory;
use App\APP;

require 'global/App.php';
require 'model/ContatoFactory.php';

class NewRegisterController
{

    const ROUTED_ON_THIS_PAGE = 'index';
    const LOGIN = 'login';
    const RESET = 'reset';

    public function __construct()
    {
        $this->handleRequest();
    }

    private function requirePage()
    {
        require 'view/novo.php';
    }

    private function handleRequest()
    {

        $pageParamn = isset($_GET['action']) ? $_GET['action'] : self::ROUTED_ON_THIS_PAGE;

        //echo '<br/>:: '.$pageParamn;

        switch ($pageParamn) {
            case self::LOGIN:
                $this->loginAction();
                break;
            case self::RESET:
                $this->reset();
                break;
            default:
                $this->requirePage();
        }
    }

    private function loginAction()
    {
        //require 'model/GerenciadorContatos.php';

        $username = $_POST['username'];
        $email = $_POST['email'];

        if (empty($username) || empty($email))
            $this->redirect('confirmNewRegister', 'false');

        /* dataManager is responsable to tell who's save the data */
        APP::DATABASE_MODE == 'SESSION' ? $dataManager = new GerenciadorContato() : $dataManager = new ContatoFactory();
        
        $dataManager->set($username, $email) ? $this->redirect('confirmNewRegister', 'true') : $this->redirect('confirmNewRegister', 'false');

        //See that man! It's WORKING!
        //Sorry man, try AGAIN!

    }

    private function reset(){
        APP::DATABASE_MODE == 'SESSION' ? $this->resetSession() : $this->resetDatabase();
    }

    private function resetSession()
    {
        if (isset($_SESSION['users']))
            unset($_SESSION['users']);

        $this->redirectTo('index');
    }

    private function resetDatabase(){

        $dataManager = new ContatoFactory();

        $dataManager->destroy();

        $this->redirectTo('index');
    }

    private function redirect($page, $message)
    {
        ob_get_clean();

        header('location: index.php?page=' . $page . '&aviso=' . $message);

        exit();
    }

    private function redirectTo($page)
    {
        ob_get_clean();

        header('location: index.php?page=' . $page);

        exit();
    }
}
