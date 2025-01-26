<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            "Comida" => '#f44339',
            "Bebida" => '#f44333',
            "Vegetales" => '#f44331',
            "Verduras" => '#f44334',
        ];

        foreach ($categories as $nombre => $color) {
            Category::create(compact('nombre', 'color'));
        }

    }
}
