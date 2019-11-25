<?php
    session_start();
    
    require_once('settings/check.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/profile.css">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <title>MiauCãoce se Puder</title>
    <link rel="icon" href="images/logomarcaPreta.png" type="image/x-icon">
</head>

<body>
    <div id="listraTopoSite"></div>

    <a class="back-link" href="index.php"><img src="images/icone-voltar-30x30.png"></a>

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
                        <h1><?php print $userData['usuario_nome_completo']; ?></h1>
                    </figcaption>
                </figure>
            </div>

            <div id="característicasGeraisAnimal">
                <div class="titulosItens">
                    <p>Informações do Usuário</p>

                    <div class="listras"></div>
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
    </div>

    <?php
        } catch (PDOException $error) {

            print 'Conexão falhou!' . $error -> getMessage();

        }
    ?>

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