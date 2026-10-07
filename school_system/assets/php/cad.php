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
    echo "Turma cadastrada!";
} else {
    echo "Erro ao cadastrar: " . $stmt->error;
}
?>
<br><a href="../html/cadastro_turma.html">Voltar</a>
