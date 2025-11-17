<?php
include("include\conexao.php");
include ("include\chave_abacatepay.php");

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

 $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => "https://api.abacatepay.com/v1/customer/create",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode([ //alocação das variáveis do formulário para o json
        'name'      => $nome,
        'cellphone' => $telefone,
        'email'     => $email,
        'taxId'     => $cpf
        ]),
        CURLOPT_HTTPHEADER => [
        "Authorization: " . $chave,
        "Content-Type: application/json"
        ],
    ]);

    $response_abacate = curl_exec($curl); //retorno dos dados do abacatepay
    $err = curl_error($curl); //retorno do erro do abacatepay
 curl_close($curl);
 $data = json_decode($response_abacate, true);
 $id_banco = $data['data']['id'];
  

  if ($err) {
    echo "<script>alert('Erro ao cadastrar: " . $err . "'); window.location.href='login.php';</script>"; //exibição do erro retornado pelo abacate pay
  }

    if ($check_result->num_rows > 0) {
        echo "<script>alert('Email ou CPF já cadastrado!'); window.location.href='Chave de acesso.html';</script>";
        $check_stmt->close();
        exit;
    }
    $check_stmt->close();

    // Inserção no banco (se nao houver duplicatas)
    $sql = "INSERT INTO usuario (nome, telefone, cpf, email, senha, id_banco) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $nome, $telefone, $cpf, $email, $senha, $id_banco);

    // Executa a inserção e verifica se foi bem-sucedida
    if ($stmt->execute()) {
        echo "<script>alert('Cadastro realizado com sucesso!'); window.location.href='login.php';</script>";
    } else {
        echo "<script>alert('Erro ao cadastrar: " . $stmt->error . "'); window.location.href='login.php';</script>";
    }

    $stmt->close();
}
$conn->close();
?>