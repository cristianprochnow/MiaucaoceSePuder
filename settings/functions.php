<?php
    function isLoggedIn() {
        if (!isset($_SESSION['isLogged']) || isset($_SESSION['isLogged']) !== true ) {
            return false;
        }

        return true;
    }
?>