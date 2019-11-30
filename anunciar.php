<?php
    session_start();

    require_once('settings/check.php');
    require_once('class/Alertas.php');
    require_once('class/Anuncio.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/anunciar.css">
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
            <li id="menuAnunciar" class="menuHome"> <a class="menuLink" href="anunciar.php" style="color: #aaaaaa;">ANUNCIE</a> </li>
            <li id="menuContato" class="menuHome"> <a class="menuLink" href="contato.php">CONTATE-NOS</a> </li>
        </ul>
    </nav>

    <div class="corpoHome">
        <div class="imagemHome">
            <img src="images/900x340_3.jpg">
        </div>
        <div class="bordaImagemHome">
            <p> Anunciar </p>

            <div id="listraImagemPrincipal"></div>
        </div>
    </div>

    <?php
        try{
            if (isset($_POST['submit'])) {
                $announce = new Anuncio();
                $alert = new Alertas();
    
                if (empty($_POST['adUsername']) || empty($_POST['adPhone']) || empty($_POST['adEmail']) || empty($_POST['adState']) || empty($_POST['adCity']) || empty($_POST['adAnimalType'])) {
                    
                    print $alert -> errorMessageAdPage('Campos com * são de preenchimento obrigatório.');

                } elseif ($announce -> contarCaracteresDaStringInserida($_POST['adUsername']) > 200) {

                    print $alert -> errorMessageAdPage('Número limite de caracteres excedido. O campo Nome Completo pode ter no máximo 200 caracteres.');

                } elseif ($announce -> contarCaracteresDaStringInserida($_POST['adPhone']) > 80) {

                    print $alert -> errorMessageAdPage('Número limite de caracteres excedido. O campo Telefone pode ter no máximo 80 caracteres.');

                } elseif ($announce -> contarCaracteresDaStringInserida($_POST['adEmail']) > 200) {

                    print $alert -> errorMessageAdPage('Número limite de caracteres excedido. O campo E-mail pode ter no máximo 200 caracteres.');

                } elseif ($announce -> contarCaracteresDaStringInserida($_POST['adState']) > 200) {

                    print $alert -> errorMessageAdPage('Número limite de caracteres excedido. O campo Estado pode ter no máximo 200 caracteres.');

                } elseif ($announce -> contarCaracteresDaStringInserida($_POST['adCity']) > 200) {

                    print $alert -> errorMessageAdPage('Número limite de caracteres excedido. O campo Cidade pode ter no máximo 200 caracteres.');

                } elseif ($announce -> contarCaracteresDaStringInserida($_POST['adAnimalName']) > 200) {

                    print $alert -> errorMessageAdPage('Número limite de caracteres excedido. O campo Nome do Mascote pode ter no máximo 200 caracteres.');

                } elseif ($announce -> contarCaracteresDaStringInserida($_POST['adAnimalType']) > 200) {

                    print $alert -> errorMessageAdPage('Número limite de caracteres excedido. O campo Tipo pode ter no máximo 100 caracteres.');

                } elseif ($announce -> contarCaracteresDaStringInserida($_POST['adAnimalFeature']) > 600) {

                    print $alert -> errorMessageAdPage('Número limite de caracteres excedido. O campo Descrição do Anúncio pode ter no máximo 200 caracteres.');

                } elseif ($announce -> contarCaracteresDaStringInserida($_POST['adAnimalDescription']) > 600) {

                    print $alert -> errorMessageAdPage('Número limite de caracteres excedido. O campo Características do Mascote pode ter no máximo 200 caracteres.');

                } else {

                    $query = 'INSERT INTO anuncio SET anuncio_nome_completo=:nomeCompleto, anuncio_numero_telefone=:telefone, anuncio_email_contato=:email, anuncio_estado_local_animal=:estado, anuncio_cidade_local_animal=:cidade, anuncio_desc=:descricao, anuncio_cod_usuario=:cod_usuario'; 

                    $submitData = $connection -> prepare($query);

                    $submitData -> bindValue(':nomeCompleto', $announce -> higienizarDados($_POST['adUsername']));
                    $submitData -> bindValue(':telefone', $announce -> higienizarDados($_POST['adPhone']));
                    $submitData -> bindValue(':email', $announce -> higienizarDados($_POST['adEmail']));
                    $submitData -> bindValue(':estado', $announce -> higienizarDados($_POST['adState']));
                    $submitData -> bindValue(':cidade', $announce -> higienizarDados($_POST['adCity']));
                    $submitData -> bindValue(':descricao', $announce -> higienizarDados($_POST['adAnimalDescription']));
                    $submitData -> bindValue(':cod_usuario', $_SESSION['codUsuario']);

                    if ($submitData -> execute()) {

                        $queryCodAnuncio = 'SELECT cod_anuncio FROM anuncio ORDER BY cod_anuncio DESC LIMIT 1';

                        $submitData = $connection -> prepare($queryCodAnuncio);;
                        $submitData -> execute();
                        $codSelected = $submitData -> fetch(PDO::FETCH_ASSOC);


                        $queryAnimal = 'INSERT INTO animal SET animal_nome=:nomeAnimal, animal_tipo=:tipoAnimal,  animal_raca=:racaAnimal, animal_sexo=:sexoAnimal, animal_porte=:porteAnimal, animal_idade=:idadeAnimal, animal_pelagem=:pelagemAnimal, animal_foto_1=:foto1, animal_foto_2=:foto2, animal_desc=:descricaoAnimal, animal_cod_usuario=:codUserAnimal, animal_cod_anuncio=:codAnuncioAnimal';

                        $submitData = $connection -> prepare($queryAnimal);


                        $submitData -> bindValue(':nomeAnimal', $announce -> higienizarDados($_POST['adAnimalName']));
                        $submitData -> bindValue(':tipoAnimal', $announce -> higienizarDados($_POST['adAnimalType']));
                        $submitData -> bindValue(':racaAnimal', $announce -> higienizarDados($_POST['adAnimalBreed']));
                        $submitData -> bindValue(':sexoAnimal', $announce -> higienizarDados($_POST['adAnimalSex']));
                        $submitData -> bindValue(':porteAnimal', $announce -> higienizarDados($_POST['adAnimalSize']));
                        $submitData -> bindValue(':idadeAnimal', $announce -> higienizarDados($_POST['adAnimalAge']));
                        $submitData -> bindValue(':pelagemAnimal', $announce -> higienizarDados($_POST['adAnimalCoat']));
                        $submitData -> bindValue(':foto1', $_POST['adAnimalPicture#1']);
                        $submitData -> bindValue(':foto2', $_POST['adAnimalPicture#3']);
                        $submitData -> bindValue(':descricaoAnimal', $announce -> higienizarDados($_POST['adAnimalFeature']));
                        $submitData -> bindValue(':codUserAnimal', $_SESSION['codUsuario']);
                        $submitData -> bindValue(':codAnuncioAnimal', $codSelected['cod_anuncio']);

                        
                        if ($submitData -> execute()) {

                            print $alert -> successMessageAdPage('Registro salvo com sucesso.');

                        } else {
                            
                            print $alert -> errorMessageAdPage('Não foi possível efetuar o registro. Por favor, tente novamente mais tarde.');

                        }

                    }

                }
            }
        } catch(PDOException $error) {
        
            print 'Conexão falhou! ' . $error -> getMessage();
        
        }

    ?>

    <form method="POST" id="formularioAnunciar" action=<?php print $_SERVER['PHP_SELF'] ?>>
        <fieldset class="formContato">
            <div class="tituloForm">
                <p>Contato</p>
            </div>

            <p class="itensFormAnunciar">
                <label for="usuarioNome">Nome Completo*:</label>
                <input class="anunciarInput" id="usuarioNome" name="adUsername" type="text" aria-placeholder="Nome Completo" placeholder="Nome Completo*">
            </p>

            <p class="itensFormAnunciar">
                <label for="usuarioTel">Número de Telefone/Celular:</label>
                <input class="anunciarInput" id="usuarioTel" name="adPhone" type="number" min="0" aria-placeholder="Telefone/Celular" placeholder="Número de Telefone/Celular*">
            </p>

            <p class="itensFormAnunciar">
                <label for="usuarioEmail">E-mail</label>
                <input class="anunciarInput" id="usuarioEmail" name="adEmail" type="email" aria-placeholder="E-mail" placeholder="E-mail*">
            </p>
        </fieldset>

        <fieldset class="formLocalizacao">
            <div class="tituloForm">
                <p>Localização</p>
            </div>

            <p class="itensFormLocalizacao">
                <label for="usuarioEstado">Estado:</label>
                <input class="localizacaoInput" id="usuarioEstado" name="adState" type="text" list="estados" aria-placeholder="Estado em que o animal localiza-se" placeholder="Estado em que o animal localiza-se*" list="estados">
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

            <p class="itensFormLocalizacao">
                <label for="usuarioCidade">Cidade:</label>
                <input class="localizacaoInput" id="usuarioCidade" name="adCity" type="text" aria-placeholder="Cidade em que o animal localiza-se" placeholder="Cidade em que o animal localiza-se*">
            </p>
        </fieldset>

        <fieldset class="formAnimal">
            <div class="tituloForm">
                <p>Mascote</p>
            </div>

            <p class="itensFormAnimal">
                <label for="animalNome">Nome do Mascote</label>
                <input class="animalInput" id="animalNome" name="adAnimalName" type="text" aria-placeholder="Nome do Mascote" placeholder="Nome do Mascote">
            </p>

            <p class="itensFormAnimal">
                <label for="animalTipo">Tipo do animal</label>
                <input class="animalInput" id="animalTipo" name="adAnimalType" type="text" aria-placeholder="Tipo" placeholder="Tipo*" list="tipo">

                <datalist id="tipo">
                        <option>Gato</option>
                        <option>Cachorro</option>
                </datalist>
            </p>

            <p class="itensSelectFormAnimal">
                <span class="esquerda">
                        <label for="animalSituacao">Situação do Animal</label>
                        <select class="itensSelecionarInput" id="animalSituacao" name="adAnimalSituation">
                            <optgroup class="opcoesSelect" label="Situação do Animal" required>
                                <option value="Achado">Achado</option>
                                <option value="Perdido">Perdido</option>
                            </optgroup>
                        </select>
                    </span>

                <span class="direita">
                        <label for="animalIdade">Idade</label>
                        <select class="itensSelecionarInput" id="animalIdade" name="adAnimalAge">
                            <optgroup class="opcoesSelect" label="Idade" required>
                                <option value="Adulto">Adulto</option>
                                <option value="Filhote">Filhote</option>
                            </optgroup>
                        </select>
                </span>
            </p>

            <p class="itensSelectFormAnimal">
                <span class="esquerda">
                    <label for="animalPelagem">Pelagem</label>
                    <select class="itensSelecionarInput" id="animalPelagem" name="adAnimalCoat">
                        <optgroup class="opcoesSelect" label="Pelagem">
                            <option value="Curto">Curta</option>
                            <option value="Média">Média</option>
                            <option value="Longa">Longa</option>
                        </optgroup>
                    </select>
                </span>

                <span class="direita">
                    <label for="animalPorte">Porte</label>
                    <select class="itensSelecionarInput" id="animalPorte" name="adAnimalSize">
                        <optgroup class="opcoesSelect" label="Porte">
                            <option value="Grande">Grande</option>
                            <option value="Médio">Médio</option>
                            <option value="Pequeno">Pequeno</option>
                        </optgroup>
                    </select>
                </span>
            </p>

            <p class="itensSelectFormAnimal">
                <span class="esquerda">
                    <label for="animalRaca">Raça</label>
                    <select class="itensSelecionarInput" id="animalRaca" name="adAnimalBreed">
                        <optgroup class="opcoesSelect" label="Raça">
                            <option value="Com raça">Com Raça</option>
                            <option value="Sem raça">Sem Raça</option>
                        </optgroup>
                    </select>
                </span>

                <span class="direita">
                    <label for="animalSexo">Sexo</label>
                    <select class="itensSelecionarInput" id="animalSexo" name="adAnimalSex">
                        <optgroup class="opcoesSelect" label="Sexo">
                            <option value="Macho">Macho</option>
                            <option value="Fêmea">Fêmea</option>
                        </optgroup>
                    </select>
                </span>
            </p>

            <p class="caixasTextoForm">
                <label for="animalDescricao">Descrição do anúncio...</label>
                <textarea class="caixaTextoAnimal" id="animalDescricao" name="adAnimalDescription" cols="20" rows="10" aria-placeholder="Descrição do Anúncio" placeholder="Descrição do Anúncio..."></textarea>

                <label for="animalCaracteristicas">Características do Mascote...</label>
                <textarea class="caixaTextoAnimal" id="animalCaracteristicas" name="adAnimalFeature" cols="20" rows="10" aria-placeholder="Características do Mascote" placeholder="Características do Mascote..."></textarea>
            </p>
        </fieldset>

        <fieldset class="formAnimalImages">
            <div class="introFormImages" id="introImagens">
                <p>Adicione aqui algumas fotos do mascote:</p>
            </div>

            <p class="itensFormImagens" id="imagensEsquerda">
                <label for="imagem1">Foto do animal:</label>
                <input type="file" class="imageInput" id="imagem1" name="adAnimalPicture#1" aria-placeholder="Imagem do Animal" placeholder="Imagem do Animal">
            </p>

            <p class="itensFormImagens" id="imagensDireita">
                <label for="imagem3">Foto do animal:</label>
                <input type="file" class="imageInput" id="imagem3" name="adAnimalPicture#3" aria-placeholder="Imagem do Animal" placeholder="Imagem do Animal">
            </p>
        </fieldset>

        <fieldset id="rodapeFormBotoes">
            <div class="buttons">
                <span class="left">
                    <input type="reset" class="formButtons" id="botaoRedefinir" aria-placeholder="Redefinir" placeholder="Redefinir">
                </span>

                <span class="right">
                    <input type="submit" name="submit" value="Enviar" class="formButtons" id="botaoEnviar" aria-placeholder="Anunciar" placeholder="Anunciar">
                </span>
            </div>
        </fieldset>
    </form>

    <div class="rodape">
        <div class="listrasRodape"></div>

        <div class="logoEsquerdaRodape">
            <a href="anunciar.php#cabecalho">
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