<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Buy;

class BuySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Buy::factory()->count(5)->create();
    }
}
