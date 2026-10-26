<?php
include_once(__DIR__ . '/../config/conexao.php');

$Titulo = $_POST['titulo'];
$data = $_POST['data'];
$autor = $_POST['autor'];
$qtdPag = $_POST['qtd'];
$qtdlivro = $_POST['qtd_livros'];
$editora = $_POST['editora'];
$genero = $_POST['genero'];

$insere = mysqli_query(
    $conexao,
    "INSERT INTO livro(titulo, ano_publicacao, qtd_paginas, id_genero,  autor, editora, qtd_livros) 
    VALUES ('$Titulo', '$data', '$qtdPag', '$genero', '$autor', '$editora', '$qtdlivro')"
);

echo "<h2>Cadastro de livro realizado!!</h2>";

?>

<a href="../auth/inicio.php"><button>Voltar para a aba incial</button></a>