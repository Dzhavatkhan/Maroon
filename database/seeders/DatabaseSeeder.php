<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Ali',
        //     'login' => 'ali111',
        //     'avatar' => 'gfkjghsdfkjghdkjsfhg',
        //     'password' => bcrypt('12345678'),
        // ]);
            \App\Models\Admin::factory()->create([
            'admin_name' => 'Kirill',
            'login' => 'kirilka',
            'password' => bcrypt('11122004'),
        ]);
        \App\Models\Admin::factory()->create([
            'admin_name' => 'Olya',
            'login' => 'mega_brain',
            'password' => bcrypt('11122004'),
        ]);
    }
}
