<?php

namespace Atividade\Model;

class Contato {

    private $name;
    private $email;

    public function __construct($name, $email){

        $this->name = $name;
        $this->email = $email;

    }

    public function toString(){
        return 'username: '.$this->name.' &nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp; e-mail: '.$this->email;
    }
}