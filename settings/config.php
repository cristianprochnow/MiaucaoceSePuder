<?php
    $host = "//";
    $databaseName = "//";
    $user = "//";
    $passwd = "//";

    try {
        $connection = new PDO("mysql:host={$host};dbname={$databaseName};", $user, $passwd);
    } catch (PDOException $error) {
        echo "Conexão Falhou! " . $error -> getMessage();
    }
?>