<?php
// sistema para voltar para tela de cadastro
session_start();
session_destroy();
header("Location: " . $_SERVER['HTTP_REFERER']);
exit;
?>
