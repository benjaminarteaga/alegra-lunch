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
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Lemon',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Potato',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Rice',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ketchup',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Lettuce',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Onion',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cheese',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Meat',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Chicken',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
