<?php

namespace Activity\Model;

date_default_timezone_set('UTC');

$connectorDataBase;

class DBFactory {

    public function __construct(){

    }
    
    public function create(){

        $connectorDataBase = new PDO('sqlite:model/DBContato.sqlite');
        $connectorDataBase->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $connectorDataBase->
        exec('CREATE TABLE IF NOT EXISTS contacts(
                name TEXT NOT NULL,
                email TEXT NOT NULL PRIMARY KEY
                );'
            );            
    }
}