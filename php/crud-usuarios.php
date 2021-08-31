<?php
# importação do arquivo de conexão com o banco
require('conection.php');

try {

  # CREATE -> Criar conta do usuário
  if (isset($_POST['cadastrar'])) {
    $name = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $passRepeat = filter_input(INPUT_POST, 'password-repeat', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $tipo = filter_input(INPUT_POST, 'tipo-user');

    # valida os campos do html
    if ($name && $username && $passRepeat && $password && $email && $tipo) {
      if ($password == $passRepeat) {
        # consulta sql
        $stmt = $conexao->prepare("SELECT * FROM usuarios WHERE username = ?");
        $stmt->bindValue(1, $username);

        #executa a consulta
        $stmt->execute();

        if ($stmt->rowCount() == 0) {
          $rs = $stmt->fetch(PDO::FETCH_ASSOC);
          # valida nome de usuairo no banco de dados
          if ($rs['username'] == $username) {
            # grava uma nova sessão de erro
            $_SESSION['loginerr'] = "Esse usuário já existe!";
            header('location: ../public/html/cadastro.php');    
          } else {
            # caso não encontre nenhum registro -> cria nova conta
            $stmt = $conexao->prepare("INSERT INTO usuarios (nome, username, senha, email, tipo, status) VALUES (?,?,?,?,?,'inativo')");
            
            # atribui os dados vindo do input direto na consulta
            $stmt->bindValue(1, $name);
            $stmt->bindValue(2, $username);
            $stmt->bindValue(3, md5($password));
            $stmt->bindValue(4, $email);
            $stmt->bindValue(5, $tipo);
  
            # executa a query
            $stmt->execute();
  
            # grava uma nova sessão de erro
            $_SESSION['created'] = "Conta criada com sucesso!";
            header('location: ../public/html/cadastro.php');  
          }
        } else {
          # grava uma nova sessão de erro
          $_SESSION['loginerr'] = "Esse usuário já existe!";
          header('location: ../public/html/cadastro.php'); 
        }
      } else {
        # grava uma nova sessão de erro
        $_SESSION['loginerr'] = "Senhas não coincidem!";
        header('location: ../public/html/cadastro.php');
      }

    } else {
      # grava uma sessão de erro
      $_SESSION['loginerr'] = "Preencha todos os campos corretamente!";
      header('location: ../public/html/cadastro.php');
    }
  }

  # READ -> Login de usuário na plataforma
  if (isset($_POST['login'])) {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    
    # valida se os campos estão vazios
    if (($username) && ($password)) {
      # prepara uma consulta sql
      $stmt = $conexao->prepare("SELECT * FROM usuarios WHERE username = ? AND senha = ?");
      $stmt->bindValue(1, $username);
      $stmt->bindValue(2, md5($password));

      # executa a consulta
      $stmt->execute(); 

      if ($stmt->rowCount() > 0) {
        # percorre os registro do banco
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);
        # valida o usuario
        # testa se password e senha são identicos aos registros do db
        if (($rs['username'] == $username) && ($rs['senha'] == md5($password))) {
          $_SESSION['loginok'] = $username;
          header('location: ../index.php');
        } else {
          # cria uma sessão de erro para o login
          $_SESSION['loginerr'] = 'Usuário e/ou senha inválidos!';
          header('location: ../public/html/login.php');  
        }
      } else {
        # cria uma sessão de erro para o login
        $_SESSION['loginerr'] = 'Usuário e/ou senha inválidos!';
        header('location: ../public/html/login.php');  
      }

    } else {
      # grava uma sessão de erro
      $_SESSION['loginerr'] = "Preencha todos os campos corretamente";

      # redireciona para página de login
      header('location: ../public/html/login.php');
    }
  }

  # Para fazer logout da conta...
  if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header('location: ../index.php');
  }

} catch (PDOException $e) {
  echo ".....=Code: " . $e->getCode() . "  ......=Mensagem: " . $e->getMessage();
}