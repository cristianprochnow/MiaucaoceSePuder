<?php

    session_start();

    require_once('../settings/check.php');

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
                    <li> <a href="rootPageContacts.php"> <i class="material-icons">all_inbox</i> Feedback</a> </li>
                    <li> <a href="../settings/logout.php" id="logout-link"> <i class="material-icons">input</i> Sair</a> </li>
                </ul>
            </nav>
        </div>
    </body>
</html>