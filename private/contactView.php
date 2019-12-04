<?php
    session_start();

    require_once('settings/config.php');
    require_once('settings/functions.php');
    require_once('settings/check.php');


    if (isset($_GET['cod'])) {

        $cod = $_GET['cod'];

    } else {
        
        header('Location: rootPageContacts.php');

    }
?>

<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" type="text/css" href="../css/profile.css">
        <link rel="stylesheet" type="text/css" href="../css/estilo.css">
        <title>MiauCãoce se Puder</title>
        <link rel="icon" href="../images/logomarcaPreta.png" type="image/x-icon">
    </head>

    <body>
        <div id="listraTopoSite"></div>

        <a class="back-link" href="rootPageContacts.php"><i class="material-icons">arrow_back</i></a>

        <div class="corpoTotalProfile">

                <?php
                
                    $selectSentence = 'SELECT * FROM contato WHERE cod_contato = :cod';
                    $selectData = $connection -> prepare($selectSentence);
                    
                    $codContato = trim(strip_tags(htmlspecialchars($cod)));
                    $selectData -> bindParam(':cod', $codContato);

                    $selectData -> execute();
                    $selectCount = $selectData -> rowCount();


                    if ($selectCount > 0) {

                        while ($row = $selectData -> fetch(PDO::FETCH_ASSOC)) {

                            extract($row);

                            ?>
                            
                                <div id="caracteristicasTopicosGeraisAnimal" class="itensPerfilAnimal">
                                    <div class="cabecalhoProfile">
                                        <figure class="fotoPerfilAnimal">
                                            <figcaption class="nomeAnimal">
                                                <h1><?php print $contato_nome_completo; ?></h1>
                                            </figcaption>
                                        </figure>
                                    </div>

                                    <div id="característicasGeraisAnimal">
                                        <div class="titulosItens">
                                            <p>Informações do Usuário<i class="material-icons">person</i> </p>
                                        </div>

                                        <div id="topicosDeCaracteristicas" class="conteudoItens">
                                            <div class="topicos" id="topicosEsquerda">
                                                <p><b>E-mail: </b> <?php print $contato_email; ?> </p>
                                                <p><b>Telefone: </b> <?php print $contato_telefone; ?> </p>
                                            </div>

                                            <div class="topicos" id="topicosDireita">
                                                
                                                <p><b>Estado: </b> <?php print $contato_estado; ?> </p>
                                                <p><b>Cidade: </b> <?php print $contato_cidade; ?> </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="descricaoCaracteristicasAnimal" class="itensPerfilAnimal">
                                    <div class="titulosItens">
                                        <p>Assunto da Mensagem<i class="material-icons">mail_outline</i></p>
                                    </div>

                                    <div class="textoCaixas" id="descricaoCaracteristicas">
                                        <p> <?php print $contato_assunto; ?> </p>
                                    </div>
                                </div>

                            
                            <?php

                        }

                    }

                ?>


                <?php

                    $selectSentence = 'SELECT * FROM contato WHERE cod_contato = :cod';
                    $selectData = $connection -> prepare($selectSentence);

                    $codContato = trim(strip_tags(htmlspecialchars($cod)));
                    $selectData -> bindParam(':cod', $codContato);

                    $selectData -> execute();
                    $dataCount = $selectData -> rowCount();


                    if ($dataCount > 0) {

                        while ($row = $selectData -> fetch(PDO::FETCH_ASSOC)) {

                            extract($row);

                            ?>
                            
                                <div id="descricaoDoAnuncioAnimal" class="itensPerfilAnimal">
                                    <div class="titulosItens">
                                        <p>Descrição do Anúncio<i class="material-icons">email</i></p>
                                    </div>

                                    <div class="textoCaixas" id="descricaoDoAnuncio">
                                        <p><?php print $contato_texto_mensagem; ?></p>
                                    </div>
                                </div>

                                <?php

                        }

                    }

                ?>

        </div>

        <div class="rodape">
            <div class="listrasRodape"></div>

            <div class="logoEsquerdaRodape">
                <a href="animalProfile.php#listraTopoSite">
                    <img src="../images/logomarcaQuaseNormal.png">
                </a>
            </div>

            <div class="copyright">
                <p>
                    <b> MiauCãoce se Puder &copy; </b> - Todos os direitos reservados
                </p>
            </div>

            <div class="menuRodape">
                <p><a class="menuLinkRodape" href="index.php">Home</a></p>
                <p><a class="menuLinkRodape" href="feed.php">Perdeu seu mascote?</a></p>
                <p><a class="menuLinkRodape" href="anunciar.php">Achou um mascote ou então ele acabou de fugir?</a></p>
                <p><a class="menuLinkRodape" href="contato.php">Contate-nos</a></p>
                <p><a class="menuLinkRodape" href="login.php">Se cadastre</a></p>
            </div>
        </div>
    </body>
</html>