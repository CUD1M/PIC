<?php
include ("C:/xampp/htdocs/PIC/include/conexao.php");

if(!$conn->connect_error){
    $data_raw = file_get_contents("php://input"); //recebe o json do webhook
    $data = json_decode($data_raw, true);
    $info = $cell = $data["data"]["billing"]["customer"]["metadata"];
    $nome = $info["name"];
    $email = $info["email"];
    $cell = $info["cellphone"];
    $id_prod = $data["data"]["billing"]["products"][0]["externalId"];
    $response = $conn->query("SELECT `id` FROM `usuario` WHERE `email`='" . $email . "'");
    $result = $response->fetch_assoc();
    if(!$result){
        file_put_contents("log.txt", "Erro ao cadastrar aluno $nome na tabela $id_prod\n", FILE_APPEND);
        die();
    }
    $id_usuario = $result['id']; // pega o valor do id do usuário
    $sql = "INSERT INTO `$id_prod` (`id`,`nome`,`email`,`telefone`) VALUES ($id_usuario,'" . $nome ."','" . $email . "','" . $cell . "');"; //importa para o banco de dados!
    if(!$conn->query($sql)){ //verifica de a query deu certo
        file_put_contents("log.txt", "Erro ao cadastrar aluno $nome na tabela $id_prod\n", FILE_APPEND);
        die();
    }
    file_put_contents("log.txt", "Aluno $nome cadastrado na tabela $id_prod\n", FILE_APPEND); //mensagem no log se tudo ocorreu bem!
} else file_put_contents("log.txt", "Não foi possivel fazer conexão com o banco SQL!\n", FILE_APPEND);
?>