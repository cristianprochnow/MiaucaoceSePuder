<?php
    session_start();
    
    require_once('_settings/check.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="_css/profile.css">
    <link rel="stylesheet" type="text/css" href="_css/estilo.css">
    <title>MiauCãoce se Puder</title>
    <link rel="icon" href="_images/logomarcaPreta.png" type="image/x-icon">
</head>

<body>
    <div id="listraTopoSite">
        <!--<img id="listraTopoSite" src="_images/faixaFinaAzul.png">-->
    </div>

    <div class="corpoTotalProfile">

        <div id="caracteristicasTopicosGeraisAnimal" class="itensPerfilAnimal">
            <div class="cabecalhoProfile">
                <figure class="fotoPerfilAnimal">
                    <img src="_images/1280x720_7.jpg">

                    <figcaption class="nomeAnimal">
                        <h1>Godobertozin</h1>
                    </figcaption>
                </figure>
            </div>

            <div id="característicasGeraisAnimal">
                <div class="titulosItens">
                    <p>Informações do Usuário</p>

                    <div class="listras">
                        <!--<img src="_images/faixaFinaAzulMedia.png">-->
                    </div>
                </div>

                <div id="topicosDeCaracteristicas" class="conteudoItens">
                    <div class="topicos" id="topicosEsquerda">
                        <p><b>Nome Completo: </b>Godoberto Anastácio de Souza Moraes</p>
                        <p><b>Telefone: </b>(47) 3437-1234</p>
                        <p><b>Estado: </b>Santa Catarina</p>
                    </div>

                    <div class="topicos" id="topicosDireita">
                        <p><b>E-mail: </b>godobertozin@gmail.com</p>
                        <p><b>Celular: </b>(47) 9 1234-5678</p>
                        <p><b>Cidade: </b> Chuville</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="rodape">
        <div class="listrasRodape">
            <!--<img src="_images/faixaFinaAzulMedia.png">-->
        </div>

        <div class="logoEsquerdaRodape">
            <a href="index.php">
                <img src="_images/logomarcaQuaseNormal.png">
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