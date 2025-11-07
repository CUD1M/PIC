<?php
include("conexao.php");

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"]; 
    $telefone = $_POST["cell"];
    $cpf = $_POST["cpf"];
    $email = $_POST["email"];
    $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT);

    // Verificação de duplicatas
    $check_sql = "SELECT id FROM usuario WHERE email = ? OR cpf = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("ss", $email, $cpf);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows > 0) {
        echo "<script>alert('Email ou CPF já cadastrado!'); window.location.href='Chave de acesso.html';</script>";
        $check_stmt->close();
        exit;
    }
    $check_stmt->close();

    // Inserção no banco (se nao houver duplicatas)
    $sql = "INSERT INTO usuario (nome, telefone, cpf, email, senha) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $nome, $telefone, $cpf, $email, $senha);

    // Executa a inserção e verifica se foi bem-sucedida
    if ($stmt->execute()) {
        echo "<script>alert('Cadastro realizado com sucesso!'); window.location.href='Chave de acesso.html';</script>";
    } else {
        echo "<script>alert('Erro ao cadastrar: " . $stmt->error . "'); window.location.href='Chave de acesso.html';</script>";
    }

    $stmt->close();
}
$conn->close();
?>