<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="_css/userMessage.css">
        <title>MiauCãoce se Puder</title>
        <link rel="icon" href="_images/logomarcaPreta.png" type="image/x-icon">
    </head>

    <body>
        <div id="main-content">
            <div id="secondary-content">
                <h1 id="secondary-content-title">Sucesso!</h1>

                <p class="secondary-content-p">Cadastro realizado de forma bem sucedida, <span id="username"><?php print $_POST['registerUsername'] ?></span>. </p>
            </div>

            <div id="return-link-box">
                <a id="return-link" href="login.php">Voltar à página de Login</a>
            </div>
        </div>
    </body>
</html>