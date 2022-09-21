<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
    ];

    public function categories()
    {
        return $this->belongsTo(Category::class,'type_id');
    }

    public function ingredients()
    {
        return $this->hasMany(Ingredient::class,'recipe_id');
    }

}
