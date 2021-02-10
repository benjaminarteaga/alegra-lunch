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
        ->sync($this->randomIngredients(Ingredient::all()->modelKeys()));

        Recipe::create([
            'name' => 'Veggie salad'
        ])
        ->ingredients()
        ->sync($this->randomIngredients([1, 2, 3, 6, 7]));

        Recipe::create([
            'name' => 'Chicken with french fries'
        ])
        ->ingredients()
        ->sync($this->randomIngredients([3, 5, 10]));

        Recipe::create([
            'name' => 'Beef with rice'
        ])
        ->ingredients()
        ->sync($this->randomIngredients([4, 7, 9]));

        Recipe::create([
            'name' => 'Gourmet taste'
        ])
        ->ingredients()
        ->sync($this->randomIngredients(Ingredient::all()->modelKeys()));

        Recipe::create([
            'name' => 'Meat with vegetables'
        ])
        ->ingredients()
        ->sync($this->randomIngredients([1, 2, 3, 6, 7, 9]));
    }

    /**
     * Combine ingredients and quantity.
     *
     * @return array
     */
    private function randomIngredients($array)
    {
        $newArray = [];

        foreach($array as $index => $item) {
            array_push($newArray, ['quantity' => rand(1,3)]);
        }

        $combined = array_combine($array, $newArray);

        return $combined;
    }
}
