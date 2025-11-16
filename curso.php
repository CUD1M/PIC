<?php
  if(!isset($_SESSION)){
    session_start();
  } 
  $id = $_GET["id"];
  include ("include\conexao.php");
  $sql = "SELECT * FROM `cursos` WHERE id=$id";
  $result = $conn->query($sql);
  $info = $result->fetch_assoc();
?>

<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo "Curso " . $info['curso'];  ?></title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.5/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Google Font (optional) -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

  <style>
    :root{
      --brand:#c53a00; /* dark orange */
      --brand-soft:#f6e6df;
      --card-shadow: 0 6px 18px rgba(0,0,0,0.06);
      --muted:#6b6b6b;
    }

    body{
      font-family: "Inter", system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
      background: #fff;
      color: #222;
    }

    .topbar{
      background: var(--brand);
      color: #fff;
      padding: 28px 0;
    }
    .topbar a{
      color: rgba(255,255,255,0.95);
      text-decoration: none;
      font-weight: 600;
      font-size: 0.95rem;
    }
    .topbar .course-title{
      font-size: 1.6rem;
      font-weight: 700;
      margin-top: 6px;
    }
    .badge-course{
      background: rgba(255,255,255,0.1);
      color: #fff;
      font-weight: 600;
      font-size: 0.8rem;
      padding: 5px 10px;
      border-radius: 999px;
    }

    .main-img{
      width: 100%;
      height: 300px;
      object-fit: cover;
      border-radius: 8px;
      box-shadow: var(--card-shadow);
    }

    .card-plain{
      border: 1px solid #eee;
      box-shadow: var(--card-shadow);
      border-radius: 8px;
    }

    .small-muted{
      color: var(--muted);
      font-size: 0.9rem;
    }

    .detail-label{
      font-size: 0.92rem;
      color: var(--muted);
    }

    .price-big{
      color: var(--brand);
      font-weight: 800;
      font-size: 1.45rem;
    }

    .register-card .btn-primary{
      background: var(--brand);
      border-color: var(--brand);
      box-shadow: none;
    }

    .info-row i{
      color: var(--brand);
      font-size: 1.05rem;
    }

    .accordion-button {
      box-shadow: none;
    }
    .accordion-item {
      border: none;
      border-bottom: 1px solid #eee;
    }

    @media (max-width: 991px){
      .main-img { height: 220px; }
    }
  </style>
</head>
<body>

  <header class="topbar">
    <div class="container">
      <div class="d-flex flex-column flex-md-row align-items-start gap-3">
        <div class="me-auto">
          <a href="http://localhost/PIC/index.php" class="d-inline-flex align-items-center"> <!-- Link Página Inicial -->
            <i class="bi bi-arrow-left me-2">Voltar aos cursos</i>
          </a>
          <div class="course-title"><?php echo $info['curso'] ?></div>
          <div class="mt-2">
            <span class="badge-course"><?php echo $info['categoria_curso'] ?></span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <main class="py-5">
    <div class="container">
      <div class="row g-4">

        <div class="col-lg-8">

          <img src="<?php echo "images\\cursos\\" . $info['img_arq'] ?>" alt="Pizza" class="main-img mb-4">

          <div class="card card-plain mb-4 p-3">
            <div class="card-body p-3">
              <h5 class="mb-2">Sobre o Curso</h5>
              <p class="small-muted mb-3">
                <?php echo $info['descricao'] ?>
              </p>

              <div class="row text-muted small">
                <div class="col-12 col-md-6 d-flex align-items-start mb-2 info-row">
                  <i class="bi bi-geo-alt-fill me-2 mt-1"></i>
                  <div>
                    <div class="fw-bold">Localização</div>
                    <div class="small-muted">Rua José Ferraz de Camargo, 555 – Piracicaba/SP</div>
                  </div>
                </div>

                <div class="col-12 col-md-6 d-flex align-items-start mb-2 info-row">
                  <i class="bi bi-clock-fill me-2 mt-1"></i>
                  <div>
                    <div class="fw-bold">Duração</div>
                    <div class="small-muted">4 horas práticas</div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Perguntas Frequentes -->
          <div class="card card-plain p-3">
            <div class="card-body p-0">
              <h5 class="mb-3">Perguntas Frequentes</h5>

              <div class="accordion" id="faqAccordion">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="faqHeading1">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq1" aria-expanded="false" aria-controls="faq1">
                      Qual é a duração do curso?
                    </button>
                  </h2>
                  <div id="faq1" class="accordion-collapse collapse" aria-labelledby="faqHeading1" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                      O curso tem 4 horas de duração, com prática na preparação da massa, montagem e cocção das pizzas.
                    </div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header" id="faqHeading2">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2" aria-expanded="false" aria-controls="faq2">
                      Preciso ter experiência prévia?
                    </button>
                  </h2>
                  <div id="faq2" class="accordion-collapse collapse" aria-labelledby="faqHeading2" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                      Não é necessário — o curso é ideal tanto para iniciantes quanto para quem já possui alguma prática.
                    </div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header" id="faqHeading3">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3" aria-expanded="false" aria-controls="faq3">
                      O que está incluído no curso?
                    </button>
                  </h2>
                  <div id="faq3" class="accordion-collapse collapse" aria-labelledby="faqHeading3" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                      Ingredientes, receitas impressas, e a degustação das pizzas feitas durante a aula.
                    </div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header" id="faqHeading4">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4" aria-expanded="false" aria-controls="faq4">
                      Onde fica localizada a escola?
                    </button>
                  </h2>
                  <div id="faq4" class="accordion-collapse collapse" aria-labelledby="faqHeading4" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                      A escola fica na Rua José Ferraz de Camargo, 555, no centro de Piracicaba/SP. 
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>

        <!-- Right column (sidebar) -->
        <div class="col-lg-4">
          <!-- Detalhes do Curso -->
          <div class="card mb-3 card-plain p-3">
            <div class="card-body">
              <h6 class="mb-3">Detalhes do Curso</h6>

              <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="detail-label">Preço</div>
                <div class="price-big"><?php echo "R$ " . $info['preco'] ?></div>
              </div>

              <div class="mb-3 small-muted">
                <div class="mb-2"><i class="bi bi-person-fill me-2"></i><strong>Professor</strong><div class="small-muted">Michele November</div></div>
                <div class="mb-2"><i class="bi bi-calendar-event-fill me-2"></i><strong>Data e Horário</strong><div class="small-muted"><?php echo $info["data"] . " às " . $info['hora'] ?></div></div>
                <div class="mb-0"><i class="bi bi-people-fill me-2"></i><strong>Vagas</strong><div class="small-muted">15 disponíveis de 20</div></div>
              </div>
            </div>
          </div>

          <!-- Inscrição -->
          <div class="card register-card card-plain p-3">
            <div class="card-body">
              <h6 class="mb-3">Inscrição</h6>

              <div class="p-3 mb-3" style="background:var(--brand-soft); border-radius:8px;">
                <div class="small-muted">Total:</div>
                <div class="price-big"><?php echo "R$ " . $info['preco'] ?></div>
              </div>

              <button class="btn btn-primary w-100 mb-2">Fazer Inscrição</button>

              <button class="btn btn-outline-secondary w-100"><i class="bi bi-chat-dots me-2"></i>Entrar em contato</button>
            </div>
          </div>

        </div>
      </div>
    </div>
  </main>

  <!-- Bootstrap JS (Bundle includes Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
