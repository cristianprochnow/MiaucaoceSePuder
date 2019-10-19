<?php
    require_once("config.php");

    function isLoggedIn() {
        if (!isset($_SESSION["isLogged"]) || isset($_SESSION["isLogged"]) !== true ) {
            return false;
        }

        return true;
    }

    if (!isLoggedIn()) {
        header("Location: ../login.php");
    }
?>