<?php
    session_start();
    
    require_once('settings/check.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" type="text/css" href="css/profile.css">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link rel="stylesheet" type="text/css" href="css/feed.css" />
    <title>MiauCãoce se Puder</title>
    <link rel="icon" href="images/logomarcaPreta.png" type="image/x-icon">
</head>

<body>
    <div id="listraTopoSite"></div>

    <a class="back-link" href="index.php"><i class="material-icons">arrow_back</i></a>

    <?php
        require_once('settings/config.php');
        require_once('settings/check.php');

        try {

            $query = 'SELECT * FROM usuario WHERE cod_usuario=:codUsuario';
            $selectData = $connection -> prepare($query);
            $selectData -> bindValue(':codUsuario', $_SESSION['codUsuario']);
            $selectData -> execute();

            $userData = $selectData -> fetch(PDO::FETCH_ASSOC);
    ?>

    <div class="corpoTotalProfile">

        <div id="caracteristicasTopicosGeraisAnimal" class="itensPerfilAnimal">
            <div class="cabecalhoProfile">
                <figure class="fotoPerfilAnimal">
                    <figcaption class="nomeAnimal">
                        <h1><?php print $userData['usuario_nome_completo']; ?> &nbsp; <a alt="deletar perfil" href="delete.php"><i class="material-icons" title="Deletar Perfil">delete</i></a> </h1>
                    </figcaption>
                </figure>
            </div>

            <div id="característicasGeraisAnimal">
                <div class="titulosItens">
                    <p>Informações do Usuário<a href="update.php"><i class="material-icons" title="Editar Perfil">edit</i></a> </p>
                </div>

                <div id="topicosDeCaracteristicas" class="conteudoItens">
                    <div class="topicos" id="topicosEsquerda">
                        <p><b>Usuário: </b><?php print $userData['usuario_nickname']; ?></p>
                        <p><b>Telefone: </b><?php print $userData['usuario_telefone']; ?></p>
                        <p><b>Estado: </b><?php print $userData['usuario_estado']; ?></p>
                    </div>

                    <div class="topicos" id="topicosDireita">
                        <p><b>E-mail: </b><?php print $userData['usuario_email']; ?></p>
                        <p><b>Celular: </b><?php print $userData['usuario_telefone']; ?></p>
                        <p><b>Cidade: </b><?php print $userData['usuario_cidade']; ?></p>
                    </div>
                </div>
            </div>
        </div>

    <?php
        } catch (PDOException $error) {

            print 'Conexão falhou!' . $error -> getMessage();

        }
    ?>

        <div class="titulosItens">
            <p>Animais que cadastrou<i class="material-icons">pets</i> </p>
        </div>


        <div class="conteudoAnuncios">

            <?php
            
                $query = 'SELECT * FROM animal WHERE animal_cod_usuario = :codUsuario ORDER BY cod_animal DESC';
                $selectData = $connection -> prepare($query);

                $codUsuario = $_SESSION['codUsuario'];
                $selectData -> bindParam(':codUsuario', $codUsuario);

                $selectData -> execute();
                $numberOfRowsSelected = $selectData -> rowCount();


                if ($numberOfRowsSelected > 0) {


                    while ($row = $selectData -> fetch(PDO::FETCH_ASSOC)) {

                        extract($row);

                        ?>
                        
                            <div class="feed-data-box">
                                <table class="feed-table">
                                    <tr>
                                        <td id="icons-box">
                                            <?php print "<a href=''><i class='material-icons'>edit</i></a>"; ?>
                                            <?php print "<a href='animalDelete.php?cod={$cod_animal}'><i class='material-icons'>delete</i></a>"; ?>
                                        </td>
                                        <td> <b><?php print $animal_tipo ?></b> </td>
                                        <td id="animal-td"> <?php print $animal_nome ?> </td>
                                        <td id="button-cel">
                                            <div class="botaoVerMais">
                                                <button>
                                                    <?php print "<a href='animalProfile.php?cod={$cod_animal}'>Visualizar</a>"; ?>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        
                        <?php

                    }

                } else {
                    
                    ?><h1 class="title-no-data">Nenhum animal cadastrado.</h1><?php

                }
            
            ?>

        </div>
    </div>


    <div class="rodape">
        <div class="listrasRodape"></div>

        <div class="logoEsquerdaRodape">
            <a href="index.php">
                <img src="images/logomarcaQuaseNormal.png">
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