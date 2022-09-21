<?php

namespace App\Http\Controllers;

use App\Http\Resources\DogTypeResource;
use App\Models\DogType;
use Illuminate\Http\Request;

class DogTypeHttpController extends Controller
{
    public function index() {

        $types = DogType::with(['dogs', 'dogs.parents']);

        return DogTypeResource::collection($types->get())->response();
    }
}
