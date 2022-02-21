# Tarefas
Este repositorio contem o backend para um cliente de gerenciamento de tarefas

## Instalação
Clonar o repositorio

    git clone git@github.com:marinoricardo/tasks.git

Entrar para pasta repositorio

    cd tarefas

Instale todas as dependências usando composer

    composer install

Copiar .env.example para .env e fazer alterações de configuração necessárias no arquivo .env

    cp .env.example .env

Gerar uma nova chave para a aplicação

    php artisan key:generate

Executar migrações de banco de dados (**Defina a conexão de banco de dados em .env antes de migrar**)

    php artisan migrate

Inicie o servidor de desenvolvimento local

    php artisan serve

Agora você pode acessar o servidor em http://localhost:8000

**TL;DR lista de comandos DR**

    git clone git@github.com:marinoricardo/tasks.git
    cd tarefas
    composer install
    cp .env.example .env
    php artisan key:generate
    php artisan jwt:generate 
   
A API pode ser acessada em [http://localhost:8000/api](http://localhost:8000/api).

# Testar a API

Para executar os testes da aplicação

    php vendor\phpunit\phpunit\phpunit

