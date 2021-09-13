<?php require('../../php/crud-usuarios.php');?>

<!DOCTYPE html>
<html lang="pt-Br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../images/logo.ico" type="image/x-icon">
    <title>InveSteam - Login</title>
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

                <div class="ajuda-autenticacao">
                    <div class="usuario">
                        <h4>Informações de login</h4>
                        <p>Caso ja tenha criado sua conta gratuita, faça login com o usuario e senha cadastrado</p>
                        <ul> Recomendações
                            <li>Todos os campos são obrigatórios</li>
                            <li>Para uma senha segura, escolha uma com pelo menos 8 caractes entre maiúculos e minúsculos</li>
                        </ul>
                    </div>
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
                    <label class="obrigatorio hidden" id="field-msg">Campo Obrigatório</label>
                    <input type="text" name="username" id="fields" placeholder="Insira o seu username">
                    <label class="obrigatorio hidden" id="field-msg">Campo Obrigatório</label>
                    <input type="password" name="password" id="fields" placeholder="Insira a sua senha">
                    <a href="cadastro.php">Cadastrar-se</a>
                    <input type="submit" name="login" value="Login">
                </form>
                <div class="pagina-principal">
                    <a href="../../index.php">Página principal</a>
                </div>
                <div class="redefinir-senha">
                    <a href="#">Esqueceu a senha?</a>
                </div>
            </div>
        </section>
    </main>
    <script src="../scripts/main.js"></script>                         
</body>

</html>