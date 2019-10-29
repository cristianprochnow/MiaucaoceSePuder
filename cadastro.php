<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="_css/login.css">
        <link rel="icon" href="_images/logomarcaPreta.png" type="image/x-icon">
        <title>MiauCãoce se Puder</title>
    </head>

    <body>
        <div class="loginPage">
            <div class="imageLogo">
                    <img id="headerImage" src="_images/logomarcaPequena.png">
            </div>

            <?php
                require_once('_settings/config.php');
                require_once('_class/Autenticacao.php');
                require_once('_class/Cadastro.php');
                require_once('_class/Alertas.php');

                try {
                    if (isset($_POST['register'])) {
                        $register = new Cadastro();
                        $alert = new Alertas();

                        $queryOfVerification = 'SELECT COUNT(usuario_nickname) AS qtd_usuario FROM usuario WHERE usuario_nickname =:nickname';
                        $verificationExecute = $connection -> prepare($queryOfVerification);

                        $registerNicknameVerification = $register -> higienizarDados($_POST['registerNickname']);

                        $verificationExecute -> bindValue(':nickname', $registerNicknameVerification);

                        $verificationExecute -> execute();
                        $resultOfVerification = $verificationExecute -> fetch(PDO::FETCH_ASSOC);

                        if (empty($_POST['registerNickname']) || empty($_POST['registerPassword']) || empty($_POST['registerUsername']) || empty($_POST['registerEmail'])) {
                            print $alert -> errorMessage('Campos com * são de preenchimento obrigatório.');
                        } elseif ($resultOfVerification['qtd_usuario'] > 0) { 
                            print $alert -> errorMessage('Este nome de usuário já existe. Por favor, selecione outro.');
                        }elseif ($register -> contarCaracteresDaStringInserida($_POST['registerNickname']) > 50) {
                            print $alert -> errorMessage('Número inválido de caracteres. O campo Usuário pode conter no máximo 50 caracteres.');
                        } elseif ($register -> contarCaracteresDaStringInserida($_POST['registerPassword']) > 20) {
                            print $alert -> errorMessage('Número inválido de caracteres. O campo Senha pode conter no máximo 20 caracteres.');
                        } elseif ($register -> higienizarDados($_POST['registerPassword']) != $register -> higienizarDados($_POST['registerPasswordConfirmation'])) {
                            print $alert -> errorMessage('As senhas que foram inseridas são diferentes. Insira as mesmas senhas nos campos Senha e Confirme sua Senha');
                        } elseif ($register -> contarCaracteresDaStringInserida($_POST['registerUsername']) > 100) {
                            print $alert -> errorMessage('Número inválido de caracteres. O campo Nome Completo pode conter no máximo 100 caracteres.');
                        } elseif ($register -> contarCaracteresDaStringInserida($_POST['registerEmail']) > 100) {
                            print $alert -> errorMessage('Número inválido de caracteres. O campo E-mail pode conter no máximo 100 caracteres.');
                        } else {
                            $query = 'INSERT INTO usuario SET usuario_nickname=:nickname, usuario_senha=:senha, usuario_nome_completo=:nomeCompleto, usuario_email=:email, usuario_foto_perfil=:fotoPerfil';

                            $submitData = $connection -> prepare($query);

                            $submitData -> bindValue(':nickname', $register -> higienizarDados($_POST['registerNickname']));
                            $submitData -> bindValue(':senha', $register -> criptografarSenha($register -> higienizarDados($_POST['registerPassword'])));
                            $submitData -> bindValue(':nomeCompleto', $register -> higienizarDados($_POST['registerUsername']));
                            $submitData -> bindValue(':email', $register -> higienizarDados($_POST['registerEmail']));
                            $submitData -> bindValue(':fotoPerfil', $register -> higienizarDados($_POST['registerPicture']));

                            if ($submitData -> execute()) {
                                print $alert -> successMessage('Registro salvo com sucesso!');

                                print "<div class='link-login-from-register-page'><a href='login.php'>Fazer Login</a></div>";
                            } else {
                                print $alert -> errorMessage('Não foi possível efetuar o registro. Por favor, tente novamente mais tarde.');
                            }
                        }
                    }
                } catch (PDOException $error) {
                    print 'Conexão falhou! ' . $error -> getMessage();
                }
            ?>

            <form method="POST" role="form" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>>
                <fieldset id="formLogin">

                    <p class="UserLogin">
                        <label for="userLogin">Usuário*</label>
                        <input class="userLogin" id="userLogin" name="registerNickname" type="text" aria-label="Usuário" placeholder="Usuário*">
                    </p>

                    <p class="UserLogin">
                        <label for="userPassword">Senha*</label>
                        <input class="userLogin" id="userPassword" name="registerPassword"  type="password" aria-label="Senha" placeholder="Senha*">
                    </p>

                    <p class="UserLogin">
                        <label for="userPassword">Confirme sua Senha*</label>
                        <input class="userLogin" id="userPassword" name="registerPasswordConfirmation" type="password" aria-label="Senha" placeholder="Confirme sua Senha*">
                    </p>

                    <p class="UserLogin">
                        <label for="userName">Nome Completo*</label>
                        <input class="userLogin" id="userName" name="registerUsername" type="text" aria-label="Nome Completo" placeholder="Nome Completo*">
                    </p>

                    <p class="UserLogin">
                        <label for="userEmail">E-mail para contato*</label>
                        <input class="userLogin" id="userEmail" name="registerEmail" type="email" aria-label="E-mail" placeholder="E-mail*">
                    </p>

                    <p class="UserLogin">
                        <label for="userPicture">Foto de Perfil</label>
                        <input class="userLogin" id="userPicture" name="registerPicture" type="file" aria-label="Insira uma foto de perfil" placeholder="Foto de perfil">
                    </p>

                    <input type="submit" value="Cadastrar" name="register" class="enterButton">
                </fieldset>
            </form>
            <div id="rodapePicture"></div>
        </div>
    </body>
</html>