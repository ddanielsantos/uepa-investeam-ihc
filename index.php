<?php require('php/conection.php');

# Consulta os projetos
$stmt = $conexao->prepare("SELECT * FROM projetos");
$stmt->execute();
$rs = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
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
      <a href="index.php"><img class="logo" src="images/logo.svg" alt="logo investeam"></a>
      <form class="busca-projetos" action="" method="POST">
        <input type="text" name="buscar-projetos" placeholder="Buscar Projetos">
        <button name="buscar"></button>
      </form>
      <div class="nav-bar">
        <img  id="btn-menu" src="images/btn-menu.svg" alt="butão de menu">
        <ul class="barra-menu">
          <?php if (!isset($_SESSION['loginok'])) { ?>
            <a href="public/html/login.php"><li>Login/Cadastro</li></a>
          <?php } ?>
            <a href="#"><li>Sobre</li></a>
          <?php if (isset($_SESSION['loginok'])) { ?> 
            <a href="#">
              <li class="dropdown">
                <a href="#">Perfil</a>
                <ul class="dropdown-list">
                  <li><?php echo $_SESSION['loginok']; ?></li>
                  <a href="#"><li>Acessar</li></a>
                </ul>
              </li>
            </a>  
            <a onclick="return confirmExit()"><li>Sair</li></a> 
          <?php } ?>
        </ul>
      </div>
    </header>
    <main>
      <aside class="area-top-projetos">
        <h2>Top projetos</h2>
        <div class="top-projetos">
          <?php 
            $topEstrelas=0;
            for ($i=0; $i < count($rs); $i++) {
              if ($topEstrelas < $rs[$i]['estrelas']) {
                $topEstrelas = $rs[$i]['estrelas'];
              }
            }
          ?>
          <?php for ($i = 0; $i < count($rs); $i++) { ?>
            <?php if($topEstrelas == $rs[$i]['estrelas']) { ?>
              <div class="list-top-projetos">
                <ul>
                  <li>Nome: <?php echo $rs[$i]['nomeProjeto']; ?></li>
                  <li>Estrelas: <?php echo $rs[$i]['estrelas']; ?></li>
                </ul>
              </div> 
            <?php } ?>
          <?php } ?>
        </div>
      </aside>
      <section class="exibe-projetos">
        <?php 
          if (isset($_POST['buscar'])) {
            $busca = filter_input(INPUT_POST, 'buscar-projetos', FILTER_SANITIZE_STRING);
          
            if ($busca) {
              $stmt = $conexao->prepare("SELECT * FROM projetos WHERE nomeProjeto = ?");
              $stmt->bindValue(1, $busca);
              $stmt->execute();
          
              if ($stmt->rowCount() > 0) {
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
        ?>
          <!-- RESULTADO DA BUSCA -->
          <a href="index.php" class="back-search">
            <img src="images/back.svg" alt="voltar da busca">
          </a>
          <div class="projetos">
            <div class="nome-projeto"><?php echo $result['nomeProjeto']; ?></div>
            <div class="descricao">
              <ul>
                <li>Desenvolvedor: <?php echo $result['dev']; ?></li>
                <li>Status: <?php echo $result['status']; ?></li>
                <li>Postado: <?php echo $result['dataCriacao']; ?></li>
                <li>Estrelas: <?php echo $result['estrelas']; ?></li>
              </ul>
              <a href="#"><button>Acessar</button></a>
            </div>
          </div>
        <?php } else { ?>
          <!-- "NADA ENCONTRADO..." -->
          <a href="index.php" class="back-search">
            <img src="images/back.svg" alt="voltar da busca">
          </a>
          <div class="notFound">
            <p>Nada foi encontrado!</p>
          </div>
        <?php }
            } else {
              $_SESSION['error'] = "Informe os parametros de busca corretamente!";    
            } 
          } else { ?>
            <!-- "PAIGINA INICIAL" -->
            <?php if ($rs) { ?>
              <?php for ($i=0; $i < 4; $i++) { ?>
                <div class="projetos">
                  <div class="nome-projeto"><?php echo $rs[$i]['nomeProjeto']; ?></div>
                  <div class="descricao">
                    <ul>
                      <li>Desenvolvedor: <?php echo $rs[$i]['dev']; ?></li>
                      <li>Status: <?php echo $rs[$i]['status']; ?></li>
                      <li>Postado: <?php echo $rs[$i]['dataCriacao']; ?></li>
                      <li>Estrelas: <?php echo $rs[$i]['estrelas']; ?></li>
                    </ul>
                    <a href="#"><button>Acessar</button></a>
                  </div>
                </div>
              <?php } ?>
            <?php } else { ?>
              <div class="notFound">
                <p>Nada foi encontrado!</p>
              </div>
            <?php }?>
          <?php }?>

      </section>
    </main>
  </div>
  <div class="modal">
    <div class="area-button">
      <img id="btn-close" src="images/btn-close.svg" alt="fechar">
    </div>
    <div class="area-menu">
      <ul class="lista-menu">
        <a href="index.php"><li>Home</li></a>
        <?php if (!isset($_SESSION['loginok'])) { ?>
          <a href="public/html/login.php"><li>Login / Cadastro</li></a>
          <?php } ?>
          <a href="#"><li>Sobre</li></a>
          <?php if (isset($_SESSION['loginok'])) { ?> 
            <a href="#"><li>Perfil</li></a>
            <a onclick="return confirmExit()"><li>Sair</li></a>
          <?php } ?>
      </ul>
    </div>

    <div class="confirmLogout hidden">
      <div class="box-message">
        <h3>Deseja sair da conta?</h3>
        <div class="buttons-action">
          <button id="confirm">Confirmar</button>
          <button id="cancel">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
  <script src="public/scripts/modal.js"></script>
</body>
</html>

<!-- 
  --- ANOTAÇÔES --- 
  # Mostrar um extenção com o nome de 
    usuário quando criclar em perfil;
-->