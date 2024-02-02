<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;


use App\Models\Categoria;
use App\Models\Transaccion;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Elian Cañas',
            'email' => 'eliansa123@gmail.com',
            'password' => bcrypt('password')
        ]);

        User::create([
            'name' => 'Luz Neida',
            'email' => 'luz@gmail.com',
            'password' => bcrypt('password')
        ]);
        Categoria::factory(1000)->create();
        Transaccion::factory(1000)->create();
    }
}
