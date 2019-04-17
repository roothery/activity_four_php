<?php
namespace Activity\Controllers;

use Activity\Model\Contato;
use Activity\Model\GerenciadorContato;
use Activity\Model\ContatoFactory;
use Lib\simple_html_dom;
use App\APP;

require 'model/Contato.php';
require_once 'model/GerenciadorContatos.php';

class ListController
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
        $listDiv = $DOM->find('.tabela_contato', 0);
        $this->insertDiv($listDiv);
    }
    private function insertDiv($DOMElement)
    {

        APP::DATABASE_MODE == 'SESSION' ? $gerenciadorContato = new GerenciadorContato() : $gerenciadorContato = new ContatoFactory();
        $Contacts = array();
        $Contacts = $gerenciadorContato->getAllContacts();
        $buffer =
            '
        <tr>
            <th>Nome</th>
            <th>Email</th>
        </tr>
        ';
        if (isset($Contacts))
            foreach ($Contacts as $key => $value) {
                $buffer .=
                '
                <tr>
                    <td>'.$value->getName().'</td>
                    <td>'.$value->getEmail().'</td>
                </tr>
                ';
            }
        
        $DOMElement->innertext = $buffer;
        echo $DOMElement;
    }
}
