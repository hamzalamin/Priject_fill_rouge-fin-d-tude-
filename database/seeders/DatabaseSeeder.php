<?php

namespace Database\Seeders;


use App\Models\book;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\category;
use App\Models\copy;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'Admin@gmail.com',
            'password' => 'password',
            'roles' => 'Admin',

        ]);

        User::factory()->create([
            'name' => 'Operatuer',
            'email' => 'Operatuer@gmail.com',
            'password' => 'password',
            'roles' => 'Operatuer',

        ]);

        User::factory()->create([
            'name' => 'Client',
            'email' => 'Client@gmail.com',
            'password' => 'password',
            'roles' => 'Client',

        ]);
        User::factory()->create([
            'name' => 'Hamza',
            'email' => 'hamzalamin80@gmail.com',
            'password' => 'password',
            'roles' => 'Client',

        ]);
        category::factory()->count(20)->create();

        book::factory()->count(10)->create();
        copy::factory()->count(10)->create();


    }
    
}
