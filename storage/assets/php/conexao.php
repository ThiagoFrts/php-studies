
<?php
// Servidor Local

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "estoque";

// Cria Conexão

$conexao = new mysqli($servername, $username, $password, $dbname);
          
		   
// Verifica Conexão

if ($conexao->connect_error) {
                              die("Falha na Conexão com o BD: " . $conexao->connect_error);
                             } 

?> 