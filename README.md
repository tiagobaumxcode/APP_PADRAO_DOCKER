


# 🚀 APP_PADRAO — Ambiente Base (Laravel + Docker)

Repositório com o setup padrão de desenvolvimento web utilizando **Laravel (PHP 8.3)**, **PostgreSQL** e **Nginx**, totalmente containerizado com **Docker Compose**.

Este projeto serve como estrutura inicial padronizada para novas aplicações, garantindo que todo o time de desenvolvimento utilize a mesma versão do PHP, extensões e banco de dados sem necessidade de instalações locais complexas.

---

## 🛠️ Pré-requisitos

Antes de iniciar, certifique-se de ter instalado em sua máquina:

* [Git](https://git-scm.com/)
* [Docker Engine / Docker Desktop](https://www.docker.com/)
* [Docker Compose](https://docs.docker.com/compose/)

---

## 🚀 Como Inicializar o Projeto (Primeira Vez)

Siga os passos abaixo para clonar e rodar o projeto em um novo ambiente local:

### 1. Clonar o Repositório
```bash
git clone URL_DO_SEU_REPOSITORIO APP_PADRAO
cd APP_PADRAO
```


### 2. Configurar as Variáveis de Ambiente

Crie o arquivo `.env` do Laravel a partir do arquivo de exemplo:

Bash

```
cp src/.env.example src/.env
```

### 3. Subir os Contêineres Docker

Suba a infraestrutura do projeto em segundo plano:

Bash

```
docker compose up -d --build
```

### 4. Instalar as Dependências do PHP

Rode o Composer dentro do contêiner para baixar os pacotes do Laravel:

Bash

```
docker compose exec app composer install
```

### 5. Gerar a Chave da Aplicação e Executar Migrações

Gere a `APP_KEY` e crie a estrutura inicial das tabelas no PostgreSQL:

Bash

```
docker compose exec app php artisan key:generate
docker compose exec app php artisan migrate
```

### 6. Acessar a Aplicação

Abra o seu navegador no endereço: 👉 **[http://localhost:8080](http://localhost:8080)**

## 🔧 Solução de Problemas Comuns (Troubleshooting)

### Conflito de Nome de Contêiner ao Renomear Pasta ou Mudar de Ambiente

Se você renomeou a pasta do projeto ou tentou recriar os contêineres e recebeu uma mensagem de erro indicando conflito de nomes (`Conflict. The container name "/projeto_app" is already in use`):

Bash

```
docker rm -f projeto_app projeto_web projeto_db
docker compose up -d
```

### Erro de Tabela do Cache Inexistente (`Undefined table: 7 ERROR: relation "cache" does not exist`)

Ocorre ao executar `artisan cache:clear` antes das migrações do banco. Certifique-se de rodar as migrações primeiro:

Bash

```
docker compose exec app php artisan migrate
```

### Limpeza e Regeneração do Autoload e Cache do Laravel

Para regenerar os arquivos de autoload do Composer e limpar todo o cache de configuração e aplicação do Laravel em uma única linha:

Bash

```
docker compose exec app composer dump-autoload && docker compose exec app php artisan config:clear && docker compose exec app php artisan cache:clear
```

## ⚡ Comandos Úteis do Dia a Dia

- **Subir os contêineres:** `docker compose up -d`
    
- **Parar os contêineres:** `docker compose down`
    
- **Limpar/Reiniciar a infraestrutura do zero:** `docker compose down && docker compose up -d`
    
- **Rodar comandos Artisan:** `docker compose exec app php artisan <comando>`
    
- **Rodar o Composer:** `docker compose exec app composer <comando>`
    
- **Rodar os Testes (Pest/PHPUnit):** `docker compose exec app php artisan test`
    
- **Atualizar Autoload:** `docker compose exec app composer dump-autoload`
    

## 📂 Estrutura do Projeto

- `docker/` — Configurações do Nginx, PHP-FPM (Dockerfile) e scripts do ambiente.
    
- `src/` — Código-fonte da aplicação Laravel.
    
- `docker-compose.yml` — Mapeamento dos serviços (App, Web, PostgreSQL).

------------------------------------------------------------------------------------------

## Fluxo para Criar um Projeto Novo a Partir desse Modelo

Quando você quiser iniciar um novo sistema do zero:
Passo A: Clonar e Desvincular do Git Antigo
Bash

# 1. Clona em uma nova pasta com o nome do novo projeto
git clone URL_DO_SEU_REPOSITORIO_MODELO.git novo-projeto
cd novo-projeto

# 2. Apaga o histórico do Git antigo para começar um projeto limpo
rm -rf .git

# 3. Inicializa um repositório Git novo e vincula ao novo projeto
git init
git branch -M main
git remote add origin URL_DO_NOVO_REPOSITORIO.git
