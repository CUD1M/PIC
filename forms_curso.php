<?php
    if(!isset($_SESSION)){
        session_start();
    }
    if($_SESSION["id"]!=1){
        echo "<script>alert('VOCE NÃO É ADMIN!'); window.location.href='Página Inicial.php';</script>";
    } else { 
$diretorio_uploads = "Imagens dos cursos/";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    /*     VARIAVEIS FORMS       */
    $curso = $_POST['nome_curso'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $max_alunos = $_POST['max_alunos']; 

    include("conexao.php"); //conexão ao banco de dados

    $sql="INSERT into cursos(curso,descricao,preco,max_alunos)
    VALUES ('" . $curso . "','" .$descricao. "'," . $preco . "," . $max_alunos . ")"; //PREPARAÇÃO DA INSCRIÇÃO DO CURSO
    $conn->query($sql); //escreve dentro do data_base
    /*
    $tipo_arquivo = pathinfo($_FILES["foto_curso"]["name"], PATHINFO_EXTENSION);
    $nome_arquivo_unico = uniqid('curso_') . "." . $tipo_arquivo;
    $caminho_imagem = $diretorio_uploads . $nome_arquivo_unico;
    move_uploaded_file($_FILES["foto_curso"]["tmp_name"], $caminho_imagem);
    */
    header("Location: " . $_SERVER['HTTP_REFERER']);
    }
}
?>