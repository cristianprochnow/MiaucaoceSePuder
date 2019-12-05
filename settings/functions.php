<?php
    function isLoggedIn() {
        if (!isset($_SESSION['isLogged']) || isset($_SESSION['isLogged']) !== true ) {
            
            return false;

        }

        return true;

    }


    function cleanData($info) {

        if (isset($info)) {

            return trim(strip_tags(htmlspecialchars($info)));

        } else {
            
            return '';

        }

    }


    function makeHash($password) {

        return sha1(md5($password));

    }
?>