<?php
session_start();
include_once(__DIR__ . '/../config/conexao.php');

$Usuario = $_POST['login'] ?? '';
$Senha   = $_POST['senha'] ?? '';


$stmt = mysqli_prepare(
    $conexao,
    "SELECT login, senha, nivel FROM usuario WHERE login = ? AND senha = ?"
);
mysqli_stmt_bind_param($stmt, "ss", $Usuario, $Senha);
mysqli_stmt_execute($stmt);
$consulta = mysqli_stmt_get_result($stmt);

if ($consulta && mysqli_num_rows($consulta) > 0) {
    $dados = mysqli_fetch_assoc($consulta);

    $_SESSION['login'] = $dados['login'];
    $_SESSION['nivel'] = (int) $dados['nivel'];

    if ($_SESSION['nivel'] === 1) {
        $destino = "../paineis/bibliotecaria.php";
    } else {
        $destino = "../paineis/assistente.php";
    }

    header("Refresh: 2; url=$destino");
    echo "<h2> Login realizado com sucesso </h2>
          <h3> Redirecionando para o sistema... </h3>";
} else {
    header("Refresh: 2; url=../index.html");
    echo "<h2> Usuario ou senha incorretos </h2>
          <h3> Redirecionando para a aba de Login... </h3>";
}
