# 🚀 Starship System

Bem-vindo ao **Starship System**! Este projeto foi desenvolvido como parte de um teste técnico. Ele simula um sistema de
gestão de espaçonaves onde é possível visualizar, adicionar, editar e remover espaçonaves.

## 🛠 Tecnologias Utilizadas

- **PHP 7.4**: Linguagem principal utilizada para o backend.
- **Laravel 8.x**: Framework PHP utilizado para a arquitetura RESTful da API.
- **JSON Server**: Utilizado para simular uma API REST baseada em um arquivo JSON.
- **JavaScript (jQuery)**: Utilizado no frontend para interagir com a API.
- **HTML/CSS/Bootstrap**: Para a interface e estilização das páginas.

## ⚙️ Funcionalidades

- **Listagem de espaçonaves**: Veja todas as espaçonaves disponíveis no sistema.
- **Visualização detalhada**: Abra um modal para visualizar informações detalhadas de cada espaçonave.
- **Adicionar espaçonaves**: Cadastre novas espaçonaves através de um formulário.
- **Editar espaçonaves**: Edite os dados de espaçonaves existentes.
- **Remover espaçonaves**: Exclua espaçonaves indesejadas da listagem.

## 📂 Estrutura do Projeto

```bash
.
├── app/               # Diretório do Laravel
├── resources/views    # Arquivos frontend (views)
├── routes/            # Rotas da API
├── public/            # Arquivos públicos acessíveis (CSS)
├── database/          # Arquivos relacionados ao banco de dados (db.json para o JSON Server)
└── README.md          # Este arquivo
```

## 🚀 Como Executar o Projeto

### 1. Clone o repositório

```bash
git clone https://github.com/kellyane01/starships.git
cd starship
```

### 2. Instale as dependências do Laravel

Para instalar as dependências do projeto Laravel, execute o seguinte comando no diretório raiz:

```bash
composer install
```

### 3. Configure o arquivo .env

Renomeie o arquivo .env.example para .env:

```bash
cp .env.example .env
```

Em seguida, gere a chave da aplicação:

```bash
php artisan key:generate
```

### 4. Instale as dependências do frontend (opcional)

```bash
npm install
```

### 5. Inicie o servidor Laravel

Agora você pode iniciar o servidor local do Laravel:

```bash
php artisan serve
```

Isso deve iniciar o servidor na URL:

```arduino
http://localhost:8000
```

### 6. Execute o JSON Server

Inicie o JSON Server para servir o arquivo db.json:

```bash
json-server --watch database/db.json
```

Isso vai iniciar o servidor de API simulada em:

```arduino
http://localhost:3000
```

**Atenção**: caso o comando acima estoure um erro, verifique a versão do npm. Versão esperada: ^18.

### 7. Acesse o projeto
Agora, você pode acessar o frontend do projeto via Laravel e as rotas da API JSON Server para listar e gerenciar as espaçonaves.

## 🛠 Comandos Úteis
- Iniciar o servidor Laravel: `php artisan serve`
- Iniciar o JSON Server: `json-server --watch database/db.json`
