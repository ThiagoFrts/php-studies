<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: ../index.html");
    exit;
}
include_once(__DIR__ . '/../config/conexao.php');

if (isset($_POST['salvar'])) {
    $id       = $_POST['id_cliente'];
    $nome     = trim($_POST['nome']);
    $telefone = trim($_POST['telefone']);
    $cpf      = trim($_POST['cpf']);

    $stmt = mysqli_prepare($conexao,
        "UPDATE cliente SET nome = ?, telefone = ?, cpf = ? WHERE id_cliente = ?");
    mysqli_stmt_bind_param($stmt, "sssi", $nome, $telefone, $cpf, $id);
    mysqli_stmt_execute($stmt);

    echo "<h2>Cliente atualizado!</h2>";
    echo "<a href='selecionar.php'><button>Voltar</button></a>";
    exit;
}


$id = (int) $_GET['id_cliente'];
$consulta = mysqli_query($conexao, "SELECT * FROM cliente WHERE id_cliente = $id");
$cliente = mysqli_fetch_assoc($consulta);
?>

<h1>Atualizar cliente</h1>

<form method="post">
    <input type="hidden" name="id_cliente" value="<?= $cliente['id_cliente'] ?>">

    Nome:<br>
    <input type="text" name="nome" required value="<?= htmlspecialchars($cliente['nome']) ?>"><br><br>

    Telefone:<br>
    <input type="text" name="telefone" value="<?= htmlspecialchars($cliente['telefone']) ?>"><br><br>

    CPF:<br>
    <input type="text" name="cpf" value="<?= htmlspecialchars($cliente['cpf']) ?>"><br><br>

    <button type="submit" name="salvar">Salvar</button>
</form>
<a href="selecionar.php"><button>Voltar</button></a>