<?php
namespace Activity\ConnectDataBase;

interface DataBase
{

    public function set($username, $email);

    public function getAllContacts();

    public function getContactsById($id);

    public function deleteContact($id);

    public function editContact($name_, $email, $id);
}
