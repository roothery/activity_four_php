<?php
namespace Activity\Model;

use Activity\Model\Contato;
use Activity\ConnectDataBase\DataBase;
use App\APP;

require_once 'interface/DataBase.php';
date_default_timezone_set('UTC');
class ContatoFactory implements DataBase
{

    private $connectorDataBase;

    public function set($username, $email)
    {
        $this->connect();
        $this->create();
        if (!$this->contain($email, 'email')) {
            $insert =   'INSERT INTO contacts ( name_, email )
                         VALUES (:name_, :email)';

            $statement = $this->connectorDataBase->prepare($insert);
            $statement->bindParam(':email', $email);
            $statement->bindParam(':name_', $username);

            $statement->execute();
            return true;
        }
        return false;
    }
    private function contain($param, $collumnTable)
    {
        $statement = $this->connectorDataBase->query('SELECT * FROM contacts WHERE ' . $collumnTable . ' = ?');
        $statement->execute([$param]);
        foreach ($statement as $value)
            if ($value['email'] == $param)
                return true;
        return false;
    }
    private function connect()
    {
        try {
            $this->connectorDataBase = new \PDO('sqlite:' . APP::PATH_SQLITE);
            $this->connectorDataBase->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $exception) {
            echo $exception->getMessage();
        }
    }
    private function create()
    {

        $query = 'CREATE TABLE IF NOT EXISTS contacts(
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    name_ TEXT NOT NULL,
                    email TEXT NOT NULL 
                    );';
        try {
            $this->connectorDataBase->exec($query);
        } catch (\PDOException $exception) {
            echo $exception->getMessage();
        }
    }

    public function getAllContacts()
    {
        require_once 'model/Contato.php';
        $arrayOfContacts = array();
        $this->connect();
        if ($this->connectorDataBase != null) {
            $contacts;

            try {
                $contacts = $this->connectorDataBase->query('SELECT * FROM contacts');

                if (isset($contacts))
                    foreach ($contacts as $row) {
                        $contact = new Contato($row['name_'], $row['email']);
                        $contact->setId($row['id']);
                        array_push($arrayOfContacts, $contact);
                    }
            } catch (\PDOException $exception) { }
        }
        return $arrayOfContacts;
    }

    public function getContactsById($id)
    {
        require_once 'model/Contato.php';
        $arrayOfContacts = array();
        $this->connect();
        if ($this->connectorDataBase != null) {
            $contacts;

            try {
                $contacts = $this->connectorDataBase->query('SELECT * FROM contacts WHERE ' . $id . ' = ?');
                $statement->execute([$id]);
                if (isset($contacts))
                    foreach ($contacts as $row) {
                        $contact = new Contato($row['name_'], $row['email']);
                        $contact->setId($row['id']);
                        array_push($arrayOfContacts, $contact);
                    }
            } catch (\PDOException $exception) { }
        }
        return $arrayOfContacts;
    }

    public function deleteContact($id){

        echo 'DELETE FROM contacts WHERE id ='.$id,';';

        $this->connect();

        try{
            
            $statement = $this->connectorDataBase->query('DELETE FROM contacts WHERE id = ?;');          
            $statement->execute([$id]);  

        }catch (\PDOException $ex){
            echo 'not funfa!';
        }
    }

    public function destroy()
    {

        $this->connect();
        try {
            $this->connectorDataBase->exec('DROP TABLE contacts');
        } catch (\PDOException $exception) { }
    }
}
