<?php
// Servidor Local
$servername = "localhost";   
$username = "root";
$password = "";
$dbname = "biblioteca";

$conexao = new mysqli($servername, $username, $password, $dbname);

if ($conexao->connect_error) {
    die("Falha na Conexão com o BD: " . $conexao->connect_error);
}

$conexao->set_charset("utf8mb4");
