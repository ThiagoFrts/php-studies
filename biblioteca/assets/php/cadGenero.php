<?php
include_once('conexao.php');

$generos = $_POST['cadGenero'];

$insere = mysqli_query(
    $conexao,                                                                                               
    "INSERT INTO genero(nome_genero) 
    VALUES ('$generos')" 
);

echo "<h2>Cadastro de genero realizado!!</h2>";

?>

<a href="livro.php"><button>Voltar para cadastro</button></a>