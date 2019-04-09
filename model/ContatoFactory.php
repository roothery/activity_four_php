<?php

namespace Activity\Model;

use Activity\Model\Contato;
use Activity\ConnectDataBase\DataBase;

require_once 'interface/DataBase.php';

date_default_timezone_set('UTC');

$connectorDataBase = null;

/*

$connectorDataBase = new PDO('sqlite:model/DBContato.sqlite');
$connectorDataBase->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$connectorDataBase->
exec('CREATE TABLE IF NOT EXISTS contacts(
        name TEXT NOT NULL,
        email TEXT NOT NULL PRIMARY KEY
        );'
    ); */

class ContatoFactory implements DataBase{

    public function set($username, $email){

        if ($connectorDataBase == null)
            $this->create();

        $insert =   'INSERT INTO contacts ( name, email )
                    values (:name, :email)';
        
        $preparingQuery = $connectorDataBase->prepare($insert);

        $preparingQuery->bindParamn(':name', $username);
        $preparingQuery->bindParamn(':email', $email);

        foreach ($contacts as $contact) {
            $username = $contact['name'];
            $email = $contact['email'];
            
            $preparingQuery->execute();
        }
    }

    private function create(){

        $connectorDataBase = new PDO('sqlite:DBContato.sqlite3');
        $connectorDataBase->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

/*         $memoryDB = new PDO('sqlite::memory:');
        $memoryDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); */
 
    
        $connectorDataBase->
        exec('CREATE TABLE IF NOT EXISTS contacts(
                name TEXT NOT NULL,
                email TEXT NOT NULL PRIMARY KEY
                );'
            );            
    }
    
    public function getAllContacts(){

        require_once 'model/Contato.php';

        $arrayOfContacts = array();

        if ( $connectorDataBase != null){
            $contacts = $connectorDataBase->query('SELECT * FROM contacts');
    
            foreach ($contacts as $row) {
                $contact = new Contato($row['name'], $row['email']);
                array_push($arrayOfContacts, $contact);
            }
        }

        return $arrayOfContacts;
    }

}