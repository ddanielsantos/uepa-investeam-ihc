<?php

# inicia uma sessão
session_start();

try {
  # estabelecendo a conexão com o banco de dados
  $conexao = new PDO("mysql:host=localhost;dbname=investeam","root","");

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