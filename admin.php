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
        .sidebar {
            min-width: 200px;
            max-width: 200px;
            background-color: #d64718; 
            min-height: 100vh;
            padding-top: 20px;
            border-right: 3px solid #ccc; 
        }

        .sidebar a {
            display: block;
            padding: 10px 20px;
            color: #fff; 
            text-decoration: none;
            margin-bottom: 5px;
            border-radius: 5px;
            transition: all 0.2s;
        }

        .sidebar a.active {
            background-color: #fff; 
            color: #000; 
        }

        .sidebar a:hover {
            background-color: #fff; 
            color: #000; 
        }
        
        .tab-content {
            padding-left: 20px; 
        }
    </style>
</head>
<body class="bg-light">

    <nav class="nav navbar navbar-light bg-white shadow-sm px-3">
        <a class="navbar-brand fw-bold" href="#">Academia Culinária</a>
        <a href="index.php"><button class="btn btn-outline-secondary">Sair</button></a>
    </nav>

    <div class="d-flex">
        <div class="sidebar">
            <a href="#" class="active" data-tab="financeiro">Financeiro</a>
            <a href="#" data-tab="cursos">Cursos</a>
            <a href="#" data-tab="alunos">Alunos</a>
        </div>

        <div class="container my-4 flex-grow-1">

            <div id="financeiro" class="tab-content">
                <h4>Financeiro</h4>
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="mb-3">Filtros</h5>
                        <form class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Curso</label>
                                <select class="form-select">
                                    <option>Selecione um curso</option>
                                    <option>Pizza Italiana</option>
                                    <option>Bolos e Tortas</option>
                                    <option>Culinária Japonesa</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Data Inicial</label>
                                <input type="date" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Data Final</label>
                                <input type="date" class="form-control">
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-4">
                        <div class="card shadow-sm text-center">
                            <div class="card-body">
                                <h6>Total Recebido</h6>
                                <h3>VALOR AQUI</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow-sm text-center">
                            <div class="card-body">
                                <h6>Total Cursos Vendidos</h6>
                                <h3>VALOR AQUI</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow-sm text-center">
                            <div class="card-body">
                                <h6>Média por Curso</h6>
                                <h3>VALOR AQUI</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="cursos" class="tab-content" style="display:none;">
                <h4>Cursos</h4>
                <div class="d-flex justify-content-end gap-2 mb-3">
                    <button class="btn btn-laranja" data-bs-toggle="modal" data-bs-target="#modalAddCurso">Adicionar Curso</button>
                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalExcluirCurso">Excluir Cursos</button>
                </div>
                
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="mb-3">Filtros</h5>
                        <form class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Curso</label>
                                <select class="form-select">
                                    <option>Selecione um curso</option>
                                    <option>Pizza Italiana</option>
                                    <option>Bolos e Tortas</option>
                                    <option>Culinária Japonesa</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Data Inicial</label>
                                <input type="date" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Data Final</label>
                                <input type="date" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">CPF do Aluno</label>
                                <input type="text" class="form-control" placeholder="000.000.000-00">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Nome do Aluno</label>
                                <input type="text" class="form-control" placeholder="Pesquisar por nome...">
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-4">
                        <div class="card shadow-sm text-center">
                            <div class="card-body">
                                <h6>Total de Cursos</h6>
                                <h3>3</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow-sm text-center">
                            <div class="card-body">
                                <h6>Total de Alunos</h6>
                                <h3>5</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow-sm text-center">
                            <div class="card-body">
                                <h6>Alunos Desistentes</h6>
                                <h3>2</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <?php //informações dos cursos presentes no DB
                
                    $response = $conn->query(
                        "SELECT* FROM cursos"
                    );
                    if($response->num_rows>0){ //Verifica se existe algum curso cadastrado
                        ?>
                            <div class="row mt-4 g-4">
                        <?php

                        for($i=0;$i<$response->num_rows;$i++){ //laço da repetição para exibição dos cursos
                            $response->data_seek($i);
                            $array[]=$response->fetch_assoc();
                            ?>
                                <div class="col-lg-3 col-md-6">
                                    <div class="card shadow-sm border-0 h-100" style="border-radius:12px;">
                                        <img src="<?php echo "images\\cursos\\" . $array[$i]['img_arq']; ?>" class="card-img-top" style="border-radius:12px 12px 0 0; height: 250px; object-fit: cover;"> <!--Cominho da imagem-->
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
                        <div class="row mt-4 g-4">
                    <?php
                } else echo "<h5>NÃO HÁ CURSOS CADASTRADOS</h5>";
                ?>
            </div>

            <div id="alunos" class="tab-content" style="display:none;">
                <h4>Alunos</h4>
                <p>Aqui você pode colocar informações detalhadas sobre os alunos.</p>
            </div>

        </div>
    </div>

    <div class="modal fade" id="modalAddCurso" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Adicionar Novo Curso</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="formAdicionarCurso" class="row g-3" action="forms_curso.php" method="POST" enctype="multipart/form-data">
                    <div class="col-md-4 d-flex justify-content-center align-items-center flex-column">
                        <div class="border rounded p-4 text-center" style="width: 100%; height: 250px; background-color: #f5f5f5; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <i class="bi bi-cloud-upload-fill text-muted" style="font-size: 50px;"></i>
                            <p class="text-muted">Arraste ou cole a foto aqui</p>
                            <label for="imageUpload" class="btn btn-sm btn-outline-secondary mt-2">Selecionar Arquivo</label>
                            <input type="file" id="imageUpload" class="form-control d-none" name="foto_curso" accept=".png, .jpg, .jpeg" required>
                        </div>
                    </div>
                
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label class="form-label">Nome do Curso  <span style="color:red">*</span></label>
                            <input type="text" class="form-control" name="nome_curso" placeholder="Ex: Curso de Pizza Italiana" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Descrição  <span style="color:red">*</span></label>
                            <textarea class="form-control" rows="3" name="descricao" placeholder="Descreva o que será ensinado no curso..." required></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Preço (R$)  <span style="color:red">*</span></label>
                                <input type="number" class="form-control" name="preco" step="0.01" min="0" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Número Máximo de Alunos  <span style="color:red">*</span></label>
                                <input type="number" class="form-control" name="max_alunos" requiered>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Data Inicial do Curso  <span style="color:red">*</span></label>
                                <input type="date" class="form-control" name="data" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Horário do Curso  <span style="color:red">*</span></label>
                                <input type="time" class="form-control" name="hora" requiered>
                            </div>
                            <div class="mb-3">
                            <label class="form-label">Professores <span style="color:red">*</span></label>
                            <select class="form-control" name="nome_professor" required>
                                <option value="" disabled selected hidden>Escolha o professor</option>
                                <option value="option1">Nome 1</option>
                                <option value="option2">Nome 2</option>
                                <option value="option3">Nome 3</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Categoria do Curso <span style="color:red">*</span></label>
                            <input type="text" class="form-control" name="categoria_curso" required>
                        </div>
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


    <div class="modal fade" id="modalExcluirCurso" tabindex="-1" aria-labelledby="modalExcluirCursoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <form action="delete_curso.php" method="POST"> <!-- Form excluir curso -->
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title" id="modalExcluirCursoLabel">Excluir Cursos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body pt-0">
                <p class="text-secondary mb-3">Selecione os cursos que deseja excluir</p>
                <div class="list-group">
                    <!-- Estrutura de cada curso para exclusão! -->
                     <?php 
                     if($response->num_rows>0){
                        for($i=0;$i<$response->num_rows;$i++){
                            $response->data_seek($i);
                            $array2[]=$response->fetch_assoc();
                     ?>
                    <label class="list-group-item d-flex align-items-center mb-2 border rounded p-3" style="cursor: pointer;">
                        <div class="form-check me-3 mt-0">
                            <input class="form-check-input mt-0" type="checkbox" value="<?php echo $array2[$i]["id"] ?>" name="<?php echo $i ?>">
                        </div>

                        <img src="<?php echo "images\\cursos\\" . $array2[$i]["img_arq"]; ?>" class="img-fluid rounded me-3" alt="Curso de Pizza Italiana" style="width: 70px; height: 70px; object-fit: cover;">
                        
                        <div class="flex-grow-1">
                            <h6 class="mb-1 fw-bold"><?php echo $array2[$i]["curso"]; ?></h6>
                            <p class="mb-0 small text-muted"><?php echo $array2[$i]["nome_professor"]; ?></p>
                            <p class="mb-0 small text-danger fw-bold">Preço: R$ <?php echo $array2[$i]["preco"]; ?></p>
                        </div>
                    </label>
                    <?php 
                        }
                     } else echo "<p> Nenhum Curso Encontrado! </p>";
                    ?>
    
                </div>
            </div>
            

            <div class="modal-footer d-block border-0 pt-0">
                <button type="submit" class="btn text-white w-100 mb-2 py-2" style="background-color: #e85966; border-color: #e85966;">Excluir</button>
                <button type="button" class="btn btn-light w-100 py-2" data-bs-dismiss="modal">Cancelar</button>
            </div>
            </form>
        </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script_admin.js"> </script>
</body>
</html>

<?php } ?>