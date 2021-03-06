<?php

    session_start();

    require_once('settings/check.php');

    if (isset($_GET['cod'])) {

        $_SESSION['codContato'] = trim(strip_tags(htmlspecialchars($_GET['cod'])));

    } else {
        
        header('Location: profile.php');

    }

?>


<!DOCTYPE html>

<html lang="PT-BR">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>MiauCãoce se Puder</title>

        <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet" />

        <link rel="stylesheet" type="text/css" href="../css/estilo.css" />
        <link rel="stylesheet" type="text/css" href="../css/delete.css" />

        <link rel="icon" href="../images/logomarcaPreta.png" type="image/x-icon" />
    </head>

    <body>
        <div class="main-content">
            <div class="secondary-content">
                <div class="title-box">

                    <?php

                            if (isset($_POST['no-choice'])) {

                                header('Location: rootPageContacts.php');
                        
                            } elseif (isset($_POST['yes-choice'])) {
                                
                                try {

                                    $sentenceOfDelete = 'DELETE FROM contato WHERE cod_contato = :cod';
                                    $deleteData = $connection -> prepare($sentenceOfDelete);
                        
                                    $deleteData -> bindValue(':cod', $_SESSION['codContato']);
                        
                        
                                    if ($deleteData -> execute()) {

                                        $_SESSION['codContato'] = null;
    
                                        header('Location: rootPageContacts.php');
                        
                                    } else {
                                    
                                        print "<h1 id='error-message'>" . 'Ocorreu um erro, tente novamente mais tarde.' . "</h1>";
    
                                    }
                        
                                } catch (PDOException $error) {
                        
                                    print 'Conexão falhou!' . $error -> getMessage();
                        
                                }

                        }

                    ?>

                    <h1>Tem certeza que deseja excluir a mensagem?</h1>
                </div>

                <form method="POST" action=<?php print $_SERVER['PHP_SELF']; ?> class="form-box">
                    <input type="submit" name="no-choice" value="Não" class="form-submit-input" id="no-submit" />
                    <input type="submit" name="yes-choice" value="Sim" class="form-submit-input" id="yes-submit" />
                </form>
            </div>
        </div>
    </body>
</html>