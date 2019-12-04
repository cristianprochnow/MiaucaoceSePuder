<?php
    session_start();

    require_once('settings/check.php');


    if (isset($_GET['cod'])) {

        $cod = $_GET['cod'];

    } else {
        
        header('Location: ../feed.php');

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

        <a class="back-link" href="rootPageAnnouncements.php"><i class="material-icons">arrow_back</i></a>

        <div class="corpoTotalProfile">

                <?php
                
                    $selectSentence = 'SELECT * FROM animal WHERE cod_animal = :codAnimal';
                    $selectData = $connection -> prepare($selectSentence);
                    
                    $codAnimal = trim(strip_tags(htmlspecialchars($cod)));
                    $selectData -> bindParam(':codAnimal', $codAnimal);

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
                                                <h1><?php print $animal_nome; ?></h1>
                                            </figcaption>
                                        </figure>
                                    </div>

                                    <div id="característicasGeraisAnimal">
                                        <div class="titulosItens">
                                            <p>Informações do Animal<i class="material-icons">pets</i> </p>
                                        </div>

                                        <div id="topicosDeCaracteristicas" class="conteudoItens">
                                            <div class="topicos" id="topicosEsquerda">
                                                <p><b>Nome: </b> <?php print $animal_nome; ?> </p>
                                                <p><b>Situação: </b> <?php print $animal_situacao; ?> </p>
                                                <p><b>Pelagem: </b> <?php print $animal_pelagem; ?> </p>
                                                <p><b>Porte: </b> <?php print $animal_porte; ?> </p>
                                            </div>

                                            <div class="topicos" id="topicosDireita">
                                                <p><b>Tipo: </b> <?php print $animal_tipo; ?> </p>
                                                <p><b>Idade: </b> <?php print $animal_idade; ?> </p>
                                                <p><b>Sexo: </b> <?php print $animal_sexo; ?> </p>
                                                <p><b>Acerca de Raça: </b> <?php print $animal_raca; ?> </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="descricaoCaracteristicasAnimal" class="itensPerfilAnimal">
                                    <div class="titulosItens">
                                        <p>Descrição das Características Gerais do Animal<i class="material-icons">mail_outline</i></p>
                                    </div>

                                    <div class="textoCaixas" id="descricaoCaracteristicas">
                                        <p> <?php print $animal_desc; ?> </p>
                                    </div>
                                </div>

                            
                            <?php

                        }

                    }

                ?>


                <?php

                    $selectText = 'SELECT * FROM anuncio, animal WHERE cod_anuncio = animal_cod_anuncio AND cod_animal = :codAnimal';
                    $selectAdData = $connection -> prepare($selectText);

                    $codAnimal = trim(strip_tags(htmlspecialchars($cod)));
                    $selectAdData -> bindParam(':codAnimal', $codAnimal);

                    $selectAdData -> execute();
                    $dataCount = $selectAdData -> rowCount();


                    if ($dataCount > 0) {

                        while ($adRow = $selectAdData -> fetch(PDO::FETCH_ASSOC)) {

                            extract($adRow);

                            ?>
                            
                                <div id="descricaoDoAnuncioAnimal" class="itensPerfilAnimal">
                                    <div class="titulosItens">
                                        <p>Descrição do Anúncio<i class="material-icons">email</i></p>
                                    </div>

                                    <div class="textoCaixas" id="descricaoDoAnuncio">
                                        <p><?php print $anuncio_desc; ?></p>
                                    </div>
                                </div>

                                <div class="itensPerfilAnimal" id="maisFotosAnimal">
                                    <div class="titulosItens">
                                        <p>Mais Imagens do Mascote<i class="material-icons">collections</i></p>
                                    </div>

                                    <div id="fotosAnimal">
                                        <ul>
                                            <li> <?php print $animal_foto_1; ?> </li>
                                            <li> <?php print $animal_foto_2; ?> </li>
                                        </ul>
                                    </div>
                                </div>

                                <div id="InformacoesContatoAnimal" class="itensPerfilAnimal">
                                    <div class="titulosItens">
                                        <p>Informações para Contato<i class="material-icons">call</i></p>
                                    </div>

                                    <div class="conteudoItens" id="contatoTopicos">
                                        <p id="NomeCompletoAnunciante"><b>Nome Completo: </b> <?php print $anuncio_nome_completo; ?> </p>

                                        <div class="topicosEsquerda">
                                            <p><b>E-mail: </b> <?php print $anuncio_email_contato; ?> </p>
                                            <p><b>Estado: </b> <?php print $anuncio_estado_local_animal; ?> </p>
                                        </div>

                                        <div class="topicosDireita">
                                            <p><b>Telefone/Celular: </b> <?php print $anuncio_numero_telefone; ?> </p>
                                            <p><b>Cidade: </b> <?php print $anuncio_cidade_local_animal; ?> </p>
                                        </div>
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