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
    $curso = $_POST["nome_curso"];
    $descricao = $_POST["descricao"];
    $preco = $_POST["preco"];
    $max_alunos = $_POST['max_alunos']; 
    $imagem = $_FILES["foto_curso"];
    $data = $_POST["data"];
    $hora = $_POST["hora"];
    $professor = $_POST["nome_professor"];
    $categoria_curso = $_POST["categoria_curso"];
    $repertorio = "C:\\\\xampp\\\\htdocs\\\\PIC\\\\"; //Aqui vai o caminho do seu repertório
    $caminho_imagem = $repertorio . $imagem['name'];
    
    
    $check = getimagesize($_FILES["foto_curso"]["tmp_name"]);
    if($check === false) die("<script>alert('IMAGEM NÃO SELECIONADA!'); window.location.href='admin.php';</script>"); //checagem de imagem

    if(!file_exists($caminho_imagem)){               
        if(move_uploaded_file($_FILES["foto_curso"]["tmp_name"], $caminho_imagem)){ //salvando imagem
        } else {
            die("<script>alert('ERRO AO SALVAR A IMAGEM!'); window.location.href='admin.php';</script>"); //erro ao salvar imagem
        }
    }
    include("conexao.php"); //conexão ao banco de dados
    $sql="INSERT into cursos(curso,descricao,preco,max_alunos,`data`,hora,nome_professor,categoria_curso,img_path,img_arq)
    VALUES ('" . $curso . "','" .$descricao. "'," . $preco . "," . $max_alunos . ",'" . $data . "','" . $hora . "','" . $professor  . "','" .  $categoria_curso  . "','" . $caminho_imagem . "','" . $imagem['name'] . "');"; //PREPARAÇÃO DA INSCRIÇÃO DO CURSO
    $conn->query($sql); //escreve dentro do data_base
    $sql="SELECT id FROM cursos WHERE curso='".$curso."';";
    $resultado = $conn->query($sql);
    /*echo $resultado->num_rows; EM DESENVOLVIMENTO
    echo $curso;
    var_dump($resultado);*/
    header("Location: " . $_SERVER['HTTP_REFERER']);
    }
}
?>