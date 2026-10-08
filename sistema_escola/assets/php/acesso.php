<?php
session_start();
include_once("conexao.php");

$login = trim($_POST['login'] ?? '');
$senha = trim($_POST['senha'] ?? '');

$stmt = $conexao->prepare("SELECT * FROM usuario WHERE login = ? AND senha = ?");
$stmt->bind_param("ss", $login, $senha);
$stmt->execute();
$ok = $stmt->get_result()->num_rows > 0;

if ($ok) {
    $_SESSION['usuario'] = $login;
    $destino = "window.top.location = 'logado.php';";
} else {
    $destino = "window.location = '../html/aviso.html';";
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>

<body class="pg-acesso">
    <div class="aguarde">
        <div class="spinner"></div>
        <p>Por favor aguarde&hellip;</p>
    </div>
    <script>
        setTimeout(function() {
            <?= $destino ?>
        }, 1000);
    </script>
</body>

</html>
