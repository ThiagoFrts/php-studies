<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Pet</title>
        <link rel="stylesheet" href="../css/style.css">

</head>

<body class="login">
    <header>
        <h1>Informe as informações do Pet</h1>
    </header>

    <main>
        <section>
            <div class="form">
                <form action="cadPet.php" method="post">
                    <h2>Novo Pet</h2>

                    <label for="">Nome:</label><br>
                    <input type="text" required placeholder="Paçoca" maxlength="50" max="50" name="nome">
                    <br><br>

                    <label for="">Data de Nascimento: </label><br>
                    <input type="date" required name="data">
                    <br><br>

                    <label for="">Raça: </label><br>
                    <input type="text" name="raca" required placeholder="Vira-lata">
                    <br><br>

                    <label for="">Tutor resposável</label><br>

                    <select name="tutor" id="tutor" required>
                        <option selected disabled value="">Selecione o tutor</option>
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