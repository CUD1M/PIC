<?php
$erro = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipo_form = $_POST['tipo_form'] ?? '';

    
    if($tipo_form=='login'){
    $usuarios = [
        "admin@teste.com" => "123456"
    ];

    $email = $_POST["email"] ?? '';
    $senha = $_POST["senha"] ?? '';

    if (isset($usuarios[$email]) && $usuarios[$email] === $senha) {
        $_SESSION['usuario'] = $email;
        header("Location: dashboard.php");
        exit;
    } else {
        $erro = "Email ou senha incorretos!";
    }}
    
    elseif($tipo_form=='cadastro'){
    $usuarios = [
        "admin@teste.com" => "123456"
    ];

    $nome = $_POST["nome"] ?? '';
    $cpf = $_POST["cpf"] ?? '';
    $email = $_POST["email"] ?? '';
    $senha = $_POST["senha"] ?? '';

    $_SESSION['usuario'] = $nome;
    $_SESSION['cpf'] = $cpf;
    $_SESSION['email'] = $email;
    $_session['senha'] = $senha;

    header("Location: dashboard.php");

}}



