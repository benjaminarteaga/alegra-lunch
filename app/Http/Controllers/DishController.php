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
use Log;

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
                \Log::debug($item);
                if($item->pivot->quantity > $item->stock) {
                    \Log::debug('pivot quantity | item stock');
                    \Log::debug($item->pivot->quantity . ' | ' . $item->stock);
                    
                    do {
                        $response = Http::get('https://recruitment.alegra.com/api/farmers-market/buy', [
                            'ingredient' => Str::lower($item->name),
                        ]);

                        $buyed = $response->json()['quantitySold'];

                        Buy::create([
                            'ingredient_id' => $item->id,
                            'quantity' => $buyed,
                        ]);
                        \Log::debug('buyed');
                        \Log::debug($buyed);
                        \Log::debug('pre sum');
                        \Log::debug($item->stock);
                        $item->stock = $item->stock + $buyed;
                        \Log::debug('post sum');
                        \Log::debug($item->stock);
                        \Log::debug($item->pivot->quantity);

                        \Log::debug($item->pivot->quantity > $item->stock);

                        
                    } while($buyed == 0 || $item->pivot->quantity > $item->stock);

                    $item->save();
                }
                \Log::debug('pre sub');
                \Log::debug($item->stock);

                $item->stock = $item->stock - $item->pivot->quantity;
                $item->save();

                \Log::debug('post sub');
                \Log::debug($item->stock);
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
