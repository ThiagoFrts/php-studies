<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar livros</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <header>
        <h1>Nesta página você pode visualizar todos os livros</h1>
        <h2>disponiveis juntamente com os clientes que realizaram os empréstimos.</h2>
    </header>
    <main class="largo">
        <section>

            <div class="Livros">
                <h3>Situação dos livros</h3>
                <?php
                include_once(__DIR__ . '/../../config/conexao.php');

                $consultaLivros = mysqli_query(
                    $conexao,
                    "SELECT l.titulo, l.qtd_livros,
                        COUNT(e.id_emprestimo) AS emprestados
                 FROM livro l
                 LEFT JOIN emprestimo e
                        ON e.id_livro = l.id_livro
                       AND e.data_devolucao >= CURDATE()
                 GROUP BY l.id_livro
                 ORDER BY l.titulo"
                );
                ?>
                <div class="tabela">
                    <table border="1">
                        <tr>
                            <th>Título</th>
                            <th>Total</th>
                            <th>Emprestados</th>
                            <th>Disponíveis</th>
                            <th>Situação</th>
                        </tr>
                        <?php while ($l = mysqli_fetch_assoc($consultaLivros)):
                            $disponiveis = $l['qtd_livros'] - $l['emprestados'];
                        ?>
                            <tr>
                                <td><?= htmlspecialchars($l['titulo']) ?></td>
                                <td><?= $l['qtd_livros'] ?></td>
                                <td><?= $l['emprestados'] ?></td>
                                <td><?= $disponiveis ?></td>
                                <td><?= $disponiveis > 0 ? 'Disponível' : 'Indisponível' ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </table>
                </div>
            </div>

            <div class="clientes">
                <h3>Empréstimos realizados</h3>
                <?php
                $consultaEmp = mysqli_query(
                    $conexao,
                    "SELECT c.nome, c.telefone, l.titulo,
                        e.data_emprestimo, e.data_devolucao
                 FROM emprestimo e
                 JOIN cliente c ON c.id_cliente = e.id_cliente
                 JOIN livro l   ON l.id_livro   = e.id_livro
                 ORDER BY e.data_emprestimo DESC"
                );
                ?>
                <div class="tabela">
                    <table border="1">
                        <tr>
                            <th>Cliente</th>
                            <th>Telefone</th>
                            <th>Livro</th>
                            <th>Empréstimo</th>
                            <th>Devolução</th>
                        </tr>
                        <?php while ($e = mysqli_fetch_assoc($consultaEmp)): ?>
                            <tr>
                                <td><?= htmlspecialchars($e['nome']) ?></td>
                                <td><?= htmlspecialchars($e['telefone']) ?></td>
                                <td><?= htmlspecialchars($e['titulo']) ?></td>
                                <td><?= date('d/m/Y', strtotime($e['data_emprestimo'])) ?></td>
                                <td><?= date('d/m/Y', strtotime($e['data_devolucao'])) ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </table>
                </div>
                <a href="../../auth/inicio.php"><button>Voltar</button></a>
            </div>
        </section>
    </main>
</body>

</html>
