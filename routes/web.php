<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\DishController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\BuyController;
use App\Models\Dish;
use App\Models\Ingredient;
use App\Models\Buy;
use App\Models\Recipe;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard', [
        'dishes' => Dish::with('recipe')->latest()->get(),
        'ingredients' => Ingredient::all(),
        'buys' => Buy::with('ingredient')->latest()->get(),
        'recipes' => Recipe::with('ingredients')->get(),
    ]);
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])
    ->resource('/pedidos', DishController::class);

Route::middleware(['auth:sanctum', 'verified'])
    ->resource('/recetas', RecipeController::class);

Route::middleware(['auth:sanctum', 'verified'])
    ->resource('/ingredientes', IngredientController::class);

Route::middleware(['auth:sanctum', 'verified'])
    ->resource('/compras', BuyController::class);