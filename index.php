<?php
    session_start();

    require_once('settings/config.php');
    require_once('settings/functions.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <title>MiauCãoce se Puder</title>
    <link rel="icon" href="images/logomarcaPreta.png" type="image/x-icon">

    <script type="text/javascript" src="javascript/functions.js"></script>
</head>

<body>
    <div class="interface">
        <header id="cabecalho">
            <img id="cabecalhoLogo" src="images/logomarcaMedia.png">

            <div id="userInteractingBox">
                <button class="userAccountButton" id="userProfileVisualizationButton">
                    <?php if (isLoggedIn()): ?>
                        <a href="profile.php" id="profileViewLink" class="accountLinks">Olá, <?php print $_SESSION['nomeUsuario'] ?></a>
                    <?php else: ?>
                        <a href="login.php" id="profileViewLink" class="accountLinks">Olá, Visitante!</a>
                    <?php endif; ?>
                </button>

                <button class="userAccountButton" id="userProfileLogoutButton" onmouseout="changeLogoutIcon('images/white-logout-icon.png')" onmouseover="changeLogoutIcon('images/blue-logout-icon.png')">
                    <a href="settings/logout.php" id="logoutLink" class="accountLinks"><img id="logout-icon" src="images/white-logout-icon.png"></a>
                </button>
            </div>

            <div id="listraCabecalho"></div>
        </header>

        <nav id="MenuPrincipal" class="menuPrincipal">
            <ul class="moduloTotalMenuHome">
                <li id="menuHome" class="menuHome"> <a class="menuLink" href="index.php" style="color: #aaaaaa;">HOME</a> </li>
                <li id="menuFeed" class="menuHome"> <a class="menuLink" href="feed.php">ANÚNCIOS</a> </li>
                <li id="menuAnunciar" class="menuHome"> <a class="menuLink" href="anunciar.php">ANUNCIE</a> </li>
                <li id="menuContato" class="menuHome"> <a class="menuLink" href="contato.php">CONTATE-NOS</a> </li>
            </ul>
        </nav>

        <div class="corpoHome">
            <div class="imagemHome">
                <img src="images/900x340_2.jpg">
            </div>
            <div class="bordaImagemHome">
                <p> Bem-vindo! </p>

                <div id="listraImagemPrincipal"></div>
            </div>
        </div>

        <div class="corpoInterface">
            <div class="conjuntoBoxCima">
                <div class="informationBox">
                    <figure class="informationFigure">
                        <img src="images/informationIcon.png">

                        <figcaption class="legendaInformationFigure">
                            <h1>Anuncie</h1>

                            <p class="texto">Perdeu seu animal ou então achou pela rua, perdido, um mascote aleatório e está com vontade de devolvê-lo ao seu dono? Faça seu anúncio aqui.</p>

                            <button class="buttonInformationFigure">
                                <a href="anunciar.php">
                                    <p>Anunciar</p>
                                </a>
                            </button>
                        </figcaption>
                    </figure>
                </div>

                <div class="adotarBox">
                    <figure class="adotarFigure">
                        <img src="images/heartIcon.png">

                        <figcaption class="legendaAdotarFigure">
                            <h1>Reencãotre</h1>

                            <p class="texto">Seu animal de estimação fugiu? Ou então quer adotar um novo mascote? Procure aqui.</p>

                            <button class="buttonAdotarFigure">
                                <a href="feed.php">
                                    <p>Reencãotrar</p>
                                </a>
                            </button>
                        </figcaption>
                    </figure>
                </div>
            </div>

            <div class="conjuntoBoxBaixo">
                <div class="cadastroBox">
                    <figure class="cadastroFigure">
                        <img src="images/contactIcon.png">

                        <figcaption class="legendaCadastroFigure">
                            <h1>Cãodastre-se</h1>

                            <p class="texto">Garanta já a sua conta no nosso sistema. Mascotes podem ser muito imprevisíveis acerca do assunto de permanecer em sua residência.</p>

                            <button class="buttonCadastroFigure">
                                <a href="login.php">
                                    <p>Cãodastro</p>
                                </a>
                            </button>
                        </figcaption>
                    </figure>
                </div>

                <div class="contactBox">
                    <figure class="contactFigure">
                        <img src="images/contactIconCorpo.png">

                        <figcaption class="legendaContactFigure">
                            <h1>Cãotato</h1>

                            <p class="texto">Tem alguma dúvida? Deseja falar conosco? Se comunique conosco.</p>

                            <button class="buttonContactFigure">
                                <a href="contato.php">
                                    <p>Comunicar</p>
                                </a>
                            </button>
                        </figcaption>
                    </figure>
                </div>
            </div>
        </div>

        <div class="rodape">
            <div class="listrasRodape"></div>

            <div class="logoEsquerdaRodape">
                <a href="index.php#cabecalho">
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
                <p><a class="menuLinkRodape" href="contato.php">Fale conosco</a></p>
                <p><a class="menuLinkRodape" href="login.php">Se cadastre</a></p>
            </div>
        </div>
    </div>
</body>

</html>