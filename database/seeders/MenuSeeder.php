<?php

namespace Database\Seeders;

use App\Models\menu;
use Database\Factories\MenuFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menu::factory(5)->create();
        
    }
}
