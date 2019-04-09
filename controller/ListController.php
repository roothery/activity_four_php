<?php

namespace Activity\Controllers;

use Activity\Model\Contato;
use Activity\Model\GerenciadorContato;
use Activity\Model\ContatoFactory;
use Lib\simple_html_dom;

require 'model/Contato.php';
require_once 'model/GerenciadorContatos.php';

class listController
{

    public function __construct()
    {
        $this->handleListOfCOntacts();
    }

    private function handleListOfCOntacts()
    {

        //tive que deixar aqui e com require_once por conflito de estar aberto globalmente       
        require_once 'lib/simple_html_dom.php';
        require_once 'view/lista.php';

        $DOM = new simple_html_dom();

        $DOM->load_file('view/lista.php');

        //$listDiv = $DOM->find('tag (como no css)', 'elementTag (se 1 => 0)');
        $listDiv = $DOM->find('.lista_contato', 0);

        $this->insertDiv($listDiv);
    }

    private function insertDiv($DOMElement)
    {

        //$gerenciadorContato = new ContatoFactory();
        $gerenciadorContato = new GerenciadorContato();

        $Contacts = array();

        $Contacts = $gerenciadorContato->getAllContacts();

        $buffer = '';

        if (isset($Contacts))
            foreach ($Contacts as $key => $value) {
                $buffer .= $value->toString() . '<br/>';          // << here ** >>   

            }

        /*

            Caso você queira organizar de forma diferente na linha << here ** >>
            dá para pegar com $value->getName() e com $value->getEmail() alem do que já está.
            o que acontece é que você terá que concatenar com <br/> ou <la></la> ou <li></li>
            fica do jeito que você quiser personalizar para jogar no html.

        */

        $DOMElement->innertext = $buffer;

        echo $DOMElement;
    }
}
