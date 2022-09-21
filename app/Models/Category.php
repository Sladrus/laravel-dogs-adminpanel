<?php

namespace App\Models;

use Encore\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    //use ModelTree;


    protected $fillable = [
        'title',
    ];

    public function recipes()
    {
        return $this->hasMany(Recipe::class,'type_id');
    }
    
}
