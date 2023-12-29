
# Livraria

Este projeto é uma aplicação web para gerenciamento de uma livraria. Ela permite operações CRUD em livros, autores e assuntos. O projeto foi desenvolvido com Laravel e utiliza Docker para facilitar a configuração do ambiente de desenvolvimento.

## Requisitos

- Docker
- Docker Compose

## Configuração e Execução

### Clonando o Repositório

Primeiro, clone o repositório do projeto:

```bash
git clone https://github.com/leoguepe/Livraria.git
cd Livraria
```

### Iniciando o Ambiente de Desenvolvimento

Para iniciar o ambiente de desenvolvimento com Docker, use o Laravel Sail, que já está configurado no projeto:

1. Copie o arquivo `.env.example` para criar um `.env`:

   ```bash
   cp .env.example .env
   ```

2. Inicie os containers do Docker:

   ```bash
   ./vendor/bin/sail up
   ```

   Você pode usar a flag `-d` para rodar em segundo plano.

### Configurando a Aplicação

Com os containers em execução, agora você pode configurar a aplicação:

1. Instale as dependências do PHP:

   ```bash
   ./vendor/bin/sail composer install
   ```

2. Gere a chave da aplicação:

   ```bash
   ./vendor/bin/sail artisan key:generate
   ```

3. Execute as migrações do banco de dados:

   ```bash
   ./vendor/bin/sail artisan migrate
   ```

### Acessando a Aplicação

A aplicação estará disponível em `http://localhost:8001`.

### Parando o Ambiente de Desenvolvimento

Para parar os containers do Docker:

```bash
./vendor/bin/sail down
```


