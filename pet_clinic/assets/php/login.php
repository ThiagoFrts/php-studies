<?php
session_start();
include_once('conexao.php');

$Usuario = $_POST['usuario'] ?? '';
$Senha   = $_POST['senha'] ?? '';

$stmt = mysqli_prepare(
    $conexao,
    "SELECT login, senha FROM usuario WHERE login = ? AND senha = ?"
);
mysqli_stmt_bind_param($stmt, "ss", $Usuario, $Senha);
mysqli_stmt_execute($stmt);
$consulta = mysqli_stmt_get_result($stmt);

if ($consulta && mysqli_num_rows($consulta) > 0) {
    $_SESSION['login'] = $Usuario;
    header("Refresh: 3; url=inicio.php");
    echo "<h2> Login realizado com sucesso </h2>
          <h3> Redirecionando para o sistema... </h3>";
} else {
    header("Refresh: 3; url=../../index.html");
    echo "<h2> Usuario ou senha incorretos </h2>
          <h3> Redirecionando para a aba de Login... </h3>";
}
