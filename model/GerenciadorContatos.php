<?php

namespace Activity\Model;

use Activity\Model\Contato;
use Activity\ConnectDataBase\DataBase;

require_once 'interface/DataBase.php';

session_name('Atividade');

class GerenciadorContato implements DataBase
{

    public function set($username, $email)
    {

        $contact = new Contato($username, $email);

        $this->addSession($contact);

        return true;
    }

    private function newSession($contato)
    {

        $_SESSION['users'] = array();
        array_push($_SESSION['users'], $contato);
    }

    private function addSession($contato)
    {
        (isset($_SESSION['users']) && isset($_SESSION)) ? array_push($_SESSION['users'], $contato) : $this->newSession($contato);
    }

    public function getAllContacts()
    {

        $arrayOfContacts = array();

        if (isset($_SESSION['users']) && count($_SESSION['users']) > 0)
            foreach ($_SESSION['users'] as $key => $value) {
                if ($value != null)
                    array_push($arrayOfContacts, $value);
            }

        return $arrayOfContacts;
    }
}
