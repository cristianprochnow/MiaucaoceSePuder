<?php
    function makeHash($password) {
        return sha1(md5($password));
    }

    function getDataFromForm($data) {
        return htmlspecialchars(trim(strip_tags($data)));
    }
?>