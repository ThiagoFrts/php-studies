<?php
include_once(__DIR__ . '/../config/conexao.php');

$generos = $_POST['cadGenero'];

$insere = mysqli_query(
    $conexao,
    "INSERT INTO genero(nome_genero)
    VALUES ('$generos')"
);
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Gênero</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <main>
        <section class="mensagem">
            <?php
            echo "<h2>Cadastro de genero realizado!!</h2>";
            ?>

            <a href="../livros/novo.php"><button>Voltar para cadastro</button></a>
        </section>
    </main>
</body>

</html>
