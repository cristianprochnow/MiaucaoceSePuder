<?php
    session_start();

    require_once('settings/check.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/contato.css">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <title>MiauCãoce se Puder</title>
    <link rel="icon" href="images/logomarcaPreta.png" type="image/x-icon">

    <script type="text/javascript" src="javascript/functions.js"></script>
</head>

<body>
    <header id="cabecalho">
        <img id="cabecalhoLogo" src="images/logomarcaMedia.png">

        <div id="userInteractingBox">
            <button class="userAccountButton" id="userProfileVisualizationButton" title="Visualizar Perfil">
                <?php if (isLoggedIn()): ?>
                    <a href="profile.php" id="profileViewLink" class="accountLinks">Olá, <?php print $_SESSION['nomeUsuario'] ?></a>
                <?php else: ?>
                    <a href="login.php" id="profileViewLink" class="accountLinks">Olá, Visitante!</a>
                <?php endif; ?>
            </button>

            <button class="userAccountButton" id="userProfileLogoutButton" onmouseout="changeLogoutIcon('images/white-logout-icon.png')" onmouseover="changeLogoutIcon('images/blue-logout-icon.png')" title="Fazer Logout">
                <a href="settings/logout.php" id="logoutLink" class="accountLinks" title="Fazer Logout"><img id="logout-icon" src="images/white-logout-icon.png"></a>
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
            <img src="images/900x340_9.jpg">
        </div>
        <div class="bordaImagemHome">
            <p> Contato </p>

            <div id="listraImagemPrincipal"></div>
        </div>
    </div>

    <div class="conteudoTotal">
        <div class="conteudoEsquerda">

            <?php
            
                require_once('class/Contato.php');
                require_once('class/Alertas.php');

                if (isset($_POST['submit'])) {

                    $contact = new Contato();
                    $alert = new Alertas();

                    if (empty($_POST['contactUsername']) || empty($_POST['contactUserPhone']) || empty($_POST['contactEmail']) || empty($_POST['contactUserState']) || empty($_POST['contactUserCity']) || empty($_POST['contactUserMessageTitle']) || empty($_POST['contactUserMessage'])) {

                        print $alert -> errorMessageContactPage('Campos com * são de preenchimento obrigatório.');

                    } elseif ($contact -> contarCaracteresDaStringInserida($_POST['contactUsername']) > 200) {

                        print $alert -> errorMessageContactPage('O limite de caracteres inseridos no campo Nome Completo foi excedido. É suportado até 200 caracteres.');

                    } elseif ($contact -> contarCaracteresDaStringInserida($_POST['contactUserPhone']) > 80) {

                        print $alert -> errorMessageContactPage('O limite de caracteres inseridos no campo Telefone/Celular foi excedido. É suportado até 200 caracteres.');

                    } elseif ($contact -> contarCaracteresDaStringInserida($_POST['contactEmail']) > 200) {

                        print $alert -> errorMessageContactPage('O limite de caracteres inseridos no campo E-mail foi excedido. É suportado até 200 caracteres.');

                    } elseif ($contact -> contarCaracteresDaStringInserida($_POST['contactUserState']) > 200) {

                        print $alert -> errorMessageContactPage('O limite de caracteres inseridos no campo Estado foi excedido. É suportado até 200 caracteres.');

                    } elseif ($contact -> contarCaracteresDaStringInserida($_POST['contactUserCity']) > 200) {

                        print $alert -> errorMessageContactPage('O limite de caracteres inseridos no campo Cidade foi excedido. É suportado até 200 caracteres.');

                    } elseif ($contact -> contarCaracteresDaStringInserida($_POST['contactUserMessageTitle']) > 300) {

                        print $alert -> errorMessageContactPage('O limite de caracteres inseridos no campo Assunto da Mensagem foi excedido. É suportado até 300 caracteres.');

                    } elseif ($contact -> contarCaracteresDaStringInserida($_POST['contactUserMessage']) > 600) {

                        print $alert -> errorMessageContactPage('O limite de caracteres inseridos no campo Mensagem foi excedido. É suportado até 600 caracteres.');

                    } else {
                        
                        $query = 'INSERT INTO contato SET contato_nome_completo=:nomeCompleto, contato_telefone=:telefone, contato_email=:email, contato_estado=:estado, contato_cidade=:cidade, contato_assunto=:assunto, contato_texto_mensagem=:mensagem, contato_cod_usuario=:codUsuario';

                        
                        $submitData = $connection -> prepare($query);


                        $submitData -> bindValue(':nomeCompleto', $contact -> higienizarDados($_POST['contactUsername']));
                        $submitData -> bindValue(':telefone', $contact -> higienizarDados($_POST['contactUserPhone']));
                        $submitData -> bindValue(':email', $contact -> higienizarDados($_POST['contactEmail']));
                        $submitData -> bindValue(':estado', $contact -> higienizarDados($_POST['contactUserState']));
                        $submitData -> bindValue(':cidade', $contact -> higienizarDados($_POST['contactUserCity']));
                        $submitData -> bindValue(':assunto', $contact -> higienizarDados($_POST['contactUserMessageTitle']));
                        $submitData -> bindValue(':mensagem', $contact -> higienizarDados($_POST['contactUserMessage']));
                        $submitData -> bindValue(':codUsuario', $_SESSION['codUsuario']);


                        if ($submitData -> execute()) {

                            print $alert -> successMessageContactPage('Registro salvo com sucesso. Agradecemos seu Feedback. Logo, logo, estaremos entrando em contato com você pelo e-mail anteriormente inserido.');

                        } else {
                            
                            print $alert -> errorMessageContactPage('Erro ao efetuar o registro. Por favor, tente novamente mais tarde.');

                        }

                    }

                }
            
            ?>

            <form method="POST" action=<?php print $_SERVER['PHP_SELF']; ?>>
                <div class="introForm">
                    <p>Nos dê seu Feedback:</p>
                </div>

                <p class="itensFormContato">
                    <label for="nomeCompleto">Nome Completo:</label>
                    <input type="text" class="contatoInput" id="nomeCompleto" name="contactUsername" aria-placeholder="Nome Completo" placeholder="Nome Completo*">
                </p>

                <p class="itensFormContato">
                    <label for="numeroTel">Telefone/Celular</label>
                    <input type="text" class="contatoInput" id="numeroTel" name="contactUserPhone" aria-placeholder="Telefone/Celular" placeholder="Telefone/Celular*">
                </p>

                <p class="itensFormContato">
                    <label for="email">E-mail</label>
                    <input type="email" class="contatoInput" id="email" name="contactEmail" aria-placeholder="E-mail" placeholder="E-mail*">
                </p>

                <p class="itensFormContato">
                    <label for="estado">Estado:</label>
                    <input class="contatoInput" id="estado" name="contactUserState" type="text" list="estados" aria-placeholder="Estado" placeholder="Estado*">
                </p>

                <datalist id="estados">
                    <optgroup label="Região Norte">
                        <option>Acre</option>
                        <option>Amapá</option>
                        <option>Amazonas</option>
                        <option>Pará</option>
                        <option>Rondônia</option>
                        <option>Roraima</option>
                        <option>Tocantins</option>
                    </optgroup>

                    <optgroup label="Região Nordeste">
                        <option>Alagoas</option>
                        <option>Bahia</option>
                        <option>Ceará</option>
                        <option>Maranhão</option>
                        <option>Paraíba</option>
                        <option>Pernambuco</option>
                        <option>Piauí</option>
                        <option>Rio Grande do Norte</option>
                        <option>Sergipe</option>
                    </optgroup>

                    <optgroup label="Região Centro-Oeste">
                        <option>Goiás</option>
                        <option>Mato Grosso</option>
                        <option>Mato Grosso do Sul</option>
                        <option>Distrito Federal</option>
                    </optgroup>

                    <optgroup label="Região Sudeste">
                        <option>Espírito Santo</option>
                        <option>Minas Gerais</option>
                        <option>São Paulo</option>
                        <option>Rio de Janeiro</option>
                    </optgroup>

                    <optgroup label="Região Nordeste">
                        <option>Paraná</option>
                        <option>Rio Grande do Sul</option>
                        <option>Santa Catarina</option>
                    </optgroup>
                </datalist>

                <p class="itensFormContato">
                    <label for="cidade">Cidade:</label>
                    <input class="contatoInput" id="cidade" name="contactUserCity" type="text" aria-placeholder="Cidade" placeholder="Cidade*" list="cidades">
                </p>

                <datalist id="cidades">

                    <?php
                                
                        try {

                            $query = 'SELECT contato_cidade FROM contato';
                            $selectData = $connection -> prepare($query);
                            $selectData -> execute();
                            
                            while ($cities = $selectData -> fetch(PDO::FETCH_ASSOC)) {

                                extract($cities);


                                print "<option>{$contato_cidade}</option>";

                            }


                        } catch (PDOException $error) {

                            print 'Conexão falhou!' . $error -> getMessage();

                        }

                    ?>
                
                </datalist>


                <p class="itensFormContato">
                    <label for="assuntoMensagem">Assunto:</label>
                    <input type="text" class="contatoInput" id="assuntoMensagem" name="contactUserMessageTitle" aria-placeholder="Assunto" placeholder="Assunto da Mensagem*">
                </p>

                <p class="caixaTextoContato">
                    <label for="mensagem">Mensagem:</label>
                    <textarea class="caixaTexto" id="mensagem" name="contactUserMessage" aria-placeholder="Mensagem" placeholder="Mensagem*"></textarea>
                </p>

                <div class="botoesForm">
                    <span class="botaoEsquerda">
                        <input type="reset" name="reset" class="botoesForm" id="botaoRedefinir" aria-placeholder="Redefinir" placeholder="Redefinir">
                    </span>

                    <span class="botaoDireita">
                        <input type="submit" name="submit" class="botoesForm" id="botaoEnviar" aria-placeholder="Enviar" placeholder="Enviar">
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
        <div class="listrasRodape"></div>

        <div class="logoEsquerdaRodape">
            <a href="contato.php#cabecalho">
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
</body>

</html>