# Task API + Cat API Integration 🐱 ✅

Este projeto Laravel oferece um CRUD simples de tarefas, com filtro por status, e uma integração com uma API pública externa — [The Cat API](https://thecatapi.com) — para retornar imagens aleatórias de gatos usando autenticação via API Key.

---

## 📦 Requisitos

- PHP >= 8.1
- Composer
- MySQL ou MariaDB
- Laravel >= 10
- [The Cat API](https://thecatapi.com) (cadastro gratuito para obter uma API Key)

---

## 🚀 Instalação do Projeto

### 1. Clone o projeto

```bash
git clone https://github.com/seu-usuario/task-api.git
cd task-api
```

### 2. Instale as dependências

```bash
composer install
```

### 3. Copie o arquivo .env e configure

```bash
cp .env.example .env

```

### Preencha as informações de banco de dados e adicione sua chave da The Cat API:

```bash
DB_DATABASE=task-api
DB_USERNAME=root
DB_PASSWORD=

CAT_API_KEY=live_sua_api_key_aqui


```

## ⚙️ Rodar as Migrations

```bash
php artisan migrate

```

## 🔧 Endpoints da API

### 🗂 Tarefas

| Método | Endpoint                  | Descrição                                  |
| ------ | ------------------------- | ------------------------------------------ |
| GET    | /api/tasks                | Lista todas as tarefas                     |
| POST   | /api/tasks                | Cria uma nova tarefa                       |
| GET    | /api/tasks/{id}           | Mostra uma tarefa específica               |
| PUT    | /api/tasks/{id}           | Atualiza uma tarefa                        |
| DELETE | /api/tasks/{id}           | Deleta uma tarefa                          |
| GET    | /api/tasks?status=pending | Filtra por status (`pending`, `done`, etc) |


### 🐱 Cat API

| Método | Endpoint         | Descrição                                           |
| ------ | ---------------- | --------------------------------------------------- |
| GET    | /api/cats/random | Retorna imagem aleatória de gato usando The Cat API |

Resposta esperada:
```bash
{
  "image": "https://cdn2.thecatapi.com/images/abc123.jpg",
  "source": "The Cat API"
}


```

### 🧪 Testando com Postman ou curl
### Criar uma Tarefa
```bash
curl -X POST http://localhost:8000/api/tasks \
-H "Content-Type: application/json" \
-d '{"title": "Estudar Laravel", "status": "pending"}'

```

### Buscar um gato aleatório

```bash
curl http://localhost:8000/api/cats/random

```

### 🧩 Swagger - Documentação OpenAPI

Instale a dependência do Swagger (opcional):
```bash
composer require darkaonline/l5-swagger
php artisan vendor:publish --provider "L5Swagger\L5SwaggerServiceProvider"


```

Gere a documentação:
```bash
php artisan l5-swagger:generate

```

Acesse via navegador:
```bash
http://localhost:8000/api/documentation

```
### 📁 Organização de Código

MVC: Controllers, Models, Migrations separados.

Boas práticas de nomeação em inglês.

Uso de validação de Request.

Tratamento de erros com try/catch e resposta padronizada.


### 🔐 Armazenamento seguro da Cat API Key

A chave é armazenada no .env:
```bash
CAT_API_KEY=live_xxx
```
Usada no config/services.php:
```bash
'catapi' => [
    'key' => env('CAT_API_KEY'),
    'url' => 'https://api.thecatapi.com/v1/images/search',
],
```
### 💬 Commits sugeridos

```bash
git init
git add .
git commit -m "Initial commit: task API with cat integration"

```