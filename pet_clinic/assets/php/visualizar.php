<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de agendamentos</title>
        <link rel="stylesheet" href="../css/style.css">

</head>

<body class="login">
    <header>
        <h1>Consulta de agendamentos</h1>
    </header>
    <?php
    include_once('conexao.php');


    $consulta = mysqli_query(
        $conexao,
        "SELECT 
	t.nome_tutor as nome_tutor,
	p.nome_pet as nome_pet,
	DATE_FORMAT(c.data_consulta, '%d/%m/%Y')  as data_consulta,
	c.horario horario,
	DATE_FORMAT(p.data_nascimento,'%d/%m/%Y')  as data_nascimento,
	p.raca as raca
FROM consulta c 
INNER JOIN pet p ON p.cod_pet = c.cod_pet
INNER JOIN tutor t ON t.cod_tutor = c.cod_tutor
"
    );
    ?>

    <?php
    if (mysqli_num_rows($consulta) > 0) {
        echo "<table border = '1'> ";
        echo "<tr><th>Nome Tutor</th><th>Nome Pet</th><th>Data Agendada</th><th>Horário</th><th>Data Nascimento</th><th>Raça</th></tr>";
        while ($v = mysqli_fetch_assoc($consulta)) {
            echo "<tr>
                <td>" . $v['nome_tutor'] . "</td>
                <td>" . $v['nome_pet'] . "</td>
                <td>" . $v['data_consulta'] . "</td>
                <td>" . $v['horario'] . "</td>
                <td>" . $v['data_nascimento'] . "</td>
                <td>" . $v['raca'] . "</td>
              </tr>";
        }

        echo "</table>";
    } else {
        echo "<h3>Nenhuma consulta agendada.</h3>";
    }
    ?>

    <a href="../html/inicio.html"><button>Voltar para a aba inicial</button></a>

</body>

</html>