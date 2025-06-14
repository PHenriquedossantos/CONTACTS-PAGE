<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactsSeeder extends Seeder
{
    public function run(): void
    {
        // Cria 100 contatos todos com user_id = 1
        Contact::factory()
            ->count(100)
            ->create(['user_id' => 1]);

        $this->command->info('100 contatos criados com user_id = 1');
    }
}
