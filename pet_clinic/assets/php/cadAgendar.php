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

    $Horario  = $_POST['hora'];
    $Data  = $_POST['data'];
    $Pet  = $_POST['pet'];
    $Tutor = $_POST['tutor'];

    $insere = mysqli_query(
        $conexao,
        "INSERT INTO consulta(data_consulta, horario, cod_pet, cod_tutor)
     VALUES ('$Data', '$Horario', '$Pet', '$Tutor')"
    );

    echo "<h2>Agendamento realizado com sucesso!!</h2>";
    ?>

</body>

</html>

<a href="../html/inicio.html"><button>Voltar para a aba inicial</button></a>