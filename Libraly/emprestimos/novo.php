<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Livros</title>
</head>

<body>
    <header>
        <h1>Realizar Empréstimo de Livros</h1>
        <h2>Coloque as informações do cliente para realizar o cadastro</h2>
    </header>

    <main>
        <section>
            <div class="form">
                <form action="cadastrar.php" method="post">
                    <label for="">Cliente: </label><br>
                    <select name="id_cliente" id="id_cliente" required>
                        <option selected disabled value=""> Selecione o Cliente</option>
                        <?php
                        include_once(__DIR__ . '/../config/conexao.php');

                        $consulta = mysqli_query(
                            $conexao,
                            "SELECT id_cliente, nome FROM cliente"
                        );

                        while ($linha = mysqli_fetch_array($consulta)) {
                            echo "<option value='" . $linha['id_cliente'] . "'>" . $linha['nome'] . "</option>";
                        }
                        ?>
                    </select><br><br>
                    <label for="">Livro: </label><br>
                    <select name="id_livro" id="id_livro" required>
                        <option selected disabled value=""> Selecione o Livro</option>
                        <?php
                        $consultaLivros = mysqli_query(
                            $conexao,
                            "SELECT id_livro, titulo FROM livro"
                        );

                        while ($l = mysqli_fetch_array($consultaLivros)) {
                            echo "<option value='" . $l['id_livro'] . "'>" . $l['titulo'] . "</option>";
                        }
                        ?>
                    </select><br><br>

                    <label for="">Data de Empréstimo: </label><br>
                    <input type="date" name="data_emprestimo" required><br><br>

                    <label for="">Data de Devolução: </label><br>
                    <input type="date" name="data" required><br><br> 

                    <button type="submit">Cadastrar</button>
                </form>
            </div>
        </section>
        <a href="../auth/inicio.php"><button>Voltar para a aba incial</button></a>
    </main>
</body>

</html>