<?php

$server = "mysql:host=localhost;dbname=investeam";
$user = "root";
$psw = "";

try {
  $conexao = new PDO($server,$user,$psw);

  # Tabela de usuários
  $bdusuarios = '
    CREATE TABLE usuarios (
      id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
      nome VARCHAR(50) NOT NULL,
      username VARCHAR(15) NOT NULL,
      senha VARCHAR(32) NOT NULL,
      email VARCHAR(50) NOT NULL,
      telefone VARCHAR(15),
      status BOOLEAN,
      rg VARCHAR(7),
      cpf VARCHAR(14),
      cnpj VARCHAR(50),
      sexo VARCHAR(15)
    )
  ';

  $conexao->exec($bdusuarios);
} catch (PDOException $e) {
  echo "Code: " . $e->getCode() . "...Message: " . $e->getMessage();
}