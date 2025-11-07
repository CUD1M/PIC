<?php
session_start();
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

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
            $_SESSION["usuario_id"] = $usuario["id"];
            $_SESSION["usuario_nome"] = $usuario["nome"];

            // Mensagem de boas-vindas
            echo "<h2>Bem-vindo, " . htmlspecialchars($usuario["nome"]) . "!</h2>";
            echo "<p><strong>CPF:</strong> " . htmlspecialchars($usuario["cpf"]) . "</p>";
            echo "<p><strong>Telefone:</strong> " . htmlspecialchars($usuario["telefone"]) . "</p>";
            echo "<p>Login realizado com sucesso.</p>";
            echo "<a href='logout.php'>Sair</a>";

        } else {
            // Senha incorreta
            echo "<script>alert('Senha incorreta!'); window.location.href='Chave de acesso.html';</script>";
        }
    } else {
        // Email não encontrado
        echo "<script>alert('E-mail não encontrado!'); window.location.href='Chave de acesso.html';</script>";
    }

    $stmt->close();
}

$conn->close();
?>
