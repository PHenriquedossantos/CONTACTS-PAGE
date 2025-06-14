## 🚀 Setup do Projeto

Siga estes passos para rodar o projeto a partir de um clone zero:

```bash
# 1. Clone o repositório
git clone <URL_DO_REPOSITORIO>
cd <PASTA_DO_PROJETO>

# 2. Instale dependências Composer
composer install
composer update
composer dump-autoload

# 3. Crie as tabelas e popule dados iniciais
php artisan migrate
php artisan db:seed

# 4. (Opcional) Rode o servidor local
php artisan serve
