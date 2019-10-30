<?php
    require_once('_settings/check.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="_css/contato.css">
    <link rel="stylesheet" type="text/css" href="_css/estilo.css">
    <title>MiauCãoce se Puder</title>
    <link rel="icon" href="_images/logomarcaPreta.png" type="image/x-icon">

    <script type="text/javascript" src="_javascript/functions.js"></script>
</head>

<body>
    <header id="cabecalho">
        <img id="cabecalhoLogo" src="_images/logomarcaMedia.png">

        <div id="userInteractingBox">
            <button class="userAccountButton" id="userProfileVisualizationButton">
                <a href="profile.php" id="profileViewLink" class="accountLinks">Visualizar Perfil</a>
            </button>

            <button class="userAccountButton" id="userProfileLogoutButton" onmouseout="changeLogoutIcon('_images/white-logout-icon.png')" onmouseover="changeLogoutIcon('_images/blue-logout-icon.png')">
                <a href="_settings/logout.php" id="logoutLink" class="accountLinks"><img id="logout-icon" src="_images/white-logout-icon.png"></a>
            </button>
        </div>

        <div id="listraCabecalho"></div>
    </header>

    <nav id="MenuPrincipal" class="menuPrincipal">
        <ul class="moduloTotalMenuHome">
            <li id="menuHome" class="menuHome"> <a class="menuLink" href="index.php">HOME</a> </li>
            <li id="menuFeed" class="menuHome"> <a class="menuLink" href="feed.php">ANÚNCIOS</a> </li>
            <li id="menuAnunciar" class="menuHome"> <a class="menuLink" href="anunciar.php">ANUNCIE</a> </li>
            <li id="menuContato" class="menuHome"> <a class="menuLink" href="contato.php" style="color: #aaaaaa;">CONTATE-NOS</a> </li>
        </ul>
    </nav>

    <div class="corpoHome">
        <div class="imagemHome">
            <img src="_images/900x340_9.jpg">
        </div>
        <div class="bordaImagemHome">
            <p> Contato </p>

            <div id="listraImagemPrincipal">
                <!--<img src="_images/faixaFinaAzulMedia.png">-->
            </div>
        </div>
    </div>

    <div class="conteudoTotal">
        <div class="conteudoEsquerda">
            <form method="POST" action="contatoUserMessage.php">
                <div class="introForm">
                    <p>Nos dê seu Feedback:</p>
                </div>

                <p class="itensFormContato">
                    <label for="nomeCompleto">Nome Completo:</label>
                    <input type="text" class="contatoInput" id="nomeCompleto" name="contactUsername" aria-placeholder="Nome Completo" placeholder="Nome Completo*" required>
                </p>

                <p class="itensFormContato">
                    <label for="numeroTel">Telefone/Celular</label>
                    <input type="number" min="0" class="contatoInput" id="numeroTel" name="contactUserPhone" aria-placeholder="Telefone/Celular" placeholder="Telefone/Celular*" required>
                </p>

                <p class="itensFormContato">
                    <label for="email">E-mail</label>
                    <input type="email" class="contatoInput" id="email" name="contactUserName" aria-placeholder="E-mail" placeholder="E-mail*" required>
                </p>

                <p class="itensFormContato">
                    <label for="estado">Estado:</label>
                    <input class="contatoInput" id="estado" name="contactUserState" type="text" list="estados" aria-placeholder="Estado" placeholder="Estado*" required>
                </p>

                <datalist id="estados">
                    <option value="AM">Amazonas (AM)</option>
                    <option value="RR">Roraima (RR)</option>
                    <option value="AP">Amapá (AP)</option>
                    <option value="PA">Pará (PA)</option>
                    <option value="TO">Tocantins (TO)</option>
                    <option value="RO">Rondônia (RO)</option>
                    <option value="AC">Acre (AC)</option>
                    <option value="MA">Maranhão (MA)</option>
                    <option value="PI">Piauí (PI)</option>
                    <option value="CE">Ceará (CE)</option>
                    <option value="RS">Rio Grande do Norte (RN)</option>
                    <option value="PE">Pernambuco (PE)</option>
                    <option value="PB">Paraíba (PB)</option>
                    <option value="SE">Sergipe (SE)</option>
                    <option value="AL">Alagoas (AL)</option>
                    <option value="BA">Bahia (BA)</option>
                    <option value="MT">Mato Grosso (MT)</option>
                    <option value="MS">Mato Grosso do Sul (MS)</option>
                    <option value="GO">Goiás (GO)</option>
                    <option value="RJ">Rio de Janeiro (RJ)</option>
                    <option value="SP">São Paulo (SP)</option>
                    <option value="MG">Minas Gerais (MG)</option>
                    <option value="ES">Espírito Santo (ES)</option>
                    <option value="PR">Paraná (PR)</option>
                    <option value="SC">Santa Catarina (SC)</option>
                    <option value="RS">Rio Grande do Sul (RS)</option>
                </datalist>

                <p class="itensFormContato">
                    <label for="cidade">Cidade:</label>
                    <input class="contatoInput" id="cidade" name="contactUserCity" type="text" aria-placeholder="Cidade" placeholder="Cidade*" required>
                </p>

                <p class="itensFormContato">
                    <label for="assuntoMensagem">Assunto:</label>
                    <input type="text" class="contatoInput" id="assuntoMensagem" name="contactUserMessageTitle" aria-placeholder="Assunto" placeholder="Assunto da Mensagem*" required>
                </p>

                <p class="caixaTextoContato">
                    <label for="mensagem">Mensagem:</label>
                    <textarea class="caixaTexto" id="mensagem" name="contactUserMessage" aria-placeholder="Mensagem" placeholder="Mensagem*" required></textarea>
                </p>

                <div class="botoesForm">
                    <span class="botaoEsquerda">
                        <input type="reset" class="botoesForm" id="botaoRedefinir" aria-placeholder="Redefinir" placeholder="Redefinir">
                    </span>

                    <span class="botaoDireita">
                        <input type="submit" class="botoesForm" id="botaoEnviar" aria-placeholder="Enviar" placeholder="Enviar">
                    </span>
                </div>
            </form>
        </div>

        <div class="conteudoDireita">
            <div class="localizacao">
                <h1>Nossa Localização</h1>

                <p>Santa Catarina (SC) - Brasil</p>
            </div>

            <div class="email">
                <h1>Nosso E-mail</h1>

                <p>miaucaoce@gmail.com</p>
            </div>

            <div class="aviso">
                <h1>Aviso</h1>

                <p>Este é um site destinado para auxiliar a relação entre os indivíduos que desejam encontrar seus animal que estava perdido e os indivíduos que encontram-se com esses animais. Este sistema não possui fins lucrativos</p>
            </div>
        </div>
    </div>

    <div class="rodape">
        <div class="listrasRodape">
            <!--<img src="_images/faixaFinaAzulMedia.png">-->
        </div>

        <div class="logoEsquerdaRodape">
            <a href="contato.php#cabecalho">
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
            <p><a class="menuLinkRodape" href="contato.php">Fale conosco</a></p>
            <p><a class="menuLinkRodape" href="login.php">Se cadastre</a></p>
        </div>
    </div>
</body>

</html>