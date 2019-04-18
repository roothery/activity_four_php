<?php
namespace Activity\ConnectDataBase;

interface DataBase
{

    public function set($username, $email);

    public function getAllContacts();
}
