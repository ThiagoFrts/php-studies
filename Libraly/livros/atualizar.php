<?php
include_once(__DIR__ . '/../config/conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Livro</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <main>
        <section>
<?php
if (isset($_POST['salvar'])) {
    $id      = $_POST['id_livro'];
    $titulo  = $_POST['titulo'];
    $data    = $_POST['data'];
    $autor   = $_POST['autor'];
    $editora = $_POST['editora'];
    $qtd     = $_POST['qtd_livros'];
    $genero  = $_POST['genero'];

    $stmt = mysqli_prepare(
        $conexao,
        "UPDATE livro
         SET titulo = ?, ano_publicacao = ?, autor = ?, editora = ?, qtd_livros = ?, id_genero = ?
         WHERE id_livro = ?"
    );
    mysqli_stmt_bind_param($stmt, "ssssiii", $titulo, $data, $autor, $editora, $qtd, $genero, $id);
    mysqli_stmt_execute($stmt);

    echo "<div class='mensagem'>";
    echo "<h2>Livro atualizado!</h2>";
    echo "<a href='selecionar.php'><button>Voltar</button></a>";
    echo "</div>";
    echo "</section></main></body></html>";
    exit;
}


$id = (int) $_GET['id_livro'];
$consulta = mysqli_query($conexao, "SELECT * FROM livro WHERE id_livro = $id");
$livro = mysqli_fetch_assoc($consulta);
?>

<h2>Atualizar livro</h2>

<form method="post">
    <input type="hidden" name="id_livro" value="<?= $livro['id_livro'] ?>">

    <label>Título:</label><br>
    <input type="text" name="titulo" value="<?= $livro['titulo'] ?>"><br><br>

    <label>Data de publicação:</label><br>
    <input type="date" name="data" value="<?= $livro['ano_publicacao'] ?>"><br><br>

    <label>Autor:</label><br>
    <input type="text" name="autor" value="<?= $livro['autor'] ?>"><br><br>

    <label>Editora:</label><br>
    <input type="text" name="editora" value="<?= $livro['editora'] ?>"><br><br>

    <label>Quantidade de livros:</label><br>
    <input type="number" name="qtd_livros" value="<?= $livro['qtd_livros'] ?>"><br><br>

    <label>Gênero:</label><br>
    <select name="genero">
        <?php
        $generos = mysqli_query($conexao, "SELECT id_genero, nome_genero FROM genero");
        while ($g = mysqli_fetch_assoc($generos)) {
            $marcado = ($g['id_genero'] == $livro['id_genero']) ? 'selected' : '';
            echo "<option value='" . $g['id_genero'] . "' $marcado>" . $g['nome_genero'] . "</option>";
        }
        ?>
    </select><br><br>
    <button type="submit" name="salvar">Salvar</button>
</form>
<a href="selecionar.php"><button>Voltar</button></a>
        </section>
    </main>
</body>

</html>
