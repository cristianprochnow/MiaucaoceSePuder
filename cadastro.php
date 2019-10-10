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

        <?php
            if ($_POST) {
                require_once("config.php");

                try {
                    $query = "INSERT INTO usuario SET usuario_nickname=:nickname, usuario_senha=:passwd, usuario_nome_completo=:completeName, usuario_email=:email, usuario_foto_perfil=:picture";

                    $execute = $connection -> prepare($query);

                    $userNickname = htmlspecialchars(trim(strip_tags($_POST["registerNickname"])));
                    $userPasswd = htmlspecialchars(trim(strip_tags($_POST["registerPassword"])));
                    $passwordHash = sha1(md5($userPasswd));
                    // $userConfirmationPasswd = htmlspecialchars(trim(strip_tags($_POST['registerConfirmationPassword'])));
                    $userName = htmlspecialchars(trim(strip_tags($_POST["registerUsername"])));
                    $userEmail = htmlspecialchars(trim(strip_tags($_POST["registerEmail"])));
                    // $userState = htmlspecialchars(trim(strip_tags($_POST["registerState"]));
                    // $userCity = htmlspecialchars(trim(strip_tags($_POST["registerCity"]));
                    $userPicture = htmlspecialchars($_POST["registerPicture"]);

                    $execute -> bindParam(":nickname", $userNickname);
                    $execute -> bindParam(":passwd", $passwordHash);
                    $execute -> bindParam(":completeName", $userName);
                    $execute -> bindParam(":email", $userEmail);
                    $execute -> bindParam(":picture", $userPicture);

                    if ($execute -> execute()) {
                        echo "<p class='p-execute'> Registro salvo com sucesso! </p>";
                        echo "<p class='link-login-from-register-page'><a href='login.php'> Fazer Login </a></p>";
                    } else {
                        echo "<p class='p-execute'> Não foi possível efetuar o registro. </p>";
                    }
                } catch (PDOException $error) {
                    echo "Erro de conexão! " . $error -> getMessage();
                }
            }
        ?>

        <form method="POST" role="form" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>>
            <fieldset id="formLogin">

                <p class="UserLogin">
                    <label for="userLogin">Usuário*</label>
                    <input class="userLogin" id="userLogin" name="registerNickname" type="text" aria-label="Usuário" placeholder="Usuário*" required="required">
                </p>

                <p class="UserLogin">
                    <label for="userPassword">Senha*</label>
                    <input class="userLogin" id="userPassword" name="registerPassword" type="password" aria-label="Senha" placeholder="Senha*" required="required">
                </p>

                <!--
                <p class="UserLogin">
                    <label for="UserPasswordConfirmation">Confirmação de Senha*</label>
                    <input class="userLogin" id="UserPasswordConfirmation" name="register   ConfirmationPassword" type="password" aria-label="Digite novamente sua senha" placeholder="Digite novamente sua senha*" required>
                </p>
                -->

                <p class="UserLogin">
                    <label for="userName">Nome Completo*</label>
                    <input class="userLogin" id="userName" name="registerUsername" type="text" aria-label="Nome Completo" placeholder="Nome Completo*" required>
                </p>

                <p class="UserLogin">
                    <label for="userEmail">E-mail para contato*</label>
                    <input class="userLogin" id="userEmail" name="registerEmail" type="email" aria-label="E-mail" placeholder="E-mail*" required>
                </p>

                <!--
                <p class="UserLogin">
                    <label for="userTelefone">Número de telefone fixo</label>
                    <input class="userLogin" id="userTelefone" name="registerPhone" type="number" min="0" aria-label="Número de Telefone" placeholder="Número de telefone">
                </p>

                <p class="UserLogin">
                    <label for="userCell">Número de celular</label>
                    <input class="userLogin" id="userCell" name="registerCell" type="number" min="0" aria-label="Número de celular" placeholder="Número de celular">
                </p>
                -->

                <!--
                <p class="UserLogin">
                    <label for="userEstado">Estado</label>
                    <input class="userLogin" id="userEstado" name="registerState" type="text" aria-label="Estado que você reside" placeholder="Estado que você reside" list="estados">
                </p>

                <datalist id="estados">
                        <option value="AM">Amazonas (AM)</option>
                        <option value="RR">Roraima (RR)</option>
                        <option value="AP">Amapá (AP)</option>
                        <option value="PA">Pará (PA)</option>
                        <option value="TO">Tocantins (TO)</option>
                        <option value="RO">Rondônia (RO)</option>
                        <option value="AC">Acre (AC)</option>
                        <option value="MA">Maranhão (MA)</option>
                        <option value="PI">Piauí (PI)</option>
                        <option value="CE">Ceará (CE)</option>
                        <option value="RS">Rio Grande do Norte (RN)</option>
                        <option value="PE">Pernambuco (PE)</option>
                        <option value="PB">Paraíba (PB)</option>
                        <option value="SE">Sergipe (SE)</option>
                        <option value="AL">Alagoas (AL)</option>
                        <option value="BA">Bahia (BA)</option>
                        <option value="MT">Mato Grosso (MT)</option>
                        <option value="MS">Mato Grosso do Sul (MS)</option>
                        <option value="GO">Goiás (GO)</option>
                        <option value="RJ">Rio de Janeiro (RJ)</option>
                        <option value="SP">São Paulo (SP)</option>
                        <option value="MG">Minas Gerais (MG)</option>
                        <option value="ES">Espírito Santo (ES)</option>
                        <option value="PR">Paraná (PR)</option>
                        <option value="SC">Santa Catarina (SC)</option>
                        <option value="RS">Rio Grande do Sul (RS)</option>
                </datalist>

                <p class="UserLogin">
                    <label for="userCidade">Cidade</label>
                    <input class="userLogin" id="userCidade" name="registerCity" type="text" aria-label="Cidade que você reside" placeholder="Cidade que você reside">
                </p>
                -->

                <p class="UserLogin">
                    <label for="userPicture">Foto de Perfil</label>
                    <input class="userLogin" id="userPicture" name="registerPicture" type="file" aria-label="Insira uma foto de perfil" placeholder="Foto de perfil">
                </p>

                <input type="submit" value="Entrar" class="enterButton">

            </fieldset>
        </form>
        <div id="rodapePicture">
            <!--<img id="rodapePicture" src="_images/faixaFinaAzulPequena.png">-->
        </div>
    </div>
</body>
</body>

</html>