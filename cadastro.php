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
                if (isset($_POST["register"])) {
                    // exige o arquivo de configuração incial do database
                    require_once("config.php");
                    require_once("functions.php");

                    // pega os dados inseridos no input de "usuário"
                    $userNicknameVerification = isset($_POST["registerNickname"]) ? getDataFromForm($_POST["registerNickname"]) : "";

                    // query que seleciona o número de usuarios com aquele nome de usuário
                    $queryVerification = "SELECT COUNT(usuario_nickname) as qtd_usuario FROM usuario WHERE usuario_nickname=:usuario_nickname";

                    // prepara a query
                    $verification = $connection -> prepare($queryVerification);

                    // instancia os valores
                    $verification -> bindParam(":usuario_nickname", $userNicknameVerification);

                    // executa a query
                    $verification -> execute();

                    // puxa todos os usuarios correspondentes
                    $userAmount = $verification -> fetch(PDO::FETCH_ASSOC);

                    // validações de formulário
                    if (strlen(trim($_POST["registerNickname"])) > 50) {
                        echo "<div class='alert-box'>O nome de usuário pode ter no máximo 50 caracteres.</div>";
                    } elseif (strlen(trim($_POST["registerPassword"])) > 20) {
                        echo "<div class='alert-box'>A senha pode ter no máximo 20 caracteres.</div>";
                    } elseif (trim($_POST["registerPassword"]) != trim($_POST["registerPasswordConfirmation"])) {
                        echo "<div class='alert-box'>Senhas inseridas não são iguais.</div>";
                    } elseif (strlen(trim($_POST["registerUsername"])) > 100) {
                        echo "<div class='alert-box'>Nome de Usuário deve conter no máximo 100 caracteres.</div>";
                    } elseif (strlen(trim($_POST["registerEmail"])) > 100) {
                        echo "<div class='alert-box'>E-mail deve conter no máximo 100 caracteres.</div>";
                    } elseif ($userAmount["qtd_usuario"] > 0) /** verificação de número de usuários com o mesmo nickname */ {
                        echo "<div class='alert-box'>Este nome de usuário já existe.</div>";
                    } else {        
                        try {
                            // texto que passa os parâmetros de cada insert no database
                            $query = "INSERT INTO usuario SET usuario_nickname=:nickname, usuario_senha=:passwd, usuario_nome_completo=:completeName, usuario_email=:email, usuario_foto_perfil=:picture";
        
                            // prepara a conexão para realizar o insert  
                            $execute = $connection -> prepare($query);
        
                            // pega os dados do form, fazendo a higienização
                            $userNickname = isset($_POST["registerNickname"]) ? getDataFromForm($_POST["registerNickname"]) : "";
                            $userPasswd = isset($_POST["registerPassword"]) ? getDataFromForm($_POST["registerPassword"]) : "";
                            $passwordHash = makeHash($userPasswd);
                            $userName = isset($_POST["registerUsername"]) ? getDataFromForm($_POST["registerUsername"]) : "";
                            $userEmail = isset($_POST["registerEmail"]) ? getDataFromForm($_POST["registerEmail"]) : "";
                            $userPicture = isset($_POST["registerPicture"]) ? htmlspecialchars($_POST["registerPicture"]) : "";
        
                            // define os parâmetros com os respectivos dados
                            $execute -> bindParam(":nickname", $userNickname);
                            $execute -> bindParam(":passwd", $passwordHash);
                            $execute -> bindParam(":completeName", $userName);
                            $execute -> bindParam(":email", $userEmail);
                            $execute -> bindParam(":picture", $userPicture);
        
                            if ($execute -> execute()) /* realiza a conexão */ {
                                echo "<div class='alert-box'>Registro salvo com sucesso!</div>";
                                echo "<div class='link-login-from-register-page'><a href='login.php'>Fazer Login</a></div>";
                            } else {
                                echo "<p class='p-execute'> Não foi possível efetuar o registro. </p>";
                            }
                        } catch (PDOException $error) {
                            echo "Erro de conexão! " . $error -> getMessage();
                        }
                    }
                }
            ?>

            <form method="POST" role="form" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>>
                <fieldset id="formLogin">

                    <p class="UserLogin">
                        <label for="userLogin">Usuário*</label>
                        <input class="userLogin" id="userLogin" name="registerNickname" maxlength="50" type="text" aria-label="Usuário" placeholder="Usuário*" required>
                    </p>

                    <p class="UserLogin">
                        <label for="userPassword">Senha*</label>
                        <input class="userLogin" id="userPassword" name="registerPassword" maxlength="20" type="password" aria-label="Senha" placeholder="Senha*" required>
                    </p>

                    <p class="UserLogin">
                        <label for="userPassword">Confirme sua Senha*</label>
                        <input class="userLogin" id="userPassword" name="registerPasswordConfirmation" maxlength="20" type="password" aria-label="Senha" placeholder="Confirme sua Senha*" required>
                    </p>

                    <p class="UserLogin">
                        <label for="userName">Nome Completo*</label>
                        <input class="userLogin" id="userName" name="registerUsername" maxlength="100" type="text" aria-label="Nome Completo" placeholder="Nome Completo*" required>
                    </p>

                    <p class="UserLogin">
                        <label for="userEmail">E-mail para contato*</label>
                        <input class="userLogin" id="userEmail" name="registerEmail" maxlength="100" type="email" aria-label="E-mail" placeholder="E-mail*" required>
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