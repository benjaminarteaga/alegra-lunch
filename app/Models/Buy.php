<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Buy extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ingredient_id',
        'quantity',
    ];

    /*
     * Appends attributes to JSON
     */
    protected $appends = ['date'];

    /**
     * Get the ingredient that owns the buy.
     */
    public function ingredient()
    {
        return $this->belongsTo(Ingredient::class);
    }

    /*
     * Get formated date attribute.
     */
    public function getDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }
}
