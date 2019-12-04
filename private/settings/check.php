<?php
    require_once('settings/config.php');
    require_once('settings/functions.php');

    if (!isLoggedIn()) {
        header("Location: ../login.php");
    }
?>