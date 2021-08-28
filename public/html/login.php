<?php require('../../php/crud-usuarios.php');?>

<!DOCTYPE html>
<html lang="pt-Br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InveSteam - Landing page</title>
    <link rel="stylesheet" href="../css/cad-login.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700&display=auto" rel="stylesheet">
</head>

<body>
    <main>
        <div class="container">
            
        </div>
        <section>
            <div class="texts">
                <h1>Login</h1>
                <h2>Faça login e já comece a investir.</h2>
            </div>
        </section>
        <section>
            <div class="texts-mobile">
                <h1>Login</h1>
                <h2>Faça login e já comece a investir.</h2>
            </div>

            <div id="login-area">
                <div class="msg-box">
                    <?php if (isset($_SESSION['loginerr'])) { ?>
                        <div class="msg-error">
                            <?php 
                                # exibe a mensagem da sessão
                                echo $_SESSION['loginerr'];
                                # deleta a sessão
                                unset($_SESSION['loginerr']);
                            ?>
                        </div>
                    <?php } ?>
                </div>
                <form action="../../php/crud-usuarios.php" method="POST">
                    <input type="text" name="username" id="username" placeholder="Insira o seu username">
                    <input type="password" name="password" id="password" placeholder="Insira a sua senha">
                    <a href="cadastro.php">Cadastrar-se</a>
                    <input type="submit" name="login" value="Login">
                </form>
            </div>
        </section>
    </main>

</body>

</html>