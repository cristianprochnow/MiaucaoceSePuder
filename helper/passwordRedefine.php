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
                <h1>Redefinir a senha</h1>

                <?php
                
                    if (isset($_POST['submit'])) {
                
                
                        if (empty($_POST['nomeUsuario']) || empty($_POST['emailUsuario']) || empty($_POST['senhaUsuario']) || empty($_POST['senhaConfirmacao'])) {
                
                            ?>
                            
                                <div class="error-box">
                                    <p>Preencha os campos.</p>
                                </div>
                            
                            <?php
                
                        } elseif (strlen(trim($_POST['senhaUsuario'])) > 20 || strlen(trim($_POST['senhaConfirmacao'])) > 20) {
                            
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

                        } elseif (trim($_POST['senhaUsuario']) != trim($_POST['senhaConfirmacao'])) {

                            ?>
                            
                                <div class="error-box">
                                    <p>As duas inseridas são diferentes. Por favor, digite duas combinações que sejam iguais.</p>
                                </div>
                            
                            <?php

                        } else {

                            $_SESSION['usuario_nickname'] = cleanData($_POST['nomeUsuario']);
                            $_SESSION['usuario_email'] = cleanData($_POST['emailUsuario']);
                            $_SESSION['usuario_senha'] = makeHash(cleanData($_POST['senhaUsuario']));

                            header('Location: passwordUpdate.php');

                        }
                
                    }
                
                ?>

            </div>

            <form method="POST" action=<?php print $_SERVER['PHP_SELF']; ?> class="form-box-redefine">
                <p>
                    <input type="text" name="nomeUsuario" placeholder="Usuário" class="form-input-half" />
                    <input type="email" name="emailUsuario" placeholder="E-mail" class="form-input-half" />
                </p>
                <p> <input type="password" name="senhaUsuario" placeholder="Insira sua nova senha" class="form-input-total" /> </p>
                <p> <input type="password" name="senhaConfirmacao" placeholder="Insira a senha novamente" class="form-input-total" /> </p>
                <p>
                    <input type="reset" name="reset" value="Redefinir" class="form-input-half" id="reset-button" />
                    <input type="submit" name="submit" value="Enviar Formulário" class="form-input-half" id="submit-button" />
                </p>
            </form>
        </div>
    </body>
</html>