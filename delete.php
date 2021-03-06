<?php

    session_start();

    require_once('settings/check.php');

?>


<!DOCTYPE html>

<html lang="PT-BR">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>MiauCãoce se Puder</title>

        <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet" />

        <link rel="stylesheet" type="text/css" href="css/estilo.css" />
        <link rel="stylesheet" type="text/css" href="css/delete.css" />

        <link rel="icon" href="images/logomarcaPreta.png" type="image/x-icon" />
    </head>

    <body>
        <div class="main-content">
            <div class="secondary-content">
                <div class="title-box">

                    <?php

                        if (isset($_POST['no-choice'])) {

                            header('Location: profile.php');
                    
                        } elseif (isset($_POST['yes-choice'])) {
                            
                            try {
                    
                                $sentenceOfDelete = 'DELETE FROM usuario WHERE cod_usuario=:codUsuario';
                                $deleteData = $connection -> prepare($sentenceOfDelete);
                    
                                $codUsuario = $_SESSION['codUsuario'];
                                $deleteData -> bindParam(':codUsuario', $codUsuario);
                    
                    
                                if ($deleteData -> execute()) {

                                    session_destroy();
                                    $_SESSION['isLogged'] = false;

                                    header('Location: index.php');
                    
                                } else {
                                
                                    print "<h1 id='error-message'>" . 'Ocorreu um erro, tente novamente mais tarde.' . "</h1>";

                                }
                    
                    
                            } catch (PDOException $error) {
                    
                                print 'Conexão falhou!' . $error -> getMessage();
                    
                            }
                    
                        }

                    ?>

                    <h1>Tem certeza que deseja excluir sua conta?</h1>
                    <h2 id="alert-message"><b>CUIDADO!</b> Ao deletar sua conta, todos os anúncios e mensagens de contato/feedback que foram feitas, também serão excluídas.</h2>
                </div>

                <form method="POST" action=<?php print $_SERVER['PHP_SELF']; ?> class="form-box">
                    <input type="submit" name="no-choice" value="Não" class="form-submit-input" id="no-submit" />
                    <input type="submit" name="yes-choice" value="Sim" class="form-submit-input" id="yes-submit" />
                </form>
            </div>
        </div>
    </body>
</html>