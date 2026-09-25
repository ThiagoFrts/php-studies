<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Produto</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <header>
        <h1>ATUALIZAR PREÇO DOS PRODUTOS</h1>
        <h3>Preencha os campo abaixo para atualizar o preço de um determinado produto.</h3>
    </header>

    <?php
    include_once('conexao.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $IdProduto = $_POST['id_produto'];
        $NovoPreco = $_POST['novoPreco'];

        mysqli_query($conexao, "UPDATE produto 
            SET preco = '$NovoPreco' 
            WHERE id_produto = '$IdProduto'");

        echo "<p>Preço atualizado com sucesso!</p>";
    }
    ?>

    <form action="Atualizar.php" method="get">
        <label for="">Produto:</label>
        <select name="id_produto" onchange="this.form.submit()" required>
            <option selected disabled value="">Selecione um produto</option>
            <?php
            $consultaProduto = mysqli_query(
                $conexao,
                "SELECT id_produto, nome, preco
                 FROM produto"
            );

            while ($linha = mysqli_fetch_array($consultaProduto)) {
                $selecionado = (isset($_GET['id_produto']) && $_GET['id_produto'] == $linha['id_produto']) ? 'selected' : '';
                echo "<option value='" . $linha['id_produto'] . "' $selecionado>" . $linha['nome'] . "</option>";
            }
            ?>
        </select>
    </form>

    <?php

    if (!empty($_GET['id_produto'])) {
        $idProduto = $_GET['id_produto'];

        $busca = mysqli_query($conexao, "SELECT nome, preco FROM produto WHERE id_produto = '$idProduto'");
        $produto = mysqli_fetch_assoc($busca);

        if ($produto) {
    ?>
            <form action="Atualizar.php" method="post">
                <input type="hidden" name="id_produto" value="<?php echo $idProduto; ?>">

                <label for="">Produto:</label>
                <input type="text" value="<?php echo $produto['nome']; ?>" disabled>

                <label for="">Novo preço:</label>
                <input type="text" name="novoPreco" value="<?php echo $produto['preco']; ?>" required>

                <button type="submit">Salvar novo preço</button>
            </form>
    <?php
        }
    }
    ?>

    <a href="../../index.html"> <button>Voltar para a aba inicial</button></a>
</body>

</html>
