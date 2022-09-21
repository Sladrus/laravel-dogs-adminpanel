<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DogType extends Model
{
    use HasFactory;

    public function dogs()
    {
        return $this->hasMany(Dog::class,'dog_type_id');
    }
}
