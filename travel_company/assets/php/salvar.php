<?php
include_once('conexao.php');


$Data = $_POST['data'];
$Horario = $_POST['horario'];
$Origem = $_POST['origem'];
$Destino = $_POST['destino'];
$Empresa = $_POST['id_empresa'];


$insere = mysqli_query($conexao,
 "INSERT INTO viagem (origem, destino, data_viagem, horario, id_empresa)")



?>