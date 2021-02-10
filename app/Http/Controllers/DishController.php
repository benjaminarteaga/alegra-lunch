<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Recipe;
use Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use App\Models\Buy;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Dishes/Index', [
            'dishes' => Dish::with('recipe')->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $dish = collect([]);

        for($i = 1; $i <= $request->quantity; $i++) {
            $recipe = Recipe::all()->random();
            $ingredients = $recipe->ingredients()->get();

            foreach($ingredients as $item) {

                // If no stock, go to market
                if($item->stock == 0) {
                    do {
                        $response = Http::get('https://recruitment.alegra.com/api/farmers-market/buy', [
                            'ingredient' => Str::lower($item->name),
                        ]);

                        $buyed = $response->json()['quantitySold'];

                        Buy::create([
                            'ingredient_id' => $item->id,
                            'quantity' => $buyed,
                        ]);
                    } while($buyed == 0);

                    $item->stock = $buyed;
                    $item->save();
                }

                $item->stock--;
                $item->save();
            }

            $create = Dish::create($request->all() + [
                'recipe_id' => $recipe->id,
                'user_id' => Auth::id(),
            ]);

            $dish->push($create);
        }

        return redirect()->route('pedidos.index')->with([
            'status' => 'Pedido recibido.',
        ] + compact('dish'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        //
    }
}
