<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">

</head>

<body>
    <?php
    include_once('conexao.php');

    $Nome = $_POST['nome'];
    $Telefone = $_POST['telefone'];
    $CPF = $_POST['cpf'];

    $insere = mysqli_query(
        $conexao,
        "INSERT INTO tutor(nome_tutor, telefone, cpf) 
    VALUES ('$Nome', '$Telefone', '$CPF')"
    );

    echo "<h2>Cadastro de Tutor realizado!!</h2>";

    ?>

    <a href="../html/inicio.html"><button>Voltar para a aba inicial</button></a>

</body>

</html>