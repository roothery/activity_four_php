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
        <form method="POST" action="index.php?page=NewRegisterController&action=login">
            <div class="form">
                <input type="text" name="username" placeholder="Nome" />
                <input type="email" name="email" placeholder="Email" />
                <button type="submit">cadastrar</button>
                <p class="message">Lista cheia? <a href="index.php?page=NewRegisterController&action=reset">Resetar Lista</a></p>
            </div>
    </div>
</body>

</html>