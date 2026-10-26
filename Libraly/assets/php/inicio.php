<?php
session_start();

if (!isset($_SESSION['nivel'])) {
    header("Location: ../../index.html");
    exit;
}

if ($_SESSION['nivel'] === 1) {
    header("Location: bibliotecaria.php");
} else {
    header("Location: assistente.php");
}
exit;