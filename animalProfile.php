<?php
    session_start();

    require_once('settings/config.php');
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

    <div class="corpoTotalProfile">

        <div id="caracteristicasTopicosGeraisAnimal" class="itensPerfilAnimal">
            <div class="cabecalhoProfile">
                <figure class="fotoPerfilAnimal">
                    <img src="images/420x313.jpg">

                    <figcaption class="nomeAnimal">
                        <h1>Felisclevilson</h1>
                    </figcaption>
                </figure>
            </div>

            <div id="característicasGeraisAnimal">
                <div class="titulosItens">
                    <p>Características Gerais do Animal</p>

                    <div class="listras">
                        <!--<img src="_images/faixaFinaAzulMedia.png">-->
                    </div>
                </div>

                <div id="topicosDeCaracteristicas" class="conteudoItens">
                    <div class="topicos" id="topicosEsquerda">
                        <p><b>Nome: </b>Felisclevilson</p>
                        <p><b>Situação: </b>Perdido</p>
                        <p><b>Pelagem: </b>Curta</p>
                        <p><b>Porte: </b>Pequeno</p>
                    </div>

                    <div class="topicos" id="topicosDireita">
                        <p><b>Tipo: </b>Esquilo</p>
                        <p><b>Idade: </b> Adulto</p>
                        <p><b>Sexo: </b> Macho</p>
                        <p><b>Acerca de Raça: </b> Com raça</p>
                    </div>
                </div>
            </div>
        </div>

        <div id="descricaoCaracteristicasAnimal" class="itensPerfilAnimal">
            <div class="titulosItens">
                <p>Descrição das Características Gerais do Animal</p>

                <div class="listras"></div>
            </div>

            <div class="textoCaixas" id="descricaoCaracteristicas">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, vulputate eu pharetra nec, mattis ac neque. Duis vulputate commodo lectus, ac blandit elit tincidunt id. Sed rhoncus, tortor sed eleifend tristique, tortor mauris
                    molestie elit, et lacinia ipsum quam nec dui. Quisque nec mauris sit amet elit iaculis pretium sit amet quis magna. Aenean velit odio, elementum in tempus ut, vehicula eu diam. Pellentesque rhoncus aliquam mattis. Ut vulputate eros
                    sed felis sodales nec vulputate justo hendrerit. Vivamus varius pretium ligula, a aliquam odio euismod sit amet. Quisque laoreet sem sit amet orci ullamcorper at ultricies metus viverra. Pellentesque arcu mauris, malesuada quis ornare
                    accumsan, blandit sed diamLorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, vulputate eu pharetra nec, mattis ac neque. Duis vulputate commodo lectus, ac blandit elit tincidunt id. Sed rhoncus, tortor sed eleifend
                    tristique, tortor mauris molestie elit, et lacinia ipsum quam nec dui. Quisque nec mauris sit amet elit iaculis pretium sit amet quis magna. Aenean velit odio, elementum in tempus ut, vehicula eu diam. Pellentesque rhoncus aliquam
                    mattis. Ut vulputate eros sed felis sodales nec vulputate justo hendrerit. Vivamus varius pretium ligula, a aliquam odio euismod sit amet. Quisque laoreet sem sit amet orci ullamcorper at ultricies metus viverra. Pellentesque arcu
                    mauris, malesuada quis ornare accumsan, blandit sed diam.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, vulputate eu pharetra nec, mattis ac neque. Duis vulputate commodo lectus, ac blandit elit tincidunt
                    id. Sed rhoncus, tortor sed eleifend tristique, tortor mauris molestie elit, et lacinia ipsum quam nec dui. Quisque nec mauris sit amet elit iaculis pretium sit amet quis magna. Aenean velit odio, elementum in tempus ut, vehicula eu
                    diam. Pellentesque rhoncus aliquam mattis. Ut vulputate eros sed felis sodales nec vulputate justo hendrerit. Vivamus varius pretium ligula, a aliquam odio euismod sit amet. Quisque laoreet sem sit amet orci ullamcorper at ultricies
                    metus viverra. Pellentesque arcu mauris, malesuada quis ornare accumsan, blandit sed diam.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, vulputate eu pharetra nec, mattis ac neque. Duis vulputate commodo
                    lectus, ac blandit elit tincidunt id. Sed rhoncus, tortor sed eleifend tristique, tortor mauris molestie elit, et lacinia ipsum quam nec dui. Quisque nec mauris sit amet elit iaculis pretium sit amet quis magna. Aenean velit odio,
                    elementum in tempus ut, vehicula eu diam. Pellentesque rhoncus aliquam mattis. Ut vulputate eros sed felis sodales nec vulputate justo hendrerit. Vivamus varius pretium ligula, a aliquam odio euismod sit amet. Quisque laoreet sem sit
                    amet orci ullamcorper at ultricies metus viverra. Pellentesque arcu mauris, malesuada quis ornare accumsan, blandit sed diam.</p>
            </div>
        </div>

        <div id="descricaoDoAnuncioAnimal" class="itensPerfilAnimal">
            <div class="titulosItens">
                <p>Descrição do Anúncio</p>

                <div class="listras"></div>
            </div>

            <div class="textoCaixas" id="descricaoDoAnuncio">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, vulputate eu pharetra nec, mattis ac neque. Duis vulputate commodo lectus, ac blandit elit tincidunt id. Sed rhoncus, tortor sed eleifend tristique, tortor mauris
                    molestie elit, et lacinia ipsum quam nec dui. Quisque nec mauris sit amet elit iaculis pretium sit amet quis magna. Aenean velit odio, elementum in tempus ut, vehicula eu diam. Pellentesque rhoncus aliquam mattis. Ut vulputate eros
                    sed felis sodales nec vulputate justo hendrerit. Vivamus varius pretium ligula, a aliquam odio euismod sit amet. Quisque laoreet sem sit amet orci ullamcorper at ultricies metus viverra. Pellentesque arcu mauris, malesuada quis ornare
                    accumsan, blandit sed diamLorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, vulputate eu pharetra nec, mattis ac neque. Duis vulputate commodo lectus, ac blandit elit tincidunt id. Sed rhoncus, tortor sed eleifend
                    tristique, tortor mauris molestie elit, et lacinia ipsum quam nec dui. Quisque nec mauris sit amet elit iaculis pretium sit amet quis magna. Aenean velit odio, elementum in tempus ut, vehicula eu diam. Pellentesque rhoncus aliquam
                    mattis. Ut vulputate eros sed felis sodales nec vulputate justo hendrerit. Vivamus varius pretium ligula, a aliquam odio euismod sit amet. Quisque laoreet sem sit amet orci ullamcorper at ultricies metus viverra. Pellentesque arcu
                    mauris, malesuada quis ornare accumsan, blandit sed diam.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, vulputate eu pharetra nec, mattis ac neque. Duis vulputate commodo lectus, ac blandit elit tincidunt
                    id. Sed rhoncus, tortor sed eleifend tristique, tortor mauris molestie elit, et lacinia ipsum quam nec dui. Quisque nec mauris sit amet elit iaculis pretium sit amet quis magna. Aenean velit odio, elementum in tempus ut, vehicula eu
                    diam. Pellentesque rhoncus aliquam mattis. Ut vulputate eros sed felis sodales nec vulputate justo hendrerit. Vivamus varius pretium ligula, a aliquam odio euismod sit amet. Quisque laoreet sem sit amet orci ullamcorper at ultricies
                    metus viverra. Pellentesque arcu mauris, malesuada quis ornare accumsan, blandit sed diam.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, vulputate eu pharetra nec, mattis ac neque. Duis vulputate commodo
                    lectus, ac blandit elit tincidunt id. Sed rhoncus, tortor sed eleifend tristique, tortor mauris molestie elit, et lacinia ipsum quam nec dui. Quisque nec mauris sit amet elit iaculis pretium sit amet quis magna. Aenean velit odio,
                    elementum in tempus ut, vehicula eu diam. Pellentesque rhoncus aliquam mattis. Ut vulputate eros sed felis sodales nec vulputate justo hendrerit. Vivamus varius pretium ligula, a aliquam odio euismod sit amet. Quisque laoreet sem sit
                    amet orci ullamcorper at ultricies metus viverra. Pellentesque arcu mauris, malesuada quis ornare accumsan, blandit sed diam.</p>
            </div>
        </div>

        <div class="itensPerfilAnimal" id="maisFotosAnimal">
            <div class="titulosItens">
                <p>Mais Imagens do Mascote</p>

                <div class="listras"></div>
            </div>

            <div id="fotosAnimal">
                <ul>
                    <li><img src="images/1280x720_1.jpg"></li>
                    <li><img src="images/1280x360_1.jpg"></li>
                    <li><img src="images/960x360_5.jpg"></li>
                    <li><img src="images/860x320_7.jpg"></li>
                </ul>
            </div>
        </div>

        <div id="InformacoesContatoAnimal" class="itensPerfilAnimal">
            <div class="titulosItens">
                <p>Informações para Contato</p>

                <div class="listras"></div>
            </div>

            <div class="conteudoItens" id="contatoTopicos">
                <p id="NomeCompletoAnunciante"><b>Nome Completo: </b>Algum Caraí</p>

                <div class="topicosEsquerda">
                    <p><b>E-mail: </b>algum.carai@gmail.com</p>
                    <p><b>Estado: </b>Santa Catarina (SC)</p>
                </div>

                <div class="topicosDireita">
                    <p><b>Telefone/Celular: </b>(47) 9 1234-5678</p>
                    <p><b>Cidade: </b>Chuville</p>
                </div>
            </div>
        </div>
    </div>

    <div class="rodape">
        <div class="listrasRodape"></div>

        <div class="logoEsquerdaRodape">
            <a href="animalProfile.php#listraTopoSite">
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