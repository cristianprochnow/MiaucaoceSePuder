<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <title>MiauCãoce se Puder</title>
    <link rel="icon" href="images/logomarcaPreta.png" type="image/x-icon">
</head>

<body>
    <div class="loginPage">
        <div class="imageLogo">
            <a href="index.php">
                <img id="headerImage" src="images/logomarcaPequena.png">
            </a>
        </div>

        <?php
            require_once('settings/config.php');
            require_once('class/Login.php');
            require_once('class/Alertas.php');

            if (isset($_POST['login'])) {
                $login = new Login();
                $alert = new Alertas();

                if (empty($_POST['loginNickname']) || empty($_POST['loginPass'])) {
                    print $alert -> errorMessage('Campos Usuário e Senha são de preenchimento obrigatório.');
                } else {
                    try {
                        $query = 'SELECT cod_usuario, usuario_nome_completo FROM usuario WHERE usuario_nickname=:nickname AND usuario_senha=:senha';

                        $submitData = $connection -> prepare($query);

                        $submitData -> bindValue(':nickname', $login -> higienizarDados($_POST['loginNickname']));
                        $submitData -> bindValue(':senha', $login -> criptografarSenha($login -> higienizarDados($_POST['loginPass'])));
                        
                        $submitData -> execute();
                        $usersAmount = $submitData -> rowCount();
                        $user = $submitData -> fetch(PDO::FETCH_ASSOC);

                        if ($usersAmount == 0) {
                            print $alert -> errorMessage('Usuário ou Senha incorretos.');
                        } else {
                            session_start();

                            $_SESSION['isLogged'] = true;
                            $_SESSION['nomeUsuario'] = $user['usuario_nome_completo'];
                            $_SESSION['codUsuario'] = $user['cod_usuario'];

                            header('Location: index.php');
                        }
                    } catch (PDOException $error) {
                        print 'Conexão falhou!' . $error -> getMessage();
                    }
                }
            }
        ?>

        <form method="POST" role="form" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>>
            <fieldset id="formLogin">
                <p class="UserLogin"><label for="userLogin">Usuário</label>
                    <input class="userLogin" id="userLogin" name="loginNickname" type="text" aria-label="Usuário" placeholder="Usuário">
                </p>

                <p><label for="userPassword">Senha</label>
                    <input class="userLogin" id="userPassword" name="loginPass" type="password" aria-label="Senha" placeholder="Senha">
                </p>

                <input type="submit" value="Login" name="login" class="enterButton">
                <p class="mensagemCadastro">Não possui uma conta no nosso site?
                    <br>
                    <a href="cadastro.php">Cadastre-se agora</a>
                </p>
            </fieldset>
        </form>
        <div id="rodapePicture"></div>
    </div>
</body>

</html>