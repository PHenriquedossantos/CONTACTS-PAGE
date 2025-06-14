# 1. Clone o repositório
git clone <URL_DO_REPOSITORIO>
cd <PASTA_DO_PROJETO>

# 2. Instale dependências PHP
composer install

# 3. Configure o .env
cp .env.example .env
# Edite DB_DATABASE, DB_USERNAME, DB_PASSWORD

# 4. Gere a chave da aplicação
php artisan key:generate

# Limpa todas as tabelas, reexecuta migrations e roda seeders
php artisan migrate:fresh --seed

migrate:fresh: apaga todas as tabelas e reaplica migrations.

--seed: executa seeders configurados.

Alternativa: php artisan migrate:refresh --seed
