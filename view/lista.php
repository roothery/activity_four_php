<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Lista</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/lista.css">

</head>

<body>

    <div class="option-page">
    
        <form action="index.php?page=index.php">
            <input class="button" type="submit" value="Retornar" />
        </form>

        <div class=search>
            <form method="POST" action="index.php?page=ListController&action=search">
            <input type="text" id="search-field" name="id" placeholder="pesquisar..."/>
            <button type="submit">
                <img src="images/lupa.png" id="search-icon"/>
            </button>
        </div>
        
        <div class="q">
        </div>
    
    </div>

    <div class="lista_contato">
        <h1>Lista de Contatos</h1>
        <a href="index.php?page=ListController">todos contatos</a>
    </div>

    <table class="tabela_contato"></table>

</body>

</html>