<!DOCTYPE html>

<html lang="PT-BR">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link rel="stylesheet" type="text/css" href="../css/redefine.css" />
        <link rel="icon" type="image/x-icon" href="../images/logomarcaPreta.png" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway&display=swap" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />

        <title>MiauCãoce se Puder</title>
    </head>

    <body>
        <div class="main-content">
            <div class="title-box">
                <h1>Guarde este código de autentição. Sua utilização será útil logo em seguida.</h1>
            </div>

            <?php
            
                /** sorteia um número aleatório
                 * no intervalo de 1 a 1 quadrilhão
                 */
                $numberDraw = rand(1, 123456789);

                /** ocorre a criptografia do número,
                 *  para gerar um código
                 */
                $numberHash = sha1(md5($numberDraw));

                session_start();

                $_SESSION['codConfirmacao'] = $numberHash;

            ?>

            <div class="code-box">
                <p> <?php print $numberHash; ?> </p>
            </div>

            <form method="POST" action="userRedefine.php" class="form-box">
                <p> <input type="submit" name="submit-code" value="OK" class="submit-button" /> </p>
            </form>
        </div>
    </body>
</html>