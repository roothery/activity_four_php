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
    const EDIT = 'edit';
    const DELETE = 'delete';
    const LIST = '';

    public function __construct()
    {
        $this->handleListOfCOntacts();
    }
    private function createList()
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

    private function handleListOfCOntacts()
    {
        $pageParamn = isset($_GET['action']) ? $_GET['action'] : self::LIST;
        //echo '<br/>:: '.$pageParamn;
        switch ($pageParamn) {
            case self::EDIT:
                $this->editAction();
                break;
            case self::DELETE:
                $this->deleteAction();
                break;
            default:
                $this->createList();
        }
    }

    private function insertDiv($DOMElement)
    {

        APP::DATABASE_MODE == 'SESSION' ? $gerenciadorContato = new GerenciadorContato() : $gerenciadorContato = new ContatoFactory();
        $Contacts = array();
        $Contacts = $gerenciadorContato->getAllContacts();
        $buffer =
            '
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Option</th>
        </tr>
        ';
        if (isset($Contacts))
            foreach ($Contacts as $key => $value) {
                $buffer .=
                    '
                <tr>
                    <td>' . $value->getId() . '</td>
                    <td>' . $value->getName() . '</td>
                    <td>' . $value->getEmail() . '</td>
                    <td><a href="index.php?page=ListController&action=edit&id=' . $value->getId() . '">editar</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="index.php?page=ListController&action=delete&id=' . $value->getId() . '">excluir</a></td>
                </tr>
                ';
            }

        $DOMElement->innertext = $buffer;
        echo $DOMElement;
    }

    private function editAction()
    { 
        ob_get_clean();
        header('location: index.php?page=EditPage');
        exit();
    }

    private function deleteAction()
    { 
        // Precisa deletar e mostrar novamente a lista (createlist)
        $gerenciador_database = new ContatoFactory();

        if (isset($_GET['id']))
            $gerenciador_database->deleteContact($_GET['id']);

        $this->createList();
    }
}
