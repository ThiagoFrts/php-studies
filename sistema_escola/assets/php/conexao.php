<?php
// Servidor Local
$servername = "localhost";   // se o MySQL usar outra porta: "127.0.0.1:3307"
$username = "root";
$password = "";
$dbname = "sistema_web";

$conexao = new mysqli($servername, $username, $password, $dbname);

if ($conexao->connect_error) {
    die("Falha na Conexão com o BD: " . $conexao->connect_error);
}

$conexao->set_charset("utf8mb4");
