<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar produto</title>
</head>

<body>
    <header>
        <h1>CADASTRO DE PRODUTOS</h1>
        <h3>Prencha as informações do produto que deseja cadastrar</h3>

    </header>
    <div class="quadro">
        <h2>Novo produto</h2>
        <form action="../php/cadP.php" method="post">
            <label for="">Produto:</label>
            <input type="text" name="nomeP" placeholder="Digite o nome do produto" maxlength="30" required>

            <label for="">Qtd estoque:</label>
            <input type="text" name="estoque" required placeholder="Informe a QTD do produto">

            <label for="">Preço do produto:</label>
            <input type="text" name="preco" required placeholder="Informe o preço por produto">

            <label for="">Fornecedor</label>
            <select name="id_fornecedor" id="" required>
                <option selected disabled value="">Selecione um fornecedor</option>

                <?php
                include_once('conexao.php');

                $consultaFornecedor = mysqli_query(
                    $conexao,
                    "SELECT id_fornecedor, nome 
                         FROM fornecedor "
                );

                while ($linha = mysqli_fetch_array($consultaFornecedor)) {
                    echo "<option value='" . $linha['id_fornecedor'] . "'>" . $linha['nome'] . "</option>";
                }
                ?>

            </select>

            <button type="submit">Cadastrar</button>
        </form>

    </div>
    <a href="../../index.html"> <button>Voltar para a aba inicial</button></a>
</body>

</html>
