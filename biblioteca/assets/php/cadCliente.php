<?php
include_once('conexao.php');

$Nome = $_POST['nome'];
$Telefone = $_POST['telefone'];
$CPF = $_POST['cpf'];

$insere = mysqli_query(
    $conexao,
    "INSERT INTO cliente(nome, telefone, cpf) 
    VALUES ('$Nome', '$Telefone', '$CPF')"
);

echo "<h2>Cadastro de cliente realizado!!</h2>";

?>

<a href="inicio.php"><button>Voltar para a aba incial</button></a>
