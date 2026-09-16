
<?php

include_once('conexao.php');

$Nome = $_POST['nome'];
$Cargo = $_POST['cargo_id'];
$Nascimento = $_POST['nascimento'];
$Telefone = $_POST['telefone'];
$Endereco = $_POST['endereco'];


$insere = mysqli_query($conexao, "INSERT INTO cadastro (nome, data_nascimento, endereco, telefone, cargo_id)
                                  VALUES ('$Nome', '$Nascimento', '$Endereco', '$Telefone', '$Cargo')");

// Retorno para o usuário

echo "Cliente inserido com sucesso!";

?>

<br><br>
<a href="index.html" id="btn"><button type="button"> Voltar</button></a>