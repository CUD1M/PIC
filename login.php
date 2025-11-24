<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Chave de Acesso</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
  
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
      height: 100vh; 
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
        box-shadow: 0 4px 6px rgba(0,0,0,0.2); 
        transition: all 0.3s ease;
    
    }
    .btn-desativado {
    background-color: #ccc !important; /
    background-image: none !important; 
    color: #777 !important;
    cursor: not-allowed;
    border: none;
    box-shadow: non
    }

  </style>
</head>
<body>
<div class="container-fluid p-0">
  <div class="container-fluid p-0 left-side d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card shadow-sm p-4" style="width: 420px; background: #fff; color: #000; border-radius: 8px;">
      <a href="index.php"><img class="mb-3"src="images\logo.png" alt="LOGO"></a>
      <div class="d-flex w-100 px-3 mb-3">
        <button id="btn-cadastrar" class="botao btn btn-outline-light flex-fill fw-bold me-2">Cadastrar-se</button>
        <button id="btn-login" class="botao btn btn-light flex-fill fw-bold ms-2">Fazer Login</button>
      </div>
      
      <div id="login-form" class="card shadow-sm p-4" style="width: 350px;">
        <div class="text-center mb-3">
          <img src="images\cadeado.png" alt="Chave de Acesso" width="50">
          <h3 class="mt-2 fw-bold">Fazer Login</h3>
        </div>

        <?php if($erro ?? false): ?>
          <div class="alert alert-danger"><?php echo $erro; ?></div>
        <?php endif; ?>

        <form method="POST" action="processa_login.php">
          <input type="hidden" name="tipo_form" value="login">
          <div class="mb-3">
            <input type="email" class="form-control" name="email" placeholder="seu@email.com" required>
          </div>
          <div class="mb-3">
            <input type="password" class="form-control" name="senha" placeholder="Senha" required>
          </div>
          <button type="submit" class="hero btn w-100 py-2 fw-bold">Entrar</button>
        </form>
      </div>
     
     <div id="cadastrar-form" class="card shadow-sm p-4" style="width: 350px;">
        <div class="text-center mb-3">
          <img src="images\cadeado.png" alt="Chave de Acesso" width="50">
          <h3 class="mt-2 fw-bold">Cadastrar-se</h3>
        </div>

        <?php if($erro ?? false): ?>
          <div class="alert alert-danger"><?php echo $erro; ?></div>
        <?php endif; ?>

        <form method="POST" action="processa_cadastrar.php">
        <input type="hidden" name="tipo_form" value="cadastro">
        <div class="mb-3">
            <input type="nome" class="form-control" name="nome" placeholder="nome" required>
          </div>
        <div class="mb-3">
            <input type="text" class="form-control" name="cell" placeholder="Telefone" required maxlength="11" pattern="[0-9]+" title="Digite apenas números"> <!--O "pattern" permite somente numeros de 0 a 9 impedindo de colocar caracteres-->
          </div>     
        <div class="mb-3">
            <input type="cpf" class="form-control" name="cpf" placeholder="cpf" >
          </div>
        <div class="mb-3">
            <input type="email" class="form-control" name="email" placeholder="seu@email.com" required>
          </div>
          <div class="mb-3">
            <input type="password" class="form-control" name="senha" placeholder="Senha" required>
          </div>
          <div class="form-check mb-3">
          <input id="aceitoTermos" class="form-check-input" type="checkbox" required>
          <label for="aceitoTermos" class="form-check-label">
          Ao confirmar este checkbox, declaro que 
          <a href="termo_consentimento_michele_novembre.pdf" target="_blank" style="color: blue; text-decoration: underline;">
          li e aceito os termos
          </a>
          </label>
          </div>
          <button type="submit" class="hero btn w-100 py-2 fw-bold btn-desativado" id="btnEntrar" disabled>Entrar</button>
        </form>
      </div>
    </div>
    </div>
    
    <div class="col-6 bg-light">
     
    </div>
  </div>
</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/scripts.js?v=2"></script>
</body>
</html>
