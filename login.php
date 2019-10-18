<?php
    require_once("config.php");
    require_once("functions.php");

    session_start();

    try {
        if (isset($_POST["login"])) /* Verificando se foi feito o envio do form */ {
            $userName = isset($_POST["loginNickname"]) ? getDataFromForm($_POST["loginNickname"]) : "";
            $userPassword = isset($_POST["loginPass"]) ? getDataFromForm($_POST["loginPass"]) : "";    
            
            $passwordHash = makeHash($userPassword); // criptografando a senha

            // pegando a id e o nome completo de usuario do banco de dados
            $query = "SELECT cod_usuario, usuario_nome_completo FROM usuario WHERE usuario_nickname=:nickname AND usuario_senha=:senha";

            $execute = $connection -> prepare($query);

            $execute -> bindParam(":nickname", $userName);
            $execute -> bindParam(":senha", $passwordHash);

            $execute -> execute();

            // pega todos os usuarios correspondentes
            $users = $execute -> fetch(PDO::FETCH_ASSOC);

            if (count($users) < 1) {
                echo "<div class='alert-box'>Usuário ou senha incorretos.</div>";
            } else {
                $_SESSION["isLogged"] = true;
                $_SESSION["codUsuario"] = $users["cod_usuario"];
                $_SESSION["nomeCompletoUsuario"] = $users["usuario_nome_completo"];

                header("Location: index.php");
            }
        }
    } catch (PDOException $error) {
        echo "Conexão falhou! " . $error -> getMessage();
    }
?>

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

        <form method="POST" role="form" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>>
            <fieldset id="formLogin">
                <p class="UserLogin"><label for="userLogin">Usuário</label>
                    <input class="userLogin" id="userLogin" name="loginNickname" type="text" aria-label="Usuário" placeholder="Usuário" required>
                </p>

                <p><label for="userPassword">Senha</label>
                    <input class="userLogin" id="userPassword" name="loginPass" type="password" aria-label="Senha" placeholder="Senha" required="required">
                </p>

                <input type="submit" value="Login" name="login" class="enterButton">
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