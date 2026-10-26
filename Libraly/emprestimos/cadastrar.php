<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: ../index.html");
    exit;
}
include_once(__DIR__ . '/../config/conexao.php');

$cliente         = (int) ($_POST['id_cliente'] ?? 0);
$livro           = (int) ($_POST['id_livro'] ?? 0);
$data_emprestimo = $_POST['data_emprestimo'] ?? '';
$data_devolucao  = $_POST['data'] ?? '';

if ($cliente < 1 || $livro < 1 || $data_emprestimo === '' || $data_devolucao === '') {
    echo "<h2>Preencha todos os campos</h2>";
} elseif ($data_devolucao < $data_emprestimo) {
    echo "<h2>A devolução não pode ser antes do empréstimo</h2>";
} else {
    $stmt = mysqli_prepare(
        $conexao,
        "INSERT INTO emprestimo (id_livro, data_emprestimo, data_devolucao, id_cliente)
         VALUES (?, ?, ?, ?)"
    );
    mysqli_stmt_bind_param($stmt, "issi", $livro, $data_emprestimo, $data_devolucao, $cliente);

    if (mysqli_stmt_execute($stmt)) {
        echo "<h2>Empréstimo realizado!!</h2>";
    } else {
        echo "<h2>Erro ao realizar o empréstimo</h2>";
        echo "<p>" . mysqli_stmt_error($stmt) . "</p>";   
    }
}
?>

<a href="../auth/inicio.php"><button>Voltar para a aba incial</button></a>