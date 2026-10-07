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
    <title>Consultar Alunos</title>
</head>

<body>
    <h3>Consultar Alunos</h3>
</body>

</html>
