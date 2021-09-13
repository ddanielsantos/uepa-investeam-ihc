<?php require('../../php/crud-usuarios.php') ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <!-- <link rel="preload"> -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InveSteam - Cadastre-se</title>
    <link rel="shortcut icon" href="../../images/logo.ico" type="image/x-icon">
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
            <div class="texts-mobile">
                <h1>Cadastre<br>-se</h1>
                <h2>Crie sua conta e venha conhecer novos projetos.</h2>               
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

                    <?php if (isset($_SESSION['created'])) { ?>
                        <div class="msg-ok">
                            <?php 
                                # exibe a mensagem da sessão
                                echo $_SESSION['created'];
                                # deleta a sessão
                                unset($_SESSION['created']);
                            ?>
                        </div>
                    <?php } ?>
                </div>

                <form action="../../php/crud-usuarios.php" method="POST">
                    <label class="obrigatorio hidden" id="field-msg">Campo Obrigatório</label>
                    <input type="text" name="nome" id="fields" placeholder="Digite o seu nome">
                    <label class="obrigatorio hidden" id="field-msg">Campo Obrigatório</label>
                    <input type="text" name="username" id="fields" placeholder="Digite seu usuário">
                    <label class="obrigatorio hidden" id="field-msg">Campo Obrigatório</label>
                    <input type="password" name="password" id="fields" placeholder="Digite sua senha">                    
                    <label class="obrigatorio hidden" id="field-msg">Campo Obrigatório</label>
                    <input type="password" name="password-repeat" id="fields" placeholder="Digite sua senha novamente">                    
                    <label class="obrigatorio hidden" id="field-msg">Campo Obrigatório</label>
                    <input type="email" name="email" id="fields" placeholder="Informe seu email">
                    <div class="tipo-usuario">
                        <h3>Tipo de usuário</h3>
                        <div class="option-user">
                            <div>
                                <input type="radio" value="investidor" name="tipo-user" id="invest" checked>
                                <label for="invest">Investidor</label>
                            </div>
                            <div>
                                <input type="radio" value="desenvolvedor" name="tipo-user" id="dev">
                                <label for="dev">Desenvolvedor</label>
                            </div>
                        </div>
                    </div>
                    <input type="submit" name="cadastrar" value="Cadastrar">
                    <a href="login.php">Login</a>
                </form>
                <div class="pagina-principal">
                    <a href="../../index.php">Página principal</a>
                </div>
            </div>
        </section>
        <section>
            <div class="texts">
                <h1>Cadastre-se</h1>                  
                <h2>Crie sua conta e venha conhecer novos projetos.</h2>          
                
                <div class="ajuda-autenticacao">
                    <div class="usuario">
                        <h4>Investidor</h4>
                        <p>Caso esteja procurando projetos de games para investir, então comece uma conta gratuita como um investidor</p>
                        <ul> O que um investidor pode fazer?
                            <li>Buscar projetos</li>
                            <li>Consultar perfil do criador do projeto</li>
                            <li>Entrar em contato com o desenvolvedor</li>
                        </ul>
                    </div>
                    <div class="usuario">
                        <h4>Desenvolvedor</h4>
                        <p>
                            Se voce é um criador de jogos com projetos em mentes mas não tem recurso finaceiro, então crie uma conta gratuita
                            como um desenvolvedor e comece a publicar projetos.
                        </p>
                        <ul> O que um desenvolvedor pode fazer?
                            <li>Criar novos projetos</li>
                            <li>Publicar projetos</li>
                            <li>Editar seus projetos publicados</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <script src="../scripts/main.js"></script>
</body>

</html>