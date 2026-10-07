<?php
session_start();
include_once("conexao.php");   // mesma pasta (assets/php)

$login = trim($_POST['login'] ?? '');
$senha = trim($_POST['senha'] ?? '');

$stmt = $conexao->prepare("SELECT * FROM usuario WHERE login = ? AND senha = ?");
$stmt->bind_param("ss", $login, $senha);
$stmt->execute();
$ok = $stmt->get_result()->num_rows > 0;

if ($ok) {
    $_SESSION['usuario'] = $login;
    $destino = "window.top.location = 'logado.php';";          // mesma pasta
} else {
    $destino = "window.location = '../html/aviso.html';";      // assets/html
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Login</title>
</head>

<body>
    <br><br><br><br><br><br>
    <p align="center">Por favor aguarde&hellip;</p>
    <script>
        setTimeout(function() {
            <?= $destino ?>
        }, 1000);
    </script>
</body>

</html>
