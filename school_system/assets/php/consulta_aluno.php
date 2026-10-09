<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../html/aviso.html");
    exit;
}

include_once('conexao.php');

$turma = isset($_GET['turma']) ? (int) $_GET['turma'] : 0;
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Alunos</title>
    <link rel="stylesheet" href="../css/conteudo.css">
</head>

<body class="pg-conteudo">
    <main>
        <h2>Consultar Alunos</h2>
        <h4>Escolha uma turma para visualizar seus alunos.</h4>

        <form class="busca" action="consulta_aluno.php" method="get">
            <label for="turma">Turma:</label>
            <select name="turma" id="turma">
                <option disabled <?= $turma == 0 ? 'selected' : '' ?> value="">Escolha uma turma disponível</option>
                <?php
                $consulta = mysqli_query(
                    $conexao,
                    "SELECT id_turma, curso, turno FROM turma"
                ) or die(mysqli_error($conexao));

                while ($linha = mysqli_fetch_array($consulta)) {
                    $marcada = ((int) $linha['id_turma'] === $turma) ? ' selected' : '';
                    echo "<option value='" . $linha['id_turma'] . "'" . $marcada . ">"
                        . $linha['turno'] . " - " . $linha['curso'] . "</option>";
                }
                ?>
            </select>
            <button type="submit">Buscar</button>
        </form>
        <?php
        if ($turma > 0) {
            $consulta = mysqli_query(
                $conexao,
                "SELECT nome, data_nascimento, email, curso, turno, qtd_alunos, telefone
         FROM aluno
         INNER JOIN turma ON aluno.id_turma = turma.id_turma
         WHERE turma.id_turma = $turma"
            ) or die(mysqli_error($conexao));

            $total = mysqli_num_rows($consulta);

            if ($total == 0) {
                echo '<p class="sem-resultado">Nenhum aluno nessa turma.</p>';
            } else {
                echo '<p class="resumo">Total de alunos nesta turma: <strong>' . $total . '</strong></p>';
                echo '<div class="tabela-wrap"><table class="tabela">';
                echo '<thead><tr><th>Nome</th><th>Email</th><th>Telefone</th><th>Nascimento</th></tr></thead><tbody>';

                while ($linha = mysqli_fetch_array($consulta)) {
                    echo '<tr><td>' . htmlspecialchars($linha['nome']) . '</td>'
                        . '<td>' . htmlspecialchars($linha['email']) . '</td>'
                        . '<td>' . htmlspecialchars($linha['telefone'] ?? '') . '</td>'                        . '<td>' . date('d/m/Y', strtotime($linha['data_nascimento'])) . '</td></tr>';
                }

                echo '</tbody></table></div>';
            }
        }
        ?>
    </main>
</body>

</html>