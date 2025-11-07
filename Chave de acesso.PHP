<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Chave de Acesso</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Estilo customizado mínimo */
    .left-side {
      background: linear-gradient(to right, #d64718, #a03410ff);
      color: #fff;
    }

    .hero {
      background: linear-gradient(to right, #d64718, #2e0c01ff);
      color: #fff;
      border: none;
      border-radius: 8px;
    }

    
    .full-vh {
      height: 100vh; /*Pro container ocupar toda altura*/
    }
    .botao{
        flex: 1;               
        height: 50px;        
        margin: 0 5px;        
        border: none;
        border-radius: 8px;
        font-weight: 600;
        font-size: 1rem;
        cursor: pointer;
        color: #fff;           
        background: #7c1d03ff; 
        box-shadow: 0 4px 6px rgba(0,0,0,0.2); /* sombra */
        transition: all 0.3s ease; /* fica branco quando passa o mouse*/
    }
  </style>
</head>
<body>

<div class="container-fluid p-0">
  <div class="row g-0 full-vh">
    <div class="col-5 d-flex flex-column align-items-center justify-content-start left-side py-3">
      
      <div class="d-flex w-100 px-3 mb-3">
        <button id="btn-cadastrar" class="botao btn btn-outline-light flex-fill fw-bold me-2">Cadastrar-se</button>
        <button id="btn-login" class="botao btn btn-light flex-fill fw-bold ms-2">Fazer Login</button>
      </div>
      <!-- Div Login (Chamado pelo javascript)-->
      <div id="login-form" class="card shadow-sm p-4" style="width: 350px;">
        <div class="text-center mb-3">
          <img src="cadeado.png" alt="Chave de Acesso" width="50">
          <h3 class="mt-2 fw-bold">Fazer Login</h3>
        </div>

        <?php if($erro ?? false): ?>
          <div class="alert alert-danger"><?php echo $erro; ?></div>
        <?php endif; ?>

        <form method="POST" action="processa_login.php">
          <input type="hidden" name="tipo_form" value="login">
          <div class="mb-3"><!-- Campo de preenchimento do email -->
            <input type="email" class="form-control" name="email" placeholder="seu@email.com" required>
          </div>
          <div class="mb-3"><!-- Campo de preenchimento do senha -->
            <input type="password" class="form-control" name="senha" placeholder="Senha" required>
          </div>
          <button type="submit" class="hero btn w-100 py-2 fw-bold">Entrar</button>
        </form>
      </div>
     <!-- Div Cadastro (Chamado pelo javascript) -->
     <div id="cadastrar-form" class="card shadow-sm p-4" style="width: 350px;">
        <div class="text-center mb-3">
          <img src="cadeado.png" alt="Chave de Acesso" width="50">
          <h3 class="mt-2 fw-bold">Cadastrar-se</h3>
        </div>

        <?php if($erro ?? false): ?>
          <div class="alert alert-danger"><?php echo $erro; ?></div>
        <?php endif; ?>

        <form method="POST" action="cadastrar.php">
        <input type="hidden" name="tipo_form" value="cadastro">
        <div class="mb-3"><!-- Campo de preenchimento do nome -->
            <input type="nome" class="form-control" name="nome" placeholder="nome" required>
          </div>
        <div class="mb-3"><!-- Campo de preenchimento do celular -->
            <input type="text" class="form-control" name="cell" placeholder="Telefone" required maxlength="11" pattern="[0-9]+" title="Digite apenas números"> <!--O "pattern" permite somente numeros de 0 a 9 impedindo de colocar caracteres-->
          </div>     
        <div class="mb-3"><!-- Campo de preenchimento do cpf -->
            <input type="cpf" class="form-control" name="cpf" placeholder="cpf" required>
          </div>
        <div class="mb-3"><!-- Campo de preenchimento do email -->
            <input type="email" class="form-control" name="email" placeholder="seu@email.com" required>
          </div>
          <div class="mb-3"><!-- Campo de preenchimento do senha -->
            <input type="password" class="form-control" name="senha" placeholder="Senha" required>
          </div>
          <button type="submit" class="hero btn w-100 py-2 fw-bold">Entrar</button>
        </form>
      </div>
    </div>
    </div>
    <!-- Lado direito -->
    <div class="col-6 bg-light">
      <!-- Espaço vazio -->
    </div>
  </div>
</div>

<!-- JS para alternar formulário -->

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="scripts.js"></script>
</body>
</html>
