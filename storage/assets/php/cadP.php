<?php

include_once('conexao.php');


$Nome = $_POST['nomeP'];
$Estoque = $_POST['estoque'];
$Preco = $_POST['preco'];

$sql = mysqli_query($conexao, "INSERT INTO produto (nome, qtd_estoque, preco)
 VALUES('$Nome', '$Estoque' , '$Preco')");

echo "Produto cadastrado!";

?>

<br><br>

<a href="../../index.html"> <button>Voltar</button></a>