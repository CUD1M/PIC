<?php
if(!isset($_SESSION)){
  session_start();
}
include ("conexao.php");
?>


<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Academia Gastronomica — Layout</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">

  <style>
    body { background: #faf7f6; }
    .hero { background: linear-gradient(to right, #d64718, #652d2c); color: #fff; padding: 60px 20px; text-align: center; position: relative; }
    .hero h1 { font-size: 3rem; }
    .hero img.decorative { position: absolute; top: 0; left: 0; width: 150px; height: auto; object-fit: contain; }
    .hero a.botão { background-color:#d64718; position: absolute; top: 20px; right:20px; border-radius: 8px; padding: 8px 15px; color:#fff; border: none; }
    .badge-custom { background: rgba(255,255,255,0.2); margin: 0 5px; }
    .course-card img { width: 100%; height: 200px; object-fit: cover; background: #eee; }
    .price { font-weight: bold; color: #d64718; }
    .user-info { position: absolute; top: 20px; right: 40px; background: rgba(255, 255, 255, 0.15); backdrop-filter: blur(6px); color: #fff; padding: 8px 15px; border-radius: 10px; display: flex; align-items: center; gap: 10px; font-weight: 500; font-size: 0.9rem;}
    .user-info a button { background-color: rgba(255, 255, 255, 0.25); color: #fff; border: none; padding: 4px 10px; border-radius: 6px; cursor: pointer; transition: background-color 0.2s ease; }
  </style>
</head>

<body>

  <!-- HERO -->
  <section class="hero">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="logo.png" alt="Decoração" class="decorative mt-3">
        </div>
        <div class="col-md-6">
          <?php 
            if(isset($_SESSION["id"])){
          ?>
              <div class="user-info">
                <span><?php echo htmlspecialchars($_SESSION["nome"]); ?></span>
                <?php if($_SESSION["id"]==1){ ?> <a href="admin.php"><button>Admin</button></a><?php } ?>
                <a href="logout.php"><button>Logout</button></a>
              </div>
          <?php 
            } else {
          ?>
          <a href="Chave de acesso.PHP" class="botão text-decoration-none">Login</a> <!--Redireciona para a página de cadastro-->
          <?php
            }
        ?>
      </div>
    </div>
      <h1>Academia Gastronomica</h1>
      <p>Aprenda culinária profissional com chefes experientes. Cursos práticos que transformam paixão em conhecimento.</p>
      <div>
        <span class="badge rounded-pill badge-custom">Certificado Profissional</span>
        <span class="badge rounded-pill badge-custom">Aulas Práticas</span>
        <span class="badge rounded-pill badge-custom">Técnicas Profissionais</span>
      </div>
    </div>
  </section>


  <!-- CONTAINER PRINCIPAL (MENU + FILTROS + CARDS) -->
  <div class="container my-4">

    <!-- FILTROS (menu) -->
    <div class="p-4 border rounded shadow-sm bg-light">
      <h5 class="mb-3">Filtros</h5>

      <!-- PERÍODO -->
      <div class="mb-4">
        <label class="form-label fw-bold">Período</label>
        <div class="d-flex gap-2 flex-wrap">

          <button class="btn btn-outline-secondary filtro-periodo">Esta Semana</button>
          <button class="btn btn-outline-secondary filtro-periodo">Este Mês</button>
          <button class="btn btn-outline-secondary filtro-periodo">Todos</button>

          <div class="input-group w-50">
            <input type="date" class="form-control" id="dataInicio">
            <input type="date" class="form-control" id="dataFim">
            <button class="btn btn-primary px-4" id="aplicarFiltro">Aplicar</button>
          </div>

        </div>
      </div>

      <!-- ICONES -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

      <!-- TIPOS DE CULINÁRIA -->
      <strong>Tipos de Culinária</strong>
      <div class="mt-2 d-flex gap-2 flex-wrap">
        <?php
        $sql = "SELECT DISTINCT categoria_curso FROM cursos ORDER BY categoria_curso ASC";
        $categorias = $conn->query($sql);

        if($categorias->num_rows > 0) {
          while ($cat = $categorias->fetch_assoc()){
            $nome = htmlspecialchars($cat['categoria_curso']);
            echo '<button class="btn btn-outline-secondary filtro">' . $nome . '</button>';
          
          }
        } else {
           echo '<span class="text-muted">Nenhuma categoria cadastrada</span>';
        }
        ?>
      </div>
    </div>
    <!-- CARDS DOS CURSOS -->  
    <?php      
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
                            <img src="<?php echo $array[$i]['img_arq']; ?>" class="card-img-top" style="border-radius:12px 12px 0 0; height: 250px; object-fit: cover;">
                            <div class="card-body d-flex flex-column">
                                <div>
                                    <h5 class="fw-bold"><?php echo $array[$i]['curso'] ?></h5>
                                    <div class="text-secondary small mb-3">
                                        <i class="bi bi-calendar-event"></i> <?php echo $array[$i]['data']. ' às ' . $array[$i]['hora'] ?>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-auto">
                                    <span class="badge bg-light text-dark border"><?php echo $array[$i]['categoria_curso']?></span>
                                    <button class="btn btn-danger">Inscreva-se</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
            }
        ?>
            <div class="row mt-4 g-4">
        <?php
        }
    ?>
  </div>

  <!-- BOOTSTRAP JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="script.js"></script>

</body>
</html>
