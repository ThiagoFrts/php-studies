<?php
include_once('conexao.php');


$Data = $_POST['data'];
$Horario = $_POST['horario'];
$Origem = $_POST['origem'];
$Destino = $_POST['destino'];
$Empresa = $_POST['id_empresa'];
$Cliente = $_POST['id_cliente'];


$insere = mysqli_query(
    $conexao,
    "INSERT INTO viagem (origem, destino, data_viagem, horario, id_cliente, id_empresa)
    VALUES('$Origem', '$Destino', '$Data', '$Horario', '$Cliente', '$Empresa')
    "
);

echo "Agendamento Realizado!";
?>
<br>
<a href="../../index.html"><button>Voltar</button></a>
