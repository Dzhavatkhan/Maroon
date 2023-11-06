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

        //skins
        \App\Models\Type_skin::create([
            "name"=> "Жирная",
        ]);
        \App\Models\Type_skin::create([
            "name"=> "Комбинированная",
        ]);
        \App\Models\Type_skin::create([
            "name"=> "Сухая"
        ]);

        //category
        \App\Models\Category::create([
            "name"=> "Уход для лица"
        ]);
        \App\Models\Category::create([
            "name"=> "Уход для тела"
        ]);


        \App\Models\Type_category::create([
            "name"=> "Крема",
            "categories_id" => 1
            ]);
        \App\Models\Type_category::create([
            "name"=> "Крема",
            "categories_id" => 2
            ]);
        \App\Models\Type_category::create([
            "name"=> "Сыворотки",
            "categories_id" => 1
            ]);
        \App\Models\Type_category::create([
            "name"=> "Маски",
            "categories_id" => 1
            ]);
        \App\Models\Type_category::create([
            "name"=> "Пенки",
            "categories_id" => 1
            ]);
        \App\Models\Type_category::create([
            "name"=> "Тоники",
            "categories_id" => 1
            ]); 
        \App\Models\Type_category::create([
            "name"=> "Пудры",
            "categories_id" => 1
            ]); 
        \App\Models\Type_category::create([
            "name"=> "Масла",
            "categories_id" => 2
            ]);  
        \App\Models\Type_category::create([
            "name"=> "Скрабы",
            "categories_id" => 2
            ]);              
        \App\Models\Type_category::create([
            "name"=> "Мыло",
            "categories_id" => 2
            ]);
        \App\Models\Type_category::create([
            "name"=> "Бомбочки для ванны",
            "categories_id" => 2
            ]);              
        \App\Models\Type_category::create([
            "name"=> "Соль для ванны",
            "categories_id" => 2
            ]);              
                            


        //admin
            \App\Models\Admin::factory()->create([
            'admin_name' => 'Kirill',
            'login' => 'kirillka',
            'status' =>'jun',
            'password' => bcrypt('11122004'),
        ]);
        \App\Models\Admin::factory()->create([
            'admin_name' => 'Olya',
            'login' => 'mega_brain',
            'status' =>'sen',
            'password' => bcrypt('11122004'),
        ]);
    }
}
