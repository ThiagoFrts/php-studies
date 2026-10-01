<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cancelar Viagem</title>
</head>

<body>
    <header>
        <h1>Cancelamento de Viagens</h1>
        <h3>Querido cliente, para cancelar sua viagem faça uma busca no campo abaixo pelo seu nome.</h3>
    </header>

    <main>
        <div class="quadro-cancelamento">
            <form action="cancelar.php" method="get">
                <input type="search" placeholder="Pesquisar" size="20" name="pesquisa">

                <?php

                include_once('conexao.php');
                $busca = isset($_GET['pesquisa']) ? $_GET['pesquisa'] : '';

                $consulta = mysqli_query(
                    $conexao,
                    "SELECT  
                        cliente.nome as nome_cliente,
                        cliente.telefone as telefone_cliente,
                        viagem.origem as origem,
                        viagem.destino as destino,       
                        DATE_FORMAT(viagem.data_viagem, '%d/%m/%Y') as 'Data',
                        viagem.horario as horario,
                        empresa.nome as empresa_onibus
                        
                        FROM viagem 

                        INNER JOIN cliente ON cliente.id_cliente = viagem.id_cliente
                        INNER JOIN empresa ON empresa.id_empresa = viagem.id_empresa
                        WHERE cliente.nome LIKE '%$busca%'"
                )

                ?>
                <button type="submit" value="Buscar">Buscar</button>
            </form>

        </div>
    </main>

    <a href="../../index.html"> <button>Voltar</button></a>
</body>

</html>
