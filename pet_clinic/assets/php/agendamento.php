<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realizar Agendamento</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body class="login">
    <header>
        <h1>Preencha as informações abaixo para preencher realizar o agendamento.</h1>
    </header>

    <main>
        <section>
            <div class="form">
                <form action="cadAgendar.php" method="post">
                    <h2>Novo Agendamento</h2>

                    <label for="">Data Consulta:</label><br>
                    <input type="date" required placeholder="Paçoca" maxlength="50" max="50" name="data">
                    <br><br>

                    <label for="">Horário: </label><br>
                    <input type="time" required name="hora">
                    <br><br>

                    <label for="">Pet: </label><br>

                    <select name="pet" id="pet" required>
                        <option selected disabled value="">Selecione o Pet</option>
                        <?php
                        include_once('conexao.php');

                        $consulta = mysqli_query($conexao, "SELECT cod_pet, nome_pet FROM pet");

                        while ($linha = mysqli_fetch_array($consulta)) {
                            echo "<option value='" . $linha['cod_pet'] . "'>" . $linha['nome_pet'] . "</option>";
                        }
                        ?>
                    </select><br><br>

                    <label for="">Tutor resposável: </label><br>

                    <select name="tutor" id="tutor" required>
                        <option selected disabled value="">Selecione o tutor resposável</option>
                        <?php
                        include_once('conexao.php');

                        $consulta = mysqli_query($conexao, "SELECT cod_tutor, nome_tutor FROM tutor");

                        while ($linha = mysqli_fetch_array($consulta)) {
                            echo "<option value='" . $linha['cod_tutor'] . "'>" . $linha['nome_tutor'] . "</option>";
                        }
                        ?>
                    </select>
                    <br><br>
                    <button type="submit">Cadastrar</button>
                </form>
            </div>
            <br>
            <a href="../html/inicio.html"><button>Voltar para a aba incial</button></a>
        </section>
    </main>



</body>

</html>