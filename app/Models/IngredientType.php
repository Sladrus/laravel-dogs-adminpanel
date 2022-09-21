<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Ingredient;

class IngredientType extends Model
{
    use HasFactory;

    public function ingredients()
    {
        return $this->hasOne(Ingredient::class, 'ingredient_id');
    }

    static function findById($id)
    {
        $name = IngredientType::where(["id" => $id])->pluck('title', 'id');
        return $name;
    }
}
