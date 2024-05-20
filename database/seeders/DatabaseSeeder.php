<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\CupCake;
use App\Models\Order;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // CupCake::factory(10)->create();
        Order::factory(10)->create();
    }
}


// <!-- commande pour lancer la création des data via les factory: php artisan db:seed
//  -->
