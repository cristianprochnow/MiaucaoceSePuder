<?php
    require_once("config.php");
    require_once("functions.php");

    if (!isLoggedIn()) {
        header("Location: login.php");
    }
?>