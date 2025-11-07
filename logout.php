<?php
// sistema para voltar para tela de cadastro
session_start();
session_destroy();
header("Location: Chave de acesso.html");
exit;
?>
