<?php

    session_start();

    require_once('../settings/config.php');
    require_once('../settings/functions.php');

?>

<!DOCTYPE html>

<html lang="PT-BR">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link rel="stylesheet" type="text/css" href="../css/redefine.css" />
        <link rel="icon" type="image/x-icon" href="../images/logomarcaPreta.png" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway&display=swap" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />

        <title>MiauCãoce se Puder</title>
    </head>

    <body>
        <div class="main-content">
            <div class="cabecalho-form">
                <h1>Redefinir o usuário</h1>

                <?php
                
                    if (isset($_POST['submit'])) {
                
                        try {

                            $queryText = 'SELECT cod_usuario FROM usuario WHERE usuario_nickname = :nickname';
                            $querySelect = $connection -> prepare($queryText);

                            $nickname = cleanData($_POST['nomeUsuario']);
                            $querySelect -> bindParam(':nickname', $nickname);

                            $querySelect -> execute();
                            $userAmount = $querySelect -> rowCount();

                        } catch (PDOException $error) {

                            print 'Conexão falhou! ' . $error -> getMessage();

                        }

                        /** Verifica se há mais usuários com o nickname inserido.
                         *  Caso haja, uma mensagem de erro será apresentada
                         */
                        if ($userAmount > 0) {

                            ?>
                            
                                <div class="error-box">
                                    <p>Nome de usuário já existente, por favor escolha outro e tente novamente.</p>
                                </div>
                            
                            <?php

                        } elseif (empty($_POST['nomeUsuario']) || empty($_POST['emailUsuario']) || empty($_POST['senhaUsuario'])) {
                
                            ?>
                            
                                <div class="error-box">
                                    <p>Preencha os campos.</p>
                                </div>
                            
                            <?php
                
                        } elseif (strlen(trim($_POST['senhaUsuario'])) > 20) {
                            
                            ?>
                            
                                <div class="error-box">
                                    <p>Número máximo de caracteres excedido. A senha pode conter no máximo 20 caracteres.</p>
                                </div>
                            
                            <?php

                        } elseif (strlen(trim($_POST['nomeUsuario'])) > 80) {

                            ?>
                            
                                <div class="error-box">
                                    <p>Número máximo de caracteres excedido. O nome de usuário pode conter no máximo 80 caracteres.</p>
                                </div>
                            
                            <?php

                        } elseif (strlen(trim($_POST['emailUsuario'])) > 200) {

                            ?>
                            
                                <div class="error-box">
                                    <p>Número máximo de caracteres excedido. O e-mail pode conter no máximo 200 caracteres.</p>
                                </div>
                            
                            <?php

                        } else {

                            $_SESSION['usuario_nickname'] = cleanData($_POST['nomeUsuario']);
                            $_SESSION['usuario_email'] = cleanData($_POST['emailUsuario']);
                            $_SESSION['usuario_senha'] = makeHash(cleanData($_POST['senhaUsuario']));

                            header('Location: userUpdate.php');

                        }
                
                    }
                
                ?>

            </div>

            <form method="POST" action=<?php print $_SERVER['PHP_SELF']; ?> class="form-box-redefine">
                <p>
                    <input type="email" name="emailUsuario" placeholder="E-mail" class="form-input-half" />
                    <input type="password" name="senhaUsuario" placeholder="Senha" class="form-input-half" />
                </p>
                <p> <input type="text" name="nomeUsuario" placeholder="Insira seu novo nome de Usuário" class="form-input-total" /> </p>
                <p>
                    <input type="reset" name="reset" value="Redefinir" class="form-input-half" id="reset-button" />
                    <input type="submit" name="submit" value="Enviar Formulário" class="form-input-half" id="submit-button" />
                </p>
            </form>
        </div>
    </body>
</html>