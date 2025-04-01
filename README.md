# Symphonia Account Management Platform

Este projeto é um website desenvolvido para o gerenciamento de contas e criação de novas contas, com um sistema de notícias e um painel administrativo utilizando o framework **Filament** para o gerenciamento geral da plataforma. O projeto foi criado para atender às necessidades do **Servidor Privado de Dofus 1.29 Symphonia**.

## Funcionalidades

### Usuários
- Criação de contas de usuário.
- Gerenciamento de contas existentes.
- Recuperação de senha.

### Sistema de Notícias
- Publicação de notícias relacionadas ao servidor.
- Exibição de notícias em uma interface amigável.

### Painel Administrativo
- Gerenciamento de usuários.
- Controle de permissões e acessos.
- Publicação e edição de notícias.
- Configurações gerais da plataforma.

## Tecnologias Utilizadas

- **PHP**: Linguagem principal para o backend.
- **Filament**: Framework utilizado para o painel administrativo.
- **HTML/CSS/JavaScript**: Para o desenvolvimento do frontend.
- **MySQL**: Banco de dados para armazenamento de informações.
- **Laravel**: Framework PHP para estruturação do backend.

## Estrutura do Projeto

- `/public`: Arquivos públicos, como imagens, CSS e JavaScript.
- `/resources`: Arquivos de views e templates.
- `/routes`: Arquivos de rotas do Laravel.
- `/app`: Código principal do backend, incluindo controladores e modelos.
- `/database`: Arquivos de migração e seeds para o banco de dados.

## Como Executar o Projeto

1. Clone o repositório:
    ```bash
    git clone https://github.com/Bljexe/symp-website.git
    ```

2. Instale as dependências:
    ```bash
    composer install
    npm install
    ```

3. Configure o arquivo `.env` com as informações do banco de dados.

4. Execute as migrações:
    ```bash
    php artisan migrate
    ```
5. Execute os Seeders:
    ```bash
    php artisan db:seed
    ```
6. Inicie o servidor de desenvolvimento:
    ```bash
    php artisan serve
    ```

7. Acesse o projeto no navegador:
    ```
    http://localhost:8000
    ```

## Contribuição

Contribuições são bem-vindas! Sinta-se à vontade para abrir issues ou enviar pull requests.

---

Desenvolvido com ❤️ para o servidor privado de Dofus 1.29 **Symphonia**.
