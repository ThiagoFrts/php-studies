<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar produto</title>
</head>

<body>
    <header>
        <h1>CONSULTA DE PRODUTOS </h1>
        <h3>Selecione um fornecedor para visualizar as informações.</h3>
    </header>

    <form action="">
        <select name="" id="">
            <option value="">
                <?php

                include_once('conexao.php');

                $consulta = mysqli_query(
                    $conexao,
                    "SELECT fornecedor.id_fornecedor Fornecedor, fornecedor.nome Nome
                 FROM fornecedor
                 WHERE fornecedor = '$'
            
            
                "
                );



                ?>
            </option>
        </select>
    </form>


    <a href="../../index.html"> <button>Voltar para a aba inicial</button></a>
</body>

</html>