<?php
    session_start();

    require_once("config.php");

    $_SESSION["isLogged"] = false;

    session_destroy();

    header("Location: ../login.php");
?>