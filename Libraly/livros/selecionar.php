<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <header>
        <h1>Escolha o livro que deseja relizar as alterações!</h1>
    </header>
    <main>
        <section>
            <form action="atualizar.php" method="get">
                <label for="">Escolha o livro desejado: </label><br>
                <select name="id_livro" id="id_livro">
                    <option selected disabled value="">Livros</option>
                    <?php
                    include_once(__DIR__ . '/../config/conexao.php');
                    $consultaLivros = mysqli_query(
                        $conexao,
                        "SELECT id_livro, titulo FROM livro"
                    );

                    while ($l = mysqli_fetch_array($consultaLivros)) {
                        echo "<option value='" . $l['id_livro'] . "'>" . $l['titulo'] . "</option>";
                    }

                    ?>
                </select>
                <button type="submit">Buscar</button>
            </form>
            <a href="../auth/inicio.php"><button>Voltar</button></a>

        </section>
    </main>
</body>

</html>