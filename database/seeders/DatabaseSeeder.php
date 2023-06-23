<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $account = Account::create(['name' => 'Lorem Corporation']);

        User::factory()->create([
            'account_id' => $account->id,
            'first_name' => 'root',
            'last_name' => 'root',
            'email' => 'root@root.ru',
            'password' => 'root@root.ru',
            'owner' => true,
        ]);

        User::factory()->create([
            'account_id' => $account->id,
            'first_name' => 'Admin',
            'last_name' => 'App',
            'email' => 'admin@app.ru',
            'password' => 'admin@app.ru',
            'owner' => true,
        ]);

        User::factory(5)->create(['account_id' => $account->id]);

    }
}
