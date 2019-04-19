<?php
namespace Activity\Controllers;

use Activity\Model\ContatoFactory;

use App\APP;

require_once 'model/Contato.php';

class EditController
{
    const CONFIRMAR = 'confirm';
    const CANCELAR = 'cancel';
    const SHOW = '';

    public function __construct()
    {
        $this->handleEdit();
    }

    private function handleEdit()
    {
        $pageParamn = isset($_GET['action']) ? $_GET['action'] : self::SHOW;
        //echo '<br/>:: '.$pageParamn;
        switch ($pageParamn) {
            case self::CONFIRMAR:
                $this->confirmAction();
                break;
            case self::CANCELAR:
                $this->cancelAction();
                break;
            default:
                require 'view/edit.php';
        }
    }

    private function confirmAction()
    {
        $gerenciador_contato = new ContatoFactory();

        /* Existe também a possibilidade de criação de um objeto Contato, ou mesmo reaproveitar $contact,
        (se fizesse por dom) e setar post's e get para esse objeto, para assim, passa-lo como parametro 
        para editContact */

        $gerenciador_contato->editContact($_POST['username'], $_POST['email'], $_GET['id']);
        $this->redirect();
    }

    private function cancelAction()
    {
        $this->redirect();
    }

    private function redirect()
    {
        ob_get_clean();
        header('location: index.php?page=ListController');
        exit();
    }
}
