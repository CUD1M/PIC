// --- CONTROLE DE LOGIN E CADASTRO ---
const btnCadastrar = document.getElementById('btn-cadastrar');
const cadastrarForm = document.getElementById('cadastrar-form');
const btnLogin = document.getElementById('btn-login');
const loginForm = document.getElementById('login-form');

// Verifica se os elementos existem antes de adicionar eventos (evita erros se a página mudar)
if(btnCadastrar && btnLogin) {
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
}

// --- LÓGICA DO CHECKBOX ---
const checkbox = document.getElementById("aceitoTermos");
const botao = document.getElementById("btnEntrar");

// Só executa se o checkbox e o botão existirem na tela
if (checkbox && botao) {
    // Garante estado inicial correto via JS também
    if (!checkbox.checked) {
        botao.disabled = true;
        botao.classList.add("btn-desativado");
    }

    checkbox.addEventListener("change", function () {
        if (this.checked) {
            // ATIVA O BOTÃO
            botao.disabled = false;
            botao.classList.remove("btn-desativado");
        } else {
            // DESATIVA O BOTÃO
            botao.disabled = true;
            botao.classList.add("btn-desativado");
        }
    });
}