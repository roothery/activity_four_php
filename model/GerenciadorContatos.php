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
        $lastId = $this->searchLastId();
        $contact->setId($lastId);
        
        $this->addSession($contact);
        return true;
    }


    private function searchLastId(){
        $lastId;
        isset($_SESSION['users']) ? $lastId = $this->getLastId() : $lastId = 1;
        
        return $lastId;
    }


    private function getLastId(){
        $max = 0;
        foreach ($_SESSION['users'] as $key => $value) {
            if ($value->getId() > $max)
                $max = $value->getId();
        }

        return ++$max;
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


    public function getContactsById($id){
        $array = array();

        foreach ($_SESSION['users'] as $key => $value)
            if ($value->getId() == $id) 
                array_push($array, $value);

        return $array;
    }


    public function deleteContact($id){

        foreach ($_SESSION['users'] as $key => $value)
            if ($value->getId() == $id)
                unset($_SESSION['users'][$key]);
    }


    public function editContact($name_, $email, $id){
        foreach ($_SESSION['users'] as $key => $value)
            if ($value->getId() == $id){
               $contact = new Contato($name_, $email);
               $contact->setId($value->getId());
               $_SESSION['users'][$key] = $contact;
            }        
    }
}
