# 🍕 MICHELE NOVEMBRE GASTRONOMIA

Coloque nesse espaço atualizações e instruções importantes sobre o projeto.
* OBS: Este website foi programado para usar no pacote de servidores do XAMPP. Não foi testado em outros pracotes.

## 🪟 INICIALIZAÇÃO DO SITE
### ALOCAÇÃO DO REPOSITÓRIO
* Faça o download do pacote XAMPP no link: https://www.apachefriends.org/download.html;
* Para o site funcionar da maneira correta clone o repositório dentro da pasta **xampp\\htdocs\\(nome da pasta que deseja o armazenar)**.

### 🎲 BANCO DE DADOS (FAÇA ANTES DE RODAR O SITE!)
* Crie um banco de dados chamado **mng** dentro da interface mysql do XAMPP;
* **Após criar o banco de dados** importe o **arquivo "mng.slq"** dentro da **pasta "sql"** para XAMPP;
* A conta do Admin é **email: admin@gmail.com** e a **senha: admin**.

### NGROK (NECESSÁRIO PARA O FUNCIONAMENTO DO WEBHOOK)
* Faça o download do **ngrok** no link: https://apps.microsoft.com/detail/9MVS1J51GMK6?hl=neutral&gl=BR&ocid=pdpshare
* Abra o aplicativo e coloque os seguintes códigos:
> **ngrok config add-authtoken** 35c6Pypt04T7kQowXrdZrGDIrhP_tAJCpmsAM5MQnQczQQPa <br>
> **ngrok http 80**

## 👾 GITHUB

### CODIGOS GIT OBRIGATÓRIOS PARA A MODIFICAÇÃO DO REPOSITÓRIO
* Link de apoio para **clonar repositório** (assista a partir do minuto 7:15): 📹 https://www.youtube.com/watch?v=Mw2wyWPk6z0&t=539s;
* **git init** (iniciar git);
* **git pull** (atualizar seu repositório); // A partir dessa etapa já é possivel modificar os arquivos;
* **git add .** (adiciona todas suas modificação para a lista de commit); //faça isso após todas suas modificações;
* **git commit -m "nome do seu commit"** (preparação do commit);
* **git  push origin main** (salva todas as suas alterações no repositório do github);

