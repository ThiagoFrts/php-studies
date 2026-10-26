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
        $destino = "bibliotecaria.php";
    } else {
        $destino = "assistente.php";
    }

    header("Refresh: 2; url=$destino");
    $titulo    = "Login realizado com sucesso";
    $subtitulo = "Redirecionando para o sistema...";
} else {
    header("Refresh: 2; url=../index.html");
    $titulo    = "Usuario ou senha incorretos";
    $subtitulo = "Redirecionando para a aba de Login...";
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <main>
        <section class="mensagem">
            <h2><?= $titulo ?></h2>
            <h3><?= $subtitulo ?></h3>
        </section>
    </main>
</body>

</html>
