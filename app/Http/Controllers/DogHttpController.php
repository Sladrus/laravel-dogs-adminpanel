<?php

namespace App\Http\Controllers;

use App\Http\Resources\DogResource;
use App\Models\Dog;
use Illuminate\Http\Request;

class DogHttpController extends Controller
{
    public function index()
    {
        $dogs = Dog::with(['dogTypes']);


        return DogResource::collection($dogs->get())->response();
    }
}
