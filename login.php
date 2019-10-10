<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="_css/login.css">
    <title>MiauCãoce se Puder</title>
    <link rel="icon" href="_images/logomarcaPreta.png" type="image/x-icon">
</head>

<body>
    <div class="loginPage">
        <div class="imageLogo">
            <a href="index.php">
                <img id="headerImage" src="_images/logomarcaPequena.png">
            </a>
        </div>
        <form method="POST" role="form" action="index.php">
            <fieldset id="formLogin">
                <p class="UserLogin"><label for="userLogin">Usuário</label>
                    <input class="userLogin" id="userLogin" type="text" aria-label="Usuário" placeholder="Usuário" required="required">
                </p>

                <p><label for="userPassword">Senha</label>
                    <input class="userLogin" id="userPassword" type="password" aria-label="Senha" placeholder="Senha" required="required">
                </p>

                <input type="submit" value="Entrar" class="enterButton">
                <p class="mensagemCadastro">Não possui uma conta no nosso site?
                    <br>
                    <a href="cadastro.php">Cadastre-se agora</a>
                </p>
            </fieldset>
        </form>
        <div id="rodapePicture">
            <!--<img id="rodapePicture" src="_images/faixaFinaAzulPequena.png">-->
        </div>
    </div>
</body>

</html>