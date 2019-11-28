<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/login.css">
        <link rel="icon" href="images/logomarcaPreta.png" type="image/x-icon">
        <title>MiauCãoce se Puder</title>
    </head>

    <body>
        <div class="loginPage">
            <a href="login.php">
                <div class="imageLogo">
                    <img id="headerImage" src="images/logomarcaPequena.png" title="Voltar ao Login">
                </div>
            </a>

            <?php
                require_once('settings/config.php');
                require_once('class/Cadastro.php');
                require_once('class/Alertas.php');

                try {
                    if (isset($_POST['register'])) {
                        $register = new Cadastro();
                        $alert = new Alertas();

                        $queryOfVerification = 'SELECT COUNT(usuario_nickname) AS qtd_usuario FROM usuario WHERE usuario_nickname =:nickname';
                        $verificationExecute = $connection -> prepare($queryOfVerification);

                        $verificationExecute -> bindValue(':nickname', $register -> higienizarDados($_POST['registerNickname']));

                        $verificationExecute -> execute();
                        $resultOfVerification = $verificationExecute -> fetch(PDO::FETCH_ASSOC);

                        if (empty($_POST['registerNickname']) || empty($_POST['registerPassword']) || empty($_POST['registerUsername']) || empty($_POST['registerEmail']) || empty($_POST['registerTelefone']) || empty($_POST['registerEstado']) || empty($_POST['registerCidade'])) {
                            print $alert -> errorMessage('Campos com * são de preenchimento obrigatório.');
                        } elseif ($resultOfVerification['qtd_usuario'] > 0) { 
                            print $alert -> errorMessage('Este nome de usuário já existe. Por favor, selecione outro.');
                        } elseif ($register -> contarCaracteresDaStringInserida($_POST['registerNickname']) > 80) {
                            print $alert -> errorMessage('Número inválido de caracteres. O campo Usuário pode conter no máximo 80 caracteres.');
                        } elseif ($register -> contarCaracteresDaStringInserida($_POST['registerTelefone']) > 80) {
                            print $alert -> errorMessage('Número inválido de caracteres. O campo Telefone pode conter no máximo 80 caracteres.'); 
                        } elseif ($register -> contarCaracteresDaStringInserida($_POST['registerEstado']) > 200) {
                            print $alert -> errorMessage('Número inválido de caracteres. O campo Estado pode conter no máximo 200 caracteres.'); 
                        } elseif ($register -> contarCaracteresDaStringInserida($_POST['registerCidade']) > 200) {
                            print $alert -> errorMessage('Número inválido de caracteres. O campo Cidade pode conter no máximo 200 caracteres.'); 
                        } elseif ($register -> contarCaracteresDaStringInserida($_POST['registerPassword']) > 20) {
                            print $alert -> errorMessage('Número inválido de caracteres. O campo Senha pode conter no máximo 20 caracteres.');
                        } elseif ($register -> higienizarDados($_POST['registerPassword']) != $register -> higienizarDados($_POST['registerPasswordConfirmation'])) {
                            print $alert -> errorMessage('As senhas que foram inseridas são diferentes. Insira as mesmas senhas nos campos Senha e Confirme sua Senha');
                        } elseif ($register -> contarCaracteresDaStringInserida($_POST['registerUsername']) > 200) {
                            print $alert -> errorMessage('Número inválido de caracteres. O campo Nome Completo pode conter no máximo 200 caracteres.');
                        } elseif ($register -> contarCaracteresDaStringInserida($_POST['registerEmail']) > 200) {
                            print $alert -> errorMessage('Número inválido de caracteres. O campo E-mail pode conter no máximo 200 caracteres.');
                        } else {
                            $query = 'INSERT INTO usuario SET usuario_nickname=:nickname, usuario_senha=:senha, usuario_nome_completo=:nomeCompleto, usuario_email=:email, usuario_telefone=:telefone, usuario_estado=:estado, usuario_cidade=:cidade, usuario_tipo=:tipoUsuario';

                            $submitData = $connection -> prepare($query);

                            $submitData -> bindValue(':nickname', $register -> higienizarDados($_POST['registerNickname']));
                            $submitData -> bindValue(':senha', $register -> criptografarSenha($register -> higienizarDados($_POST['registerPassword'])));
                            $submitData -> bindValue(':nomeCompleto', $register -> higienizarDados($_POST['registerUsername']));
                            $submitData -> bindValue(':telefone', $register -> higienizarDados($_POST['registerTelefone']));
                            $submitData -> bindValue(':estado', $register -> higienizarDados($_POST['registerEstado']));
                            $submitData -> bindValue(':cidade', $register -> higienizarDados($_POST['registerCidade']));
                            $submitData -> bindValue(':email', $register -> higienizarDados($_POST['registerEmail']));
                            $submitData -> bindValue(':tipoUsuario', 0);

                            if ($submitData -> execute()) {
                                print $alert -> successMessage('Registro salvo com sucesso!');

                                print "<div class='link-login-from-register-page'><a href='login.php'>Fazer Login</a></div>";
                            } else {
                                print $alert -> errorMessage('Não foi possível efetuar o registro. Por favor, tente novamente mais tarde.');
                            }
                        }
                    }
                } catch (PDOException $error) {
                    print 'Conexão falhou! ' . $error -> getMessage();
                }
            ?>

            <form method="POST" role="form" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>>
                <fieldset id="formLogin">

                    <p class="UserLogin">
                        <label for="userLogin">Usuário*</label>
                        <input class="userLogin" id="userLogin" name="registerNickname" type="text" aria-label="Usuário" placeholder="Usuário*">
                    </p>

                    <p class="UserLogin">
                        <label for="userPassword">Senha*</label>
                        <input class="userLogin" id="userPassword" name="registerPassword"  type="password" aria-label="Senha" placeholder="Senha*">
                    </p>

                    <p class="UserLogin">
                        <label for="userPassword">Confirme sua Senha*</label>
                        <input class="userLogin" id="userPassword" name="registerPasswordConfirmation" type="password" aria-label="Senha" placeholder="Confirme sua Senha*">
                    </p>

                    <p class="UserLogin">
                        <label for="userName">Nome Completo*</label>
                        <input class="userLogin" id="userName" name="registerUsername" type="text" aria-label="Nome Completo" placeholder="Nome Completo*">
                    </p>

                    <p class="UserLogin">
                        <label for="userEmail">E-mail para contato*</label>
                        <input class="userLogin" id="userEmail" name="registerEmail" type="email" aria-label="E-mail" placeholder="E-mail*">
                    </p>

                    <p class="UserLogin">
                        <label for="userTelefone">Telefone/Celular*</label>
                        <input class="userLogin" id="userTelefone" name="registerTelefone" type="text" aria-label="Telefone/Celular" placeholder="Telefone/Celular*">
                    </p>

                    <p class="UserLogin">
                        <label for="userEstado">Estado*</label>
                        <input class="userLogin" id="userEstado" list="estados" name="registerEstado" type="text" aria-label="Estado" placeholder="Estado*">

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
                    </p>

                    <p class="UserLogin">
                        <label for="userCidade">Cidade*</label>
                        <input class="userLogin" id="userCidade" name="registerCidade" type="text" aria-label="Cidade" placeholder="Cidade*" list="cidades">

                        <datalist id="cidades">
                            <?php
                            
                                try {

                                    $query = 'SELECT contato_cidade FROM contato';
                                    $selectData = $connection -> prepare($query);
                                    $selectData -> execute();
                                    $cities = $selectData -> fetch(PDO::FETCH_ASSOC);

                                    foreach ($cities as $row) {

                                        print '<option>' . $row['usuario_cidade'] . '</option>';

                                    }

                                } catch (PDOException $error) {

                                    print 'Conexão falhou!' . $error -> getMessage();

                                }
                            
                            ?>
                        </datalist>
                    </p>

                    <input type="submit" value="Cadastrar" name="register" class="enterButton">
                </fieldset>
            </form>
            <div id="rodapePicture"></div>
        </div>
    </body>
</html>