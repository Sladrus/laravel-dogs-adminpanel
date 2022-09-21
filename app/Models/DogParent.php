<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DogParent extends Model
{
    use HasFactory;

    public function dogs()
    {
        return $this->belongsToMany(Dog::class);
    }
}
