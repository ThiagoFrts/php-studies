<?php
session_start();
session_destroy();
header("Location: ../../index.html");   // sobe de assets/php até a raiz
exit;
