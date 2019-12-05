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
                <h1>Autenticação</h1>

                <?php
                
                    if (isset($_POST['updateSubmit'])) {

                        try {

                            $query = 'SELECT cod_usuario FROM usuario WHERE usuario_senha = :senha AND usuario_email = :email';
                            $selectData = $connection -> prepare($query);

                            $selectData -> bindValue(':senha', $_SESSION['usuario_senha']);
                            $selectData -> bindValue(':email', $_SESSION['usuario_email']);

                            $selectData -> execute();
                            $rowsCount = $selectData -> rowCount();


                            if ($rowsCount > 0) {


                                while ($row = $selectData -> fetch(PDO::FETCH_ASSOC)) {

                                    extract($row);

                                }

                                $_SESSION['cod_usuario'] = $cod_usuario;

                            } else {

                                $_SESSION['cod_usuario'] = 0;

                            }

                        } catch (PDOException $error) {

                            print 'Conexão falhou! ' . $error -> getMessage();

                        }
                
                
                        if (empty($_POST['codigoUsuario'])) {
                
                            ?>
                            
                                <div class="error-box">
                                    <p>Insira o código.</p>
                                </div>
                            
                            <?php
                
                        } elseif (trim($_POST['codigoUsuario']) != $_SESSION['codConfirmacao']) {

                            ?>
                            
                                <div class="error-box">
                                    <p>Código inválido. Por favor, tente novamente.</p>
                                </div>
                            
                            <?php

                        } else {

                           try {

                                $updateQuery = 'UPDATE usuario SET usuario_nickname = :nickname WHERE cod_usuario = :cod';
                                $updateData = $connection -> prepare($updateQuery);

                                $updateData -> bindValue(':nickname', $_SESSION['usuario_nickname']);
                                $updateData -> bindValue(':cod', $_SESSION['cod_usuario']);

                                if ($updateData -> execute()) {

                                    $_SESSION['cod_usuario'] = null;
                                    $_SESSION['usuario_senha'] = null;
                                    $_SESSION['usuario_nickname'] = null;
                                    $_SESSION['usuario_email'] = null;
                                    $_SESSION['codConfirmacao'] = null;
                                    
                                    header('Location: ../login.php');

                                } else {

                                    ?>

                                        <div class="error-box">
                                            <p>Não foi possível realizar a mudança de nome de usuário. Por favor, tente novamente mais tarde.</p>
                                        </div>

                                    <?php

                                }

                            } catch (PDOException $error) {

                                print 'Conexão falhou! ' . $error -> getMessage();

                            }

                        }
                
                    }
                
                ?>

            </div>

            <form method="POST" action=<?php print $_SERVER['PHP_SELF']; ?> class="form-box-redefine">
                <p> <input type="text" name="codigoUsuario" placeholder="Insira o código de autenticação" class="form-input-total" /> </p>
                <p>
                    <input type="reset" name="reset" value="Redefinir" class="form-input-half" id="reset-button" />
                    <input type="submit" name="updateSubmit" value="Enviar Formulário" class="form-input-half" id="submit-button" />
                </p>
            </form>
        </div>
    </body>
</html>