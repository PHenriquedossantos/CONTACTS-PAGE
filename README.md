# Contact Management Application

🎯 **Descrição**

funcionalidades:

1. **Listagem de Contatos** – acessível a qualquer usuário
2. **Criação de novos contatos** – disponível apenas para usuários autenticados
3. **Exibição de detalhes** – cada contato possui uma página própria e  restrita a usuários autenticados
4. **Edição de contatos** – restrita a usuários autenticados e cada contato possui uma página própria
5. **Exclusão de contatos (soft delete)** – também limitada a usuários autenticados

📌 **Campos do modelo `Contact`**:
- `id`
- `name` (mínimo de 6 caracteres)
- `contact` (9 dígitos, único)
- `email` (formato válido, único)


## 🚀 Instalação e Configuração

Copie e cole todo este bloco no terminal para rodar de uma vez:

```bash
# 1. Clonar o repositório
git clone <URL_DO_REPOSITORIO>
cd <PASTA_DO_PROJETO>

# 2. Instalar dependências PHP (Composer)
composer install
composer update
composer dump-autoload

# 4. Executar migrations e seeders
php artisan migrate --seed


```
✔️ Os comandos acima garantem que todas as migrations, seeders e dependências estejam atualizados.

🔐 Autenticação

O acesso às rotas de criação, edição e exclusão requerem autenticação.

Credenciais padrão geradas pelo seeder de user:

Email: admin@gmail.com

Senha: secret123

📑 Rotas Principais

```bash
// Autenticação
Route::get('login',  [AuthController::class, 'showLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout',[AuthController::class, 'logout'])->name('logout');

// Contatos
Route::get('/', [ContactController::class, 'index'])->name('contacts.index');

Route::middleware('auth')->group(function () {
    Route::get('contacts/create', [ContactController::class, 'create'])->name('contacts.create');
    Route::post('contacts',       [ContactController::class, 'store'])->name('contacts.store');
    Route::get('contacts/{id}',   [ContactController::class, 'show'])->name('contacts.show');
    Route::get('contacts/{id}/edit',[ContactController::class,'edit'])->name('contacts.edit');
    Route::put('contacts/{id}',    [ContactController::class,'update'])->name('contacts.update');
    Route::delete('contacts/{id}', [ContactController::class,'destroy'])->name('contacts.destroy');
});
```

🌱 Seeders

UserSeeder: cria usuário administrador (admin@gmail.com / secret123).

ContactsSeeder: gera 100 contatos associados ao usuário de ID 1.

🛠️ Arquitetura e Boas Práticas

Controller ➡️ Service: Lógica de negócio extraída para classes de Service para manter controllers enxutos.

Form Requests: Arquivos de Request criados para validação em store e update.

Migrations: INSERT da table contacts foi feito via migrations.

Padrão de Código Consistente: Convenções de nomenclatura e estilo aplicadas uniformemente em todo o projeto.



