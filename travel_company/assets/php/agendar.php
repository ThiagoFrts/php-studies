<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendamento</title>
</head>

<body>
    <header>
        <h1> Bem vindo querido cliente a aba de agendamentos</h1>
        <h3>Preencha o formulário abaixo para realizar o cadastro da sua viagem.</h3>
    </header>

    <div class="quadro">
        <form action="salvar.php" method="post">
            <label>Cliente:</label>
            <select name="id_cliente" required>
                <option selected disabled value="">Selecione seu nome</option>
                <?php

                include_once('conexao.php');

                $clientes = mysqli_query(
                    $conexao,
                    "SELECT id_cliente, nome FROM cliente ORDER BY nome"
                );

                while ($c = mysqli_fetch_array($clientes)) {
                    echo "<option value='" . $c['id_cliente'] . "'>" . $c['nome'] . "</option>";
                }
                ?>

            </select>


            <label for="">Data: </label>
            <input type="date" placeholder="Dia" name="data">

            <label for="">Horário: </label>
            <input type="time" placeholder="Horário da Viagem" name="horario">

            <label for="">Origem: </label>
            <input type="text" placeholder="Digite sua cidade" name="origem">

            <label for="">Destino: </label>
            <input type="text" placeholder="Digite o local desejado" name="destino">

            <label for="">Empresa: </label>
            <select name="id_empresa" id="">
                <option selected disabled value="">Escolha um empresa</option>
                <option value="1">Tech Solutions</option>
                <option value="2">Inovação Digital</option>
                <option value="3">Global Logistics</option>
                <option value="4">Alfa Consultoria</option>
                <option value="5">Nexus Sistemas</option>
                <option value="6">Vanguarda Media</option>
                <option value="7">Prime Serviços</option>
            </select>
            <button type="submit" value="agendar">Agendar</button>
        </form>
    </div>
    <a href="../../index.html"> <button>Voltar</button></a>
</body>

</html>