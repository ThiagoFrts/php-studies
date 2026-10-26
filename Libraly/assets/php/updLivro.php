<?php
include_once('conexao.php');

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

    echo "<h2>Livro atualizado!</h2>";
    echo "<a href='AtualizarL.php'><button>Voltar</button></a>";
    exit;
}


$id = (int) $_GET['id_livro'];
$consulta = mysqli_query($conexao, "SELECT * FROM livro WHERE id_livro = $id");
$livro = mysqli_fetch_assoc($consulta);
?>

<h1>Atualizar livro</h1>

<form method="post">
    <input type="hidden" name="id_livro" value="<?= $livro['id_livro'] ?>">

    Título:<br>
    <input type="text" name="titulo" value="<?= $livro['titulo'] ?>"><br><br>

    Data de publicação:<br>
    <input type="date" name="data" value="<?= $livro['ano_publicacao'] ?>"><br><br>

    Autor:<br>
    <input type="text" name="autor" value="<?= $livro['autor'] ?>"><br><br>

    Editora:<br>
    <input type="text" name="editora" value="<?= $livro['editora'] ?>"><br><br>

    Quantidade de livros:<br>
    <input type="number" name="qtd_livros" value="<?= $livro['qtd_livros'] ?>"><br><br>

    Gênero:<br>
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
<a href="atualizarL.php"><button>Voltar</button></a>