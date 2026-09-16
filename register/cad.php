<?php

// Parâmetros de conexão com o Servidor e BD

include_once('conexao.php');


// Variáveis que recebem os dados do formulário

$Nome = $_POST['Nome'];
$Telefone = $_POST['Telefone'];
$Email = $_POST['Email'];
$Cidade = $_POST['cidade'];


// Interção com o BD

$insere = mysqli_query($conexao, "INSERT INTO Cliente (nome, telefone, cidade, email)
                                  VALUES ('$Nome', '$Telefone', '$Cidade', '$Email')");

// Retorno para o usuário

echo "Cliente inserido com sucesso!";

?>

<br><br>
<a href="index.html" id="btn"><button type="button"> Voltar</button></a>