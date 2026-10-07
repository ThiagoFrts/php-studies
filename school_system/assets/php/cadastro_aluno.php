<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../html/aviso.html");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Aluno</title>
</head>

<body>
    <main>
        <div class="quadro">
            <h3>Cadastrar Aluno</h3>
            <form action="cadAluno.php" method="post">
                <label for="">Nome:</label><br>
                <input type="text" placeholder="Digite o nome do aluno" required max="40" maxlength="40" name="nome">
                <br><br>

                <label for="">Data de nascimento:</label><br>
                <input type="date" required name="data">
                <br><br>

                <label for="">Email:</label><br>
                <input type="email" required max="50" maxlength="50" placeholder="Digite seu email" name="email">
                <br><br>

                <label for="">Curso:</label><br>
                <select name="curso" id="curso" required>
                    <option selected disabled value="">Escolha seu curso e turno</option>
                    <?php
                    include_once('conexao.php');

                    $curso = mysqli_query(
                        $conexao,
                        "SELECT turma.turno, turma.curso, turma.id_turma
                         FROM turma
                            "
                    );
                    while ($linha = mysqli_fetch_array($curso)) {
                        echo "<option value='" . $linha['id_turma'] . "'>" . $linha['turno'] . " - " . $linha['curso'] .  "</option>";
                    }
                    ?>
                </select>
                <button type="submit">Cadastrar</button>
            </form>
        </div>
    </main>
</body>

</html>