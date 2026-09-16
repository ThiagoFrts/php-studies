<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pessoas cadastradas</title>
</head>

<body>
    <?php
    include_once('conexao.php');
    $Cidade = $_POST['cidade'];

    $consulta = mysqli_query($conexao, "SELECT nome Nome, cidade Cidade, telefone Telefone
    FROM cliente
    WHERE cidade = '$Cidade'");

    while ($linha = mysqli_fetch_array($consulta)) {
        echo "<h1>" . " Busca por cidade" . "</h1>";
        echo "<h2>" . $linha['Nome'] . "</h2>";
        echo "<h2>" . $linha['Telefone'] . "</h2>";
        echo "=================================================";
    }

    ?>
    <br><br>
    <a href="consulta.html" id="btn"><button type="button"> Voltar</button></a>

</body>

</html>