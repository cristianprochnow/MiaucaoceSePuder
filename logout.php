<?php
    session_start();

    require_once("config.php");
    require_once("functions.php");

    $_SESSION["isLogged"] = false;

    session_destroy();

    header("Location: login.php");
?>