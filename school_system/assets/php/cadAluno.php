<?php

include_once('conexao.php');

$Nome = $_POST['nome'];
$Data = $_POST['data'];
$Email = $_POST['email'];
$Curso = $_POST['curso'];

$insere = mysqli_query(
    $conexao,
    "INSERT INTO aluno (nome, data_nascimento,email, id_turma)
    VALUES ('$Nome', '$Data', '$Email', '$Curso')
    "
);

echo "Aluno cadastrado!";
?>

<br><a href="../html/cadastro_turma.html">Voltar</a>
