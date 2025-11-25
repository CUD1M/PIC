<?php
if(!isset($_SESSION))session_start();
if(!isset($_SESSION["id"])) echo "<script>alert('FAÇA O LOGIN!'); window.location.href='index.php';</script>";
else{
include("include/conexao.php");
// Aqui futuramente você coloca o SQL pra buscar APENAS os cursos que esse usuário comprou
$response = $conn->query("SELECT * FROM cursos");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Meus Cursos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f5f5f5ff;
        }
        .navegacao { 
            background: linear-gradient(to left, #932f0eff, #652d2c); 
            color: #fff;
        }
        .titulo {color: #fff; text-decoration: none;}
        .titulo:hover {color: #fff; text-decoration: none;}
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <nav class="nav navbar navbar-light shadow-sm px-3 navegacao d-flex justify-content-between align-items-center">
        <a class="navbar-brand fw-bold titulo mb-0">Meus Cursos</a>
        <a href="index.php"><button class="btn" 
           style="background-color: #8b4d4b; color: #fff; border: none;">Voltar</button></a>
    </nav>


    <!-- CONTEÚDO DOS CURSOS -->
    <div class="container my-4">
            <div class="row mt-4 g-4">
                <?php while($curso = $response->fetch_assoc()){ 
                    $verificacao = $conn->query("SELECT id FROM `" . $curso['id'] . "` WHERE id=" . $_SESSION['id']);
                    if($verificacao->num_rows>0){
                    ?>
                <div class="col-lg-3 col-md-6">
                    <a href="http://localhost/PIC/curso.php?id=<?php echo $curso["id"]; ?>" style="text-decoration: none;">
                    <div class="card shadow-sm border-0 h-100" style="border-radius:12px;">
                        <img src="<?php echo "images/cursos/" . $curso['img_arq']; ?>" 
                             class="card-img-top" 
                             style="border-radius:12px 12px 0 0; height: 250px; object-fit: cover;">

                        <div class="card-body d-flex flex-column">
                            <div>
                                <h5 class="fw-bold"><?php echo $curso['curso']; ?></h5>
                                <div class="text-secondary small mb-3">
                                    <i class="bi bi-calendar-event"></i> 
                                    <?php echo $curso['data'] . " às " . $curso['hora']; ?>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-auto">
                                <span class="badge bg-light text-dark border">
                                    <?php echo $curso['categoria_curso']; ?>
                                </span>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>            
                <?php 
                } //fim do if
            } ?>
            </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
<?php }?>