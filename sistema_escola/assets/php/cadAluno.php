<?php

include_once('conexao.php');

$Nome = $_POST['nome'];
$Data = $_POST['data'];
$Email = $_POST['email'];
$Curso = $_POST['curso'];

$insere = mysqli_query(
    $conexao,
    "INSERT INTO aluno (nome, data_nascimento,email, id_turma)
    VALUES ('$Nome', '$Data', '$Email', '$Curso')
    "
);

if ($insere) {
    $update = mysqli_query(
        $conexao,
        "UPDATE turma SET qtd_alunos = qtd_alunos + 1 WHERE id_turma = $Curso"
    );
    $classe = 'alerta-ok';
    $mensagem = 'Aluno cadastrado com sucesso!';
} else {
    $classe = 'alerta-erro';
    $mensagem = 'Erro ao cadastrar: ' . mysqli_error($conexao);
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Aluno</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>

<body class="pg-conteudo">
    <main>
        <div class="quadro">
            <p class="<?= $classe ?>"><?= htmlspecialchars($mensagem) ?></p>
            <a class="btn-voltar" href="cadastro_aluno.php">Voltar</a>
        </div>
    </main>
</body>

</html>
