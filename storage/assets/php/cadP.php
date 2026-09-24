<?php

include_once('conexao.php');


$Nome = $_POST['nomeP'];
$Estoque = $_POST['estoque'];
$Preco = $_POST['preco'];
$Fornecedor = $_POST['id_fornecedor'];


$sql = mysqli_query(
    $conexao,
    "INSERT INTO produto (nome, qtd_estoque, preco, id_fornecedor)
    VALUES('$Nome', '$Estoque' , '$Preco', '$Fornecedor')"
);

echo "Produto cadastrado!";

?>

<br><br>

<a href="../../index.html"> <button>Voltar para a aba inicial</button></a>
