<?php


$diretorio_uploads = "Imagens dos cursos/";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    
    $nome_curso = $_POST['nome_curso'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $max_alunos = $_POST['max_alunos'];
    $link_pagamento = $_POST['link_pagamento'];

    
    $tipo_arquivo = pathinfo($_FILES["foto_curso"]["name"], PATHINFO_EXTENSION);
    
    
    $nome_arquivo_unico = uniqid('curso_') . "." . $tipo_arquivo;
    $caminho_imagem = $diretorio_uploads . $nome_arquivo_unico;

    move_uploaded_file($_FILES["foto_curso"]["tmp_name"], $caminho_imagem);

?>

    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Sucesso!</title>
    </head>
    <body>
        <h1>Sucesso!</h1>
        <p>O curso **<?php echo $nome_curso; ?>** foi processado com sucesso.</p>
        <p>A imagem foi salva em: <?php echo $caminho_imagem; ?></p>
        
        <h3>Detalhes do Curso:</h3>
        <ul>
            <li><strong>Descrição:</strong> <?php echo $descricao; ?></li>
            <li><strong>Preço:</strong> R$ <?php echo $preco; ?></li>
            <li><strong>Máximo de alunos:</strong> <?php echo $max_alunos; ?></li>
            <li><strong>Link de pagamento:</strong> <a href="<?php echo $link_pagamento; ?>"><?php echo $link_pagamento; ?></a></li>
        </ul>
    </body>
    </html>

<?php
}
?>