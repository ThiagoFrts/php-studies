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
                <form action="../php/cadLivro.php" method="post">
                    <h2>Novo Livro</h2>

                    <label for="">Titulo:</label><br>
                    <input type="text" required maxlength="50" max="50" name="titulo">
                    <br><br>

                    <label for="">Ano Publicação: </label><br>
                    <input type="date" name="data">
                    <br><br>

                    <label for="">Autor: </label><br>
                    <input type="text" name="autor" required max="50" maxlength="50"><br><br>

                    <label for="">Quantidade de Páginas: </label><br>
                    <input type="text" name="qtd" required max="50" maxlength="50">
                    <button type="submit">Cadastrar</button>
                </form>
            </div>
            <a href="../php/inicio.php"><button>Voltar para a aba incial</button></a>
        </section>
    </main>

</body>

</html>