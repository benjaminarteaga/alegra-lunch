<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Recipe;
use App\Models\Ingredient;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Recipe::create([
            'name' => 'Grill with rice & salad'
        ])
        ->ingredients()
        ->sync(Ingredient::all()->modelKeys());

        Recipe::create([
            'name' => 'Veggie salad'
        ])
        ->ingredients()
        ->sync([1, 2, 3, 6, 7]);

        Recipe::create([
            'name' => 'Chicken with french fries'
        ])
        ->ingredients()
        ->sync([3, 5, 10]);

        Recipe::create([
            'name' => 'Beef with rice'
        ])
        ->ingredients()
        ->sync([4, 7, 9]);

        Recipe::create([
            'name' => 'Gourmet taste'
        ])
        ->ingredients()
        ->sync(Ingredient::all()->modelKeys());

        Recipe::create([
            'name' => 'Meat with vegetables'
        ])
        ->ingredients()
        ->sync([1, 2, 3, 6, 7, 9]);
    }
}
