<?php
# importação do arquivo de conexão com o banco
require('conection.php');

# inicia uma sessão
session_start();

try {

  # READ -> Login de usuário na plataforma
  if (isset($_POST['login'])) {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    
    # valida se os campos estão vazios
    if (($username) && ($password)) {
      # prepara uma consulta sql
      $stmt = $conexao->prepare("SELECT * FROM usuarios WHERE username = ? AND senha = ?");
      $stmt->bindValue(1, $username);
      $stmt->bindValue(2, $password);

      # executa a consulta
      $stmt->execute();
      echo $stmt->rowCount();
      # valida o usuario
      if ($stmt->rowCount() > 0) { // se encontrou algum registro
        # cria uma sessão de logado
        $_SESSION['loginok'] = 'login OK';
        header('location: ../index.php');
      } else {
        # cria uma sessão de erro para o login
        $_SESSION['loginerr'] = 'Usuário e/ou senha inválidos!';
        header('location: ../public/html/landing-page.php');
      }

    } else {
      # grava uma sessão de erro
      $_SESSION['loginerr'] = "Preencha todos os campos corretamente";

      # redireciona para página de login
      header('location: ../public/html/landing-page.php');
    }
  }
} catch (PDOException $e) {
  echo ".....=Code: " . $e->getCode() . "  ......=Mensagem: " . $e->getMessage();
}

/* 
  NOTES: 
  - fazer as mensagens de erro na página de login
  - Diferenciar se a senha foi cadastrada com letras "MAIÚSCULAS" ou "minúsculas"
  - Não esquecer de buscar as senhas com criptografia
*/