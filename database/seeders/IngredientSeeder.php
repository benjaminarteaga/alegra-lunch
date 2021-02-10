<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ingredient;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ingredient::insert([
            [
                'name' => 'Tomato',
                'emoji' => '&#127813;',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Lemon',
                'emoji' => '&#127819;',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Potato',
                'emoji' => '&#x1F954;',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Rice',
                'emoji' => '&#127834;',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ketchup',
                'emoji' => '&#x1F96B;',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Lettuce',
                'emoji' => '&#x1F96C;',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Onion',
                'emoji' => '&#x1F9C5;',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cheese',
                'emoji' => '&#129472;',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Meat',
                'emoji' => '&#x1F969;',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Chicken',
                'emoji' => '&#127831;',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
