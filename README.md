# Starships — gestão de espaçonaves

Aplicação desenvolvida como teste técnico para listar, consultar, cadastrar, editar e remover espaçonaves. Combina uma aplicação Laravel com interface em jQuery/Bootstrap e um serviço de dados local executado com JSON Server.

## Tecnologias

| Componente | Tecnologia utilizada no projeto |
| --- | --- |
| Back-end | PHP 7.4 e Laravel 8.x |
| Interface | JavaScript, jQuery, HTML, CSS e Bootstrap |
| Serviço de dados local | JSON Server, com `database/db.json` |
| Dependências | Composer e npm |

Este repositório mantém a stack original do teste. As versões acima descrevem o contexto de desenvolvimento, não uma recomendação para novos projetos em produção.

## Funcionalidades

- Listagem de espaçonaves.
- Consulta dos detalhes em um modal.
- Cadastro e edição de registros.
- Exclusão de espaçonaves pela interface.

## Como executar

### 1. Preparar a aplicação

```bash
git clone https://github.com/kellyane01/starships.git
cd starships
composer install
cp .env.example .env
php artisan key:generate
```

No PowerShell, use `Copy-Item .env.example .env` no lugar de `cp`, se necessário. Confira as configurações locais do `.env` antes de iniciar a aplicação.

### 2. Preparar os recursos de front-end, quando necessário

```bash
npm install
```

### 3. Iniciar o JSON Server

O JSON Server precisa estar instalado em uma versão compatível com a sintaxe utilizada pelo projeto:

```bash
json-server --watch database/db.json
```

O serviço de dados é disponibilizado em `http://localhost:3000`.

Confira as versões de Node.js, npm e JSON Server separadamente: `node --version`, `npm --version` e `json-server --version`. O projeto original não registra uma matriz de versões validada para esses três componentes.

### 4. Iniciar o Laravel em outro terminal

```bash
php artisan serve
```

Acesse `http://localhost:8000`. Mantenha o Laravel e o JSON Server em execução para utilizar a interface.

## Organização

| Diretório | Responsabilidade |
| --- | --- |
| `app/` | Código da aplicação Laravel |
| `resources/views/` | Telas e integração da interface |
| `routes/` | Definição de rotas |
| `public/` | Recursos públicos |
| `database/` | Arquivos de dados, incluindo `db.json` |
| `tests/` | Estrutura de testes do projeto |

## Contexto e evolução

O JSON Server permite executar o teste com uma API de dados local. A versão atual não representa um serviço de produção com garantias de disponibilidade ou persistência gerenciada.

Uma evolução possível é atualizar a stack, substituir a simulação por persistência própria e acrescentar testes para os fluxos de cadastro e integração. Essas melhorias não estão sendo apresentadas como já implementadas nesta versão.

## Autoria

[Brena Kellyane](https://github.com/kellyane01) · [LinkedIn](https://www.linkedin.com/in/brena-k-43b161198/)
