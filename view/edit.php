<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="images/logo.jpg">
    <title>Contanto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/novo.css">
</head>

<body>

    <div class="login-page">
        
        <?php 
        
        /* =============================================================================
            Dá pra fazer desta forma, estilo framework - Depois tentamos do modo normal
        ===============================================================================*/

        use Activity\Model\ContatoFactory;
        use Activity\Model\GerenciadorContato;
        use Activity\Model\Contato;
        use App\APP;

        require_once 'model/ContatoFactory.php';
        require_once 'model/Contato.php';

        $contact = array();

        APP::DATABASE_MODE == 'SESSION' ? $gerenciadorContato = new GerenciadorContato() : $gerenciadorContato = new ContatoFactory();
        
        $contact = $gerenciadorContato->getContactsById($_GET['id']);

        echo '<form method="POST" action="index.php?page=EditPage&action=confirm&id=' . $_GET['id'] . '">
        <div class="form">
            <input type="text" name="username" value="'.$contact[0]->getName().'">
            <input type="email" name="email" value="'.$contact[0]->getEmail().'" />
            <button type="submit" class="button-left">editar</button>
        </div>' ?>
    </div>
</body>

</html>