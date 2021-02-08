<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ingredient extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'stock',
    ];

    /**
     * The recipes that belong to the recipe.
     */
    public function recipes()
    {
        return $this->belongsToMany(Recipe::class);
    }

    /**
     * Get the buys for the ingredient.
     */
    public function buys()
    {
        return $this->hasMany(Buy::class)->withTimestamps();
    }
}
