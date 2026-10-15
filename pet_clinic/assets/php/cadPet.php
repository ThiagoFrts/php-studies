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

    $Nome  = $_POST['nome'];
    $Data  = $_POST['data'];
    $Raca  = $_POST['raca'];
    $Tutor = $_POST['tutor'];

    $insere = mysqli_query(
        $conexao,
        "INSERT INTO pet(nome_pet, data_nascimento, raca, cod_tutor)
     VALUES ('$Nome', '$Data', '$Raca', '$Tutor')"
    );

    echo "<h2>Cadastro de Pet realizado!!</h2>";
    ?>

    <a href="../html/inicio.html"><button>Voltar para a aba inicial</button></a>

</body>

</html>