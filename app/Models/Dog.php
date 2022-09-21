<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dog extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function dogTypes()
    {
        return $this->belongsTo(DogType::class,'dog_type_id');
    }

    public function parents()
    {
        return $this->belongsToMany(DogParent::class);
    }
}
