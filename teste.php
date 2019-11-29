<?php

    require_once('settings/config.php');


    try {

        $query = 'SELECT animal_foto_1, animal_foto_2 FROM animal WHERE cod_animal = 8';
        $selectData = $connection -> prepare($query);
        $selectData -> execute();
        $data = $selectData -> fetch(PDO::FETCH_ASSOC);

        print $data['animal_foto_1'];
        print $data['animal_foto_2'];

    } catch (PDOException $error) {

        print 'Conexão falhou! ' . $error -> getMessage();

    }

?>