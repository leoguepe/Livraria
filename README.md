
# Projeto Livraria

Este projeto consiste em um sistema de gerenciamento de livraria, incluindo cadastro de livros, autores e assuntos.

## Instruções de Configuração e Execução

### Pré-requisitos

- Docker
- Docker Compose
- MySQL

### Configuração

1. Clone o repositório do projeto:
   ```bash
   git clone https://github.com/leoguepe/Livraria
   ```
2. Entre no diretório do projeto:
   ```bash
   cd Livraria
   ```
3. Crie um arquivo `.env` a partir do arquivo `.env.sample` fornecido no repositório:
   ```bash
   cp .env.sample .env
   ```

### Execução com Docker

1. Construa os containers utilizando Docker Compose:
   ```bash
   docker-compose build
   ```
2. Inicie os containers:
   ```bash
   ./vendor/bin/sail up
   ```
3. Para desligar os containers, utilize:
   ```bash
   ./vendor/bin/sail down
   ```

### Base de Dados

- O script SQL para criação da base de dados e inserção de alguns dados iniciais está localizado na raiz do projeto com o nome `livraria.sql`.


## Mais Informações

- O arquivo `.env.sample` já contém as configurações necessárias para a conexão com o banco de dados no ambiente Docker.
