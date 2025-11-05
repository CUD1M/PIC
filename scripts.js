// --- CONTROLE DE LOGIN E CADASTRO ---
const btnCadastrar = document.getElementById('btn-cadastrar');
const cadastrarForm = document.getElementById('cadastrar-form');
const btnLogin = document.getElementById('btn-login');
const loginForm = document.getElementById('login-form');

// Mostra login por padrão
loginForm.style.display = 'block';
cadastrarForm.style.display = 'none';

btnCadastrar.addEventListener('click', () => {
  loginForm.style.display = 'none';
  cadastrarForm.style.display = 'block';
});

btnLogin.addEventListener('click', () => {
  loginForm.style.display = 'block';
  cadastrarForm.style.display = 'none';
});
