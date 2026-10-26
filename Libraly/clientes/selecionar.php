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
        <h1>Escolha o Cliente que deseja relizar as alterações!</h1>
    </header>
    <main>
        <section>
            <form action="atualizar.php" method="get">
                <label for="">Escolha o cliente desejado: </label><br>
                <select name="id_cliente" id="id_cliente" required>
                    <option selected disabled value="">Clientes</option>
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
                </select>
                <button type="submit">Buscar</button>
            </form>
            <a href="../auth/inicio.php"><button>Voltar</button></a>

        </section>
    </main>
</body>

</html>