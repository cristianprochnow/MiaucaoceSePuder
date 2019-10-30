<?php
    // REGISTER

    /*
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
                echo "<div class='alert-box'>Senhas inseridas são diferentes.</div>";
            } elseif (strlen(trim($_POST["registerUsername"])) > 100) {
                echo "<div class='alert-box'>Nome de Usuário deve conter no máximo 100 caracteres.</div>";
            } elseif (strlen(trim($_POST["registerEmail"])) > 100) {
                echo "<div class='alert-box'>E-mail deve conter no máximo 100 caracteres.</div>";
            } elseif ($userAmount["qtd_usuario"] > 0) {
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

                    if ($execute -> execute()) {
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
    */

    // LOGIN

    /*
        require_once("config.php");
        require_once("functions.php");

        session_start();

        try {
            if (isset($_POST["login"])) {
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
                    $_SESSION["cod_usuario"] = $users["cod_usuario"];
                    $_SESSION["usuario_nome_completo"] = $users["usuario_nome_completo"];

                    header("Location: index.php");
                }
            }
        } catch (PDOException $error) {
            echo "Conexão falhou! " . $error -> getMessage();
        }
    */
?>