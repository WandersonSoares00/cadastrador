# Cadastrador

Sistema Single Page Applications(SPA) cadastrador de usuários que permite listar, criar, editar e deletar usuários de um banco de dados.

## Como Rodar a Aplicação

### Pré-requisitos

- [Docker](https://docs.docker.com/engine/install/)

### 1. Configurar as Variáveis de Ambiente

```bash
mv .env.sample .env
```

Adicione as credenciais do Mysql no arquivo .env

### 2. Iniciar os Containers

```bash
sudo docker compose up -d --build
```

### 3. Acessar a Aplicação

Abra o navegador em http://localhost:8000

## Como parar a Aplicação

```bash
sudo docker compose down
```