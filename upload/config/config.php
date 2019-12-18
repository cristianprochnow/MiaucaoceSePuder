<?php

    $host = '//';
    $dbname = '//';
    $user = '//';
    $passwd = '//';


    try {

        $connection = new PDO("mysql:host={$host};dbname={$dbname};", $user, $passwd);

    } catch(PDOException $error) {

        print 'Conexão falhou! ' . $error -> getMessage();

    }

?>