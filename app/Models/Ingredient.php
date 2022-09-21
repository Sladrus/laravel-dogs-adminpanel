<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\IngredientType;

class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount', 'ingredient_id',
    ];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class,'recipe_id');
    }

    public function ingredientType()
    {
        return $this->belongsTo(IngredientType::class, 'ingredient_id');
    }
    public function ingredientTitle()
    {
        return $this->ingredientType()->title;
    }

}
