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
