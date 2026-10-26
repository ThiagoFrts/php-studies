<?php
include_once(__DIR__ . '/../config/conexao.php');

$Nome = $_POST['nome'];
$Telefone = $_POST['telefone'];
$CPF = $_POST['cpf'];

$insere = mysqli_query(
    $conexao,
    "INSERT INTO cliente(nome, telefone, cpf)
    VALUES ('$Nome', '$Telefone', '$CPF')"
);
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Cliente</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <main>
        <section class="mensagem">
            <?php
            echo "<h2>Cadastro de cliente realizado!!</h2>";
            ?>

            <a href="../auth/inicio.php"><button>Voltar para a aba incial</button></a>
        </section>
    </main>
</body>

</html>
