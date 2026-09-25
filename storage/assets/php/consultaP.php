<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar produto</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <header>
        <h1>CONSULTA DE PRODUTOS </h1>
        <h3>Selecione um fornecedor para visualizar as informações.</h3>
    </header>

    <?php include_once('conexao.php'); ?>

    <form action="consultaP.php" method="get">
        <label for="">Fornecedor</label>
        <select name="fornecedor" id="" required>
            <option selected disabled value="">Selecione um fornecedor</option>
            <?php
            $consultaFornecedor = mysqli_query(
                $conexao,
                "SELECT id_fornecedor, nome 
                 FROM fornecedor "
            );

            while ($linha = mysqli_fetch_array($consultaFornecedor)) {
                $selecionado = (isset($_GET['fornecedor']) && $_GET['fornecedor'] == $linha['id_fornecedor']) ? 'selected' : '';
                echo "<option value='" . $linha['id_fornecedor'] . "' $selecionado>" . $linha['nome'] . "</option>";
            }
            ?>
        </select>
        <button type="submit">Buscar</button>
    </form>

    <?php
    if (!empty($_GET['fornecedor'])) {
        $idfornecedor = $_GET['fornecedor'];

        $consulta = mysqli_query($conexao, "SELECT produto.nome, produto.qtd_estoque, produto.preco
            FROM produto
            WHERE id_fornecedor = '$idfornecedor'");

        if (mysqli_num_rows($consulta) > 0) {
            echo "<table border = '1'>
                 <tr><th>Produto</th><th>Qtd Estoque</th><th>Preço</th></tr>";
            while ($p = mysqli_fetch_assoc($consulta)) {
                echo "<tr>
                        <td>" . $p['nome'] . "</td>
                        <td>" . $p['qtd_estoque'] . "</td>
                        <td>R$ " . number_format($p['preco'], 2, ',', '.') . "</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<h3>Nenhum produto cadastrado para este fornecedor.</h3>";
        }
    }
    ?>

    <a href="../../index.html"> <button>Voltar para a aba inicial</button></a>
</body>

</html>
