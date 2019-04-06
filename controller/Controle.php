<?php

namespace Atividade\Controllers;

use Lib\simple_html_dom;


class controle
{

    public function __construct()
    {
        $this->handleRequest();
    }

    public function handleRequest()
    {

        require_once 'lib/simple_html_dom.php';

        $simpleDOM = new simple_html_dom();
        $simpleDOM->load_file('view/mostra.php');
        $localDiv = $simpleDOM->find('.mensagem', 0)->children(0);

        $aviso = isset($_GET['aviso']) ? $_GET['aviso'] : 'false';

        if ($aviso == 'true')
            $localDiv->innertext = 'See that man, it\'s WORKING!!!';
        else
            $localDiv->innertext = "Sorry man, try AGAIN!";

        echo $simpleDOM;
    }
}
