<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: ../index.html");
    exit;
}
include_once(__DIR__ . '/../config/conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Cliente</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <main>
        <section>
<?php
if (isset($_POST['salvar'])) {
    $id       = $_POST['id_cliente'];
    $nome     = trim($_POST['nome']);
    $telefone = trim($_POST['telefone']);
    $cpf      = trim($_POST['cpf']);

    $stmt = mysqli_prepare($conexao,
        "UPDATE cliente SET nome = ?, telefone = ?, cpf = ? WHERE id_cliente = ?");
    mysqli_stmt_bind_param($stmt, "sssi", $nome, $telefone, $cpf, $id);
    mysqli_stmt_execute($stmt);

    echo "<div class='mensagem'>";
    echo "<h2>Cliente atualizado!</h2>";
    echo "<a href='selecionar.php'><button>Voltar</button></a>";
    echo "</div>";
    echo "</section></main></body></html>";
    exit;
}


$id = (int) $_GET['id_cliente'];
$consulta = mysqli_query($conexao, "SELECT * FROM cliente WHERE id_cliente = $id");
$cliente = mysqli_fetch_assoc($consulta);
?>

<h2>Atualizar cliente</h2>

<form method="post">
    <input type="hidden" name="id_cliente" value="<?= $cliente['id_cliente'] ?>">

    <label>Nome:</label><br>
    <input type="text" name="nome" required value="<?= htmlspecialchars($cliente['nome']) ?>"><br><br>

    <label>Telefone:</label><br>
    <input type="text" name="telefone" value="<?= htmlspecialchars($cliente['telefone']) ?>"><br><br>

    <label>CPF:</label><br>
    <input type="text" name="cpf" value="<?= htmlspecialchars($cliente['cpf']) ?>"><br><br>

    <button type="submit" name="salvar">Salvar</button>
</form>
<a href="selecionar.php"><button>Voltar</button></a>
        </section>
    </main>
</body>

</html>
