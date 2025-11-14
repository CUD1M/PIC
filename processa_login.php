<?php

include("include\conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $conn->real_escape_string($_POST['email']); //comando usado para ignorar caracteres com funções SQL
    $senha = $conn->real_escape_string($_POST['senha']);

    // Busca o usuário pelo e-mail e status
    $sql = "SELECT * FROM usuario WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();

        // Verifica se a senha digitada confere com o hash armazenado
        if (password_verify($senha, $usuario["senha"])) {

            // Cria sessão
            if(!isset($_SESSION)){
                session_start();
            }
            $_SESSION["id"] = $usuario["id"];
            $_SESSION["nome"] = $usuario["nome"];

            // Mensagem de boas-vindas
            header("Location: index.php");

        } else {
            // Senha incorreta
            echo "<script>alert('Senha incorreta!'); window.location.href='login.php';</script>";
        }
    } else {
        // Email não encontrado
        echo "<script>alert('E-mail não encontrado!'); window.location.href='login.php';</script>";
    }

    $stmt->close();
}

$conn->close();
?>
