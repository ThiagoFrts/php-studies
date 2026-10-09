<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../html/aviso.html");
    exit;
}

include_once('conexao.php');

$curso = $_POST['curso'] ?? '';
$turno = $_POST['turno'] ?? '';
$qtd   = (int) ($_POST['qtd'] ?? 0);

$stmt = $conexao->prepare("INSERT INTO turma (turno, curso, qtd_alunos) VALUES (?, ?, ?)");
$stmt->bind_param("ssi", $turno, $curso, $qtd);

if ($stmt->execute()) {
    $classe = 'alerta-ok';
    $mensagem = 'Turma cadastrada!';
} else {
    $classe = 'alerta-erro';
    $mensagem = 'Erro ao cadastrar: ' . $stmt->error;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Turma</title>
    <link rel="stylesheet" href="../css/conteudo.css">
</head>

<body class="pg-conteudo">
    <main>
        <div class="quadro">
            <p class="<?= $classe ?>"><?= htmlspecialchars($mensagem) ?></p>
            <a class="btn-voltar" href="../html/cadastro_turma.html">Voltar</a>
        </div>
    </main>
</body>

</html>
