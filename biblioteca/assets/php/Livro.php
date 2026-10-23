<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Livros</title>
</head>

<body>
    <header>
        <h1>Realizar Cadastro de Livros</h1>
        <h2>Adicione as informações abaixo e realize o cadastro dos livros</h2>
    </header>

    <main>
        <section>
            <div class="form">
                <form action="cadLivro.php" method="post">
                    <h2>Novo Livro</h2>

                    <label for="">Titulo:</label><br>
                    <input type="text" required maxlength="50" max="50" name="titulo">
                    <br><br>

                    <label for="">Ano Publicação: </label><br>
                    <input type="date" name="data" required>
                    <br><br>

                    <label for="">Autor: </label><br>
                    <input type="text" name="autor" required max="50" maxlength="50"><br><br>

                    <label for="">Editora: </label><br>
                    <input type="text" name="editora" required max="50" maxlength="50"><br><br>

                    <label for="">Quantidade de Páginas: </label><br>
                    <input type="text" name="qtd" required max="50" maxlength="50"><br><br>

                    <label for="">Quantidade de livros disponiveis: </label><br>
                    <input type="number" name="qtd_livros" required max="50" maxlength="50"><br><br>

                    <label for="">Gênero: </label><br>
                    <select name="genero" id="genero" required>
                        <option selected disabled value=""> Selecione um Gênero</option>
                        <?php
                        include_once('conexao.php');

                        $consulta = mysqli_query(
                            $conexao,
                            "SELECT id_genero, nome_genero FROM genero"
                        );

                        while ($linha = mysqli_fetch_array($consulta)) {
                            echo "<option value='" . $linha['id_genero'] . "'>" . $linha['nome_genero'] . "</option>";
                        }
                        ?>
                    </select><br><br>
                    <button type="submit">Cadastrar</button>
                </form>
            </div>
        </section>

        <section>
            <div class="form">
                <form action="cadGenero.php" method="post">
                    <h2>Novo Gênero</h2>
                    <label for="">Gênero: </label><br>
                    <input type="text" name="cadGenero" required max="15" maxlength="15">
                    <br><br>
                    <button type="submit">Cadastrar</button>
                </form>
            </div>
        </section>
        <a href="../php/inicio.php"><button>Voltar para a aba incial</button></a>

    </main>
</body>

</html>