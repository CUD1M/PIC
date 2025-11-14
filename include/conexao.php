<?php
$servername = "localhost";
$username = "root"; // altere se seu usuário do MySQL for diferente
$password = "";     // altere se seu MySQL tiver senha
$dbname = "mng"; // nome do banco de dados
// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);
// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>
