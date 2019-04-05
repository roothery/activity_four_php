<?php

namespace Atividade\Model;

use Atividade\Model\Contato;

session_name('Atividade');

class GerenciadorContato
{

    public function set($username, $email)
    {

        $contact = new Contato($username, $email);

        $this->addSession($contact);
    }

    private function newSession($contato)
    {

        $_SESSION['users'] = array();
        array_push($_SESSION['users'], $contato);
    }

    public function addSession($contato)
    {
        (isset($_SESSION['users']) && isset($_SESSION)) ? array_push($_SESSION['users'], $contato) : $this->newSession($contato);
    }

    public function printContatos()
    {


        if (isset($_SESSION['users']) && count($_SESSION['users']) > 0)
            foreach ($_SESSION['users'] as $key => $value) {
                if ($value != null)
                    echo $value->toString() . '<br/>';
            }
    }

    public function printt()
    {
        echo 'teste';
    }
}
