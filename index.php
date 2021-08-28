<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>InvesTeam - Página Principal</title>

  <!-- CSS -->
  <link rel="stylesheet" href="public/css/main.css">
  <link rel="stylesheet" href="public/css/modal.css">

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
  <div class="container">
    <header class="cabecalho">
      <a href="index.html"><img class="logo" src="images/logo.svg" alt="logo investeam"></a>
      <form class="busca-projetos" action="" method="POST">
        <input type="text" name="buscar-projetos" placeholder="Buscar Projetos">
        <button name="buscar"></button>
      </form>
      <div class="nav-bar">
        <img  id="btn-menu" src="images/btn-menu.svg" alt="butão de menu">
        <ul class="barra-menu">
          <a href="public/html/login.php"><li>Login/Cadastro</li></a>
          <a href="#"><li>Perfil</li></a>
          <a href="#"><li>Sobre</li></a>
        </ul>
      </div>
    </header>
    <main>
      <aside class="area-top-projetos">
        <h2>Top projetos</h2>
        <div class="top-projetos">
        </div>
      </aside>
      <section class="exibe-projetos">
        <div class="projetos">
          <div class="nome-projeto">Jogo Teste 1</div>
          <div class="descricao">
            <ul>
              <li>Desenvolvedor: Fulano Tec</li>
              <li>Status: Não Iniciado</li>
              <li>Data de criação: 24/08/2021</li>
              <li>Estrelas: 60</li>
            </ul>
            <a href="#"><button>Acessar</button></a>
          </div>
        </div>
        <div class="projetos">
          <div class="nome-projeto">Jogo Teste 2</div>
          <div class="descricao">
            <ul>
              <li>Nome: Novo jogo</li>
              <li>Desenvolvedor: Ciclano games</li>
              <li>Status: Em desenvolvimento</li>
              <li>Data de criação: 16/05/2021</li>
              <li>Estrelas: 100</li>
            </ul>
            <a href="#"><button>Acessar</button></a>
          </div>
        </div>
      </section>
    </main>
  </div>
  <div class="modal">
    <div class="area-button">
      <img id="btn-close" src="images/btn-close.svg" alt="">
    </div>
    <div class="area-menu">
      <ul class="lista-menu">
        <a href="index.html"><li>Home</li></a>
        <a href="public/html/login.php"><li>Login / Cadastro</li></a>
        <a href="#"><li>Perfil</li></a>
        <a href="#"><li>Sobre</li></a>
      </ul>
    </div>
  </div>
  <script src="public/scripts/modal.js"></script>
</body>
</html>