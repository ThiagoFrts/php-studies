<?php

include_once('conexao.php');

$Nome = $_POST['nome'];
$CPF = $_POST['cpf'];
$Telefone = $_POST['telefone'];
$Endereco = $_POST['endereco'];


$insere = mysqli_query(
    $conexao,
    "INSERT INTO cliente (nome, CPF, telefone, endereco)
    VALUES ('$Nome' , '$CPF' , '$Telefone', '$Endereco')"
);

echo "Cadastro realizado com sucesso!";
?>

<a href="../../index.html"> <button>Voltar</button></a>