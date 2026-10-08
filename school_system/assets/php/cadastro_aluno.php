<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../html/aviso.html");
    exit;
}
include_once('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Aluno</title>
    <link rel="stylesheet" href="../css/conteudo.css">
</head>

<body class="pg-conteudo">
    <main>
        <div class="quadro">
            <h3>Cadastrar Aluno</h3>
            <form action="cadAluno.php" method="post">
                <div class="campo">
                    <label for="nome">Nome</label>
                    <input type="text" id="nome" placeholder="Digite o nome do aluno" required max="40" maxlength="40" name="nome">
                </div>

                <div class="campo">
                    <label for="data">Data de nascimento</label>
                    <input type="date" id="data" required name="data">
                </div>

                <div class="campo">
                    <label for="email">Email</label>
                    <input type="email" id="email" required max="50" maxlength="50" placeholder="Digite seu email" name="email">
                </div>

                <div class="campo">
                    <label for="curso">Curso</label>
                    <select name="curso" id="curso" required>
                        <option selected disabled value="">Escolha seu curso e turno</option>
                        <?php
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
                </div>
                <button type="submit">Cadastrar</button>
            </form>
        </div>
    </main>
</body>

</html>
