<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dish extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'recipe_id',
        'user_id',
    ];

    /*
     * Appends attributes to JSON
     */
    protected $appends = ['finish_date'];

    /**
     * Get the user that owns the dish.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the recipe that owns the dish.
     */
    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }

    /*
     * Get formated date attribute.
     */
    public function getFinishDateAttribute()
    {
        return $this->created_at->addMinutes(3)->toDateTimeString();
    }
}
