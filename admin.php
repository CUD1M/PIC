<?php
    if(!isset($_SESSION)){
        session_start();
    }
    if($_SESSION["id"]!=1){
        echo "<script>alert('VOCE NÃO É ADMIN!'); window.location.href='index.php';</script>";
    } else { 
    include ("include\conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Menu Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f5f5f5ff;
        }
        .navegacao { background: linear-gradient(to left, #932f0eff, #652d2c); color: #fff;}
        .titulo:hover {color: #fff;text-decoration: none;}
        .titulo{color: #fff;text-decoration: none;}
    </style>
</head>
<body>

    <nav class="nav navbar navbar-light bg-white shadow-sm px-3 navegacao d-flex justify-content-between align-items-center">
    
    <div class="d-flex gap-2">
        <a class="navbar-brand fw-bold titulo mb-0">Menu Admin</a>
        <button class="btn" style="background-color: #8b4d4b; color: #fff; border: none;"data-bs-toggle="modal" data-bs-target="#modalAddCurso">Adicionar Curso</button>
        <button class="btn" style="background-color: #8b4d4b; color: #fff; border: none;"data-bs-toggle="modal" data-bs-target="#modalExcluirCurso">Adicionar Curso</button>
       
    </div>

    <div class="d-flex align-items-center gap-3">
        
        <button class="btn" style="background-color: #8b4d4b; color: #fff; border: none;">Voltar</button>
    </div>

    </nav>


    <div class="container my-4">

        <?php
            $response = $conn->query("SELECT * FROM cursos");
            if($response->num_rows>0){
        ?>
        <div class="row mt-4 g-4">
            <?php
                for($i=0;$i<$response->num_rows;$i++){
                    $response->data_seek($i);
                    $array[]=$response->fetch_assoc();
            ?>
            <div class="col-lg-3 col-md-6">
                <div class="card shadow-sm border-0 h-100" style="border-radius:12px;">
                    <img src="<?php echo "images\\cursos\\" . $array[$i]['img_arq']; ?>" class="card-img-top" style="border-radius:12px 12px 0 0; height: 250px; object-fit: cover;">
                    <div class="card-body d-flex flex-column">
                        <div>
                            <h5 class="fw-bold"><?php echo $array[$i]['curso'] ?></h5>
                            <div class="text-secondary small mb-3">
                                <i class="bi bi-calendar-event"></i> <?php echo $array[$i]['data'] . " às " . $array[$i]['hora']; ?>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-auto">
                            <span class="badge bg-light text-dark border"><?php echo $array[$i]['categoria_curso']; ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
        <?php
            } else echo "<p>NÃO HÁ CURSOS CADASTRADOS</p>";
        ?>

    </div>


    <!-- MODAL ADICIONAR -->
    <div class="modal fade" id="modalAddCurso" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Adicionar Novo Curso</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="formAdicionarCurso" class="row g-3" action="processa_curso.php" method="POST" enctype="multipart/form-data">
                    <div class="col-md-4 d-flex justify-content-center align-items-center flex-column">
                        <div class="border rounded p-4 text-center" style="width:100%;height:100%;background:#f5f5f5;">
                            <i class="bi bi-cloud-upload-fill text-muted" style="font-size:50px;"></i>
                            <p class="text-muted">Arraste ou cole a foto aqui</p>
                            <input type="file" class="form-control form-control-sm" name="foto_curso" accept=".png, .jpg, .jpeg" required>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label class="form-label">Nome do Curso *</label>
                            <input type="text" class="form-control" name="nome_curso" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Descrição *</label>
                            <textarea class="form-control" rows="3" name="descricao" required></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Preço (R$) *</label>
                                <input type="number" class="form-control" name="preco" step="0.01" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Número Máximo de Alunos *</label>
                                <input type="number" class="form-control" name="max_alunos" min="1" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Data Inicial *</label>
                                <input type="date" class="form-control" name="data" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Horário *</label>
                                <input type="time" class="form-control" name="hora" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Professor *</label>
                            <select class="form-control" name="nome_professor" required>
                                <option value="" disabled selected hidden>Escolha o professor</option>
                                <option value="Michele Novembre">Michele Novembre</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Categoria *</label>
                            <input type="text" class="form-control" name="categoria_curso" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-laranja">Adicionar Curso</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>


    <!-- MODAL EXCLUIR -->
    <div class="modal fade" id="modalExcluirCurso" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="delete_curso.php" method="POST">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title">Excluir Cursos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body pt-0">
                    <p class="text-secondary mb-3">Selecione os cursos que deseja excluir</p>
                    <div class="list-group">
                        <?php 
                        if($response->num_rows>0){
                            for($i=0;$i<$response->num_rows;$i++){
                                $response->data_seek($i);
                                $array2[]=$response->fetch_assoc();
                        ?>
                        <label class="list-group-item d-flex align-items-center mb-2 border rounded p-3">
                            <div class="form-check me-3">
                                <input class="form-check-input" type="checkbox" value="<?php echo $array2[$i]["id"] ?>" name="<?php echo $i ?>">
                            </div>
                            <img src="<?php echo "images\\cursos\\" . $array2[$i]["img_arq"]; ?>" class="img-fluid rounded me-3" style="width:70px;height:70px;object-fit:cover;">
                            <div class="flex-grow-1">
                                <h6 class="fw-bold mb-1"><?php echo $array2[$i]["curso"]; ?></h6>
                                <p class="mb-0 small text-muted"><?php echo $array2[$i]["nome_professor"]; ?></p>
                                <p class="mb-0 small text-danger fw-bold">Preço: R$ <?php echo $array2[$i]["preco"]; ?></p>
                            </div>
                        </label>
                        <?php 
                            }
                        } else echo "<p>Nenhum Curso Encontrado!</p>";
                        ?>
                    </div>
                </div>
                <div class="modal-footer d-block border-0 pt-0">
                    <button type="submit" class="btn text-white w-100 mb-2" style="background:#e85966;">Excluir</button>
                    <button type="button" class="btn btn-light w-100" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

<?php } ?>
