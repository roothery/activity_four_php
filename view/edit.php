<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Contanto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/novo.css">
</head>

<body>

    <div class="login-page">
        <?php echo '<form method="POST" action="index.php?page=EditPage&action=confirm&id=' . $_GET['id'] . '">'; ?>
        <div class="form">
            <input type="text" name="username" placeholder="Nome" />
            <input type="email" name="email" placeholder="Email" />
            <button type="submit" class="button-left">editar</button>
        </div>
    </div>
</body>

</html>