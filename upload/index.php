<?php

    require_once('config/config.php');


    // verifica se o formulário foi enviado
    if (isset($_POST['submit'])) {

        // verifica se o arquivo foi enviado
        if (isset($_FILES['file'])) {

            // define a pasta física que os arquivos ficarão
            $diretorio = 'archive/';


            // verifica se o arquivo é .png ou .jpg
            if ($_FILES['file']['type'] == "image/png") {

                /** criptografa o nome inteiro no arquivo, seguido assim
                 *  da hora que foi feito o upload, para que não haja
                 *  nenhum arquivo com mesmo nome na pasta de destino
                 */
                $novoNomeArquivo = sha1(md5($_FILES['file']['name'] . time())) . '.png';

            } elseif ($_FILES['file']['type'] == 'image/jpeg') {

                $novoNomeArquivo = sha1(md5($_FILES['file']['name'] . time())) . '.jpg';
        
            } elseif ($_FILES['file']['type'] != 'image/jpeg' || $_FILES['file']['type'] != 'image/png') {

                print "<p>Formato inválido de arquivo, apenas arquivos .jpg, .jpeg e .png são suportados.</p>";

                print "<a href='index.php'>Tentar novamente</a>";

                exit;

            }

            /** move os arquivos guardados no repositório temporário do PHP, para 
             *  a pasta "archive", que está criada junto com o projeto
             */
            move_uploaded_file($_FILES['file']['tmp_name'], $diretorio . $novoNomeArquivo);

            $caminhoArquivo = $novoNomeArquivo;

            $query = 'INSERT INTO files SET name_file = :nomeArquivo, file = NULL, upload_date = NOW()';
            $submitData = $connection -> prepare($query);

            $submitData -> bindParam(':nomeArquivo', $caminhoArquivo);


            if ($submitData -> execute()) {

                print "<p>Upload realizado com sucesso.</p> <a href='view.php'>Ver imagens</a>";

            }

        }

    }

?>

<!DOCTYPE html>

<html lang="PT-BR">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link rel="icon" type="image/x-icon" href="image/upload-icon.png" />

        <title>Upload de Arquivos com PHP</title>
    </head>

    <body>
        <h1>Upload de arquivos com PHP</h1>
        
        <!--
            quando envia-se arquivos pelo form, a tag enctype="multipart/form-data" 
            é OBRIGATÓRIA
        -->
        <form method="POST" action="index.php" enctype="multipart/form-data">
            <fieldset>
                <legend>Upload</legend>

                <input type="file" name="file" required />

                <input type="submit" name="submit" value="Enviar" />
            </fieldset>
        </form>
    </body>
</html>