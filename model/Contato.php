<?php
namespace Activity\Model;

class Contato
{

    private $id;
    private $name;
    private $email;


    public function __construct($name, $email)
    {
        $this->name = $name;
        $this->email = $email;
    }


    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;
    }


    public function getName()
    {
        return $this->name;
    }


    public function getEmail()
    {
        return $this->email;
    }

    
    public function toString()
    {
        return 'Nome:  ' . $this->name . ' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;||
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; E-mail:  ' . $this->email;
    }
}
