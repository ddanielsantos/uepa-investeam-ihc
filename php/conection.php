<?php

# inicia uma sessão
session_start();

try {
  # estabelecendo a conexão com o banco de dados
  $db = parse_url(getenv("DATABASE_URL"));

  $conexao = new PDO("pgsql:" . sprintf(
    "host=%s;port=%s;user=%s;password=%s;dbname=%s",
    $db["host"],
    $db["port"],
    $db["user"],
    $db["pass"],
    ltrim($db["path"], "/")
));
  // $conexao = new PDO("pgsql:host=50.17.255.244;dbname=d997vi5td051t6","rfobtcvtichaaw","ba92a9958dbc4681adbc369c57bc712edef620b9eb96959368594a8927aa6ba0");

  # Tabela de usuários
  $tbusuarios = '
    CREATE TABLE IF NOT EXISTS usuarios (
      id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
      nome VARCHAR(50) NOT NULL,
      username VARCHAR(15) NOT NULL,
      senha VARCHAR(32) NOT NULL,
      email VARCHAR(50) NOT NULL,
      tipo VARCHAR(15) NOT NULL,
      telefone VARCHAR(15),
      status VARCHAR(9) NOT NULL,
      rg VARCHAR(7),
      cpf VARCHAR(14),
      cnpj VARCHAR(50),
      sexo VARCHAR(15)
    )
  ';

  # Tabela de projetos
  $tbprojetos = '
    CREATE TABLE IF NOT EXISTS projetos (
      codigo INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
      dev VARCHAR(50) NOT NULL,
      nomeProjeto VARCHAR(32) NOT NULL,
      status VARCHAR(25) NOT NULL,
      dataCriacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
      estrelas INT
    )
  ';
  
  # Executa a criação da tabela
  $conexao->exec($tbusuarios);
  $conexao->exec($tbprojetos);
} catch (PDOException $e) {
  echo "Code: " . $e->getCode() . "...Message: " . $e->getMessage();
}