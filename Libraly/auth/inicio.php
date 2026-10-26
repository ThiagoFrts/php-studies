<?php
session_start();

if (!isset($_SESSION['nivel'])) {
    header("Location: ../index.html");
    exit;
}

if ($_SESSION['nivel'] === 1) {
    header("Location: ../paineis/bibliotecaria.php");
} else {
    header("Location: ../paineis/assistente.php");
}
exit;