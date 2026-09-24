<?php

include_once('conexao.php');

$Nome = $_POST['nome'];
$Telefone = $_POST['telefone'];
$Endereco = $_POST['endereco'];
$CNPJ = $_POST['cnpj'];

$insere = mysqli_query(
    $conexao,
    "INSERT INTO fornecedor (nome, telefone, endereco, cnpj) 
    VALUES('$Nome', '$Telefone', '$Endereco', '$CNPJ')"
);

echo "Fornecedor cadastrado!";

?>

<br><br>
<a href="../../index.html" id="btn"><button type="button">Voltar para a aba inicial</button></a>
