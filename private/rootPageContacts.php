<?php

    session_start();

    require_once('settings/check.php');

?>


<!DOCTYPE html>

<html lang="PT-BR">
    <head>
        <meta charset="UTF-8" />

        <link rel="stylesheet" type="text/css" href="../css/totalDatabasePage.css" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway&display=swap" />
        <link rel="icon" type="image/x-icon" href="../images/logomarcaPreta.png" />

        <title>MiauCãoce se Puder</title>
    </head>

    <body>
        <div class="main-content">
            <nav class="main-menu">
                <ul>
                    <li> <a href="rootPageUsers.php"> <i class="material-icons">account_box</i> Usuários</a> </li>
                    <li> <a href="rootPageAnnouncements.php"> <i class="material-icons">announcement</i> Anúncios</a> </li>
                    <li> <a href="rootPageContacts.php"> <i class="material-icons">inbox</i> <b>Feedback</b> </a> </li>
                    <li> <a href="../settings/logout.php" id="logout-link"> <i class="material-icons">input</i> Sair</a> </li>
                </ul>
            </nav>

            <div class="data-box">

                    <?php
                    
                        try {

                            $query = 'SELECT * FROM contato';
                            $selectData = $connection -> prepare($query);
                            $selectData -> execute();
                            $userAmount = $selectData -> rowCount();


                            if ($userAmount > 0) {

                                while ($row = $selectData -> fetch(PDO::FETCH_ASSOC)) {

                                    extract($row);

                                    ?>
                                    
                                        <table class="data-table-box">
                                            <tr>
                                                <td> <p><?php print $contato_nome_completo; ?></p> </td>
                                                <td id="email-box"> <p><?php print $contato_email; ?></p> </td>
                                                <td id="icons-box">
                                                    
                                                    <?php
                                                        print "<a href='contactView.php?cod={$cod_contato}'><i class='material-icons'>visibility</i></a>";
                                                        print "<a href='contactDelete.php?cod={$cod_contato}'><i class='material-icons'>delete</i></a>";
                                                    ?>

                                                </td>
                                            </tr>
                                        </table>
                                    
                                    <?php

                                }

                            } else {
                                
                                print "<p id='no-data-title'>Nenhum feedback cadastrado.</p>";
                                
                            }

                        } catch (PDOException $error) {

                            print 'Conexão falhou! ' . $error -> getMessage();

                        }
                    
                    ?>

            </div>
        </div>
    </body>
</html>