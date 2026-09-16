<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcionários cadastradas</title>
</head>

<body>
    <?php
    include_once('conexao.php');
    $Cargo = $_POST['cargo_id'];

    $consulta = mysqli_query($conexao, "SELECT cadastro.nome Funcionario, cargo.nome Cargos
    FROM cadastro
    INNER JOIN cargo ON cadastro.cargo_id = cargo.cargo_id
    WHERE cargo.cargo_id = '$Cargo'");

    while ($linha = mysqli_fetch_array($consulta)) {
        echo "<h1>" . $linha['Funcionario'] . "</h1>";
        echo "<h1>" . $linha['Cargos'] . "</h1>";
        echo "==================================================";
    }
    
    ?>
    <br><br>
    <a href="consultar.html" id="btn"><button type="button">Voltar</button></a>
</body>

</html>