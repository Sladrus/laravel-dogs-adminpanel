<?php

namespace App\Http\Controllers;

use App\Http\Resources\RecipeResource;
use App\Models\Recipe;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Http\Request;

class RecipeHttpController extends Controller
{
    public function index() {

        $recipes = Recipe::with(['categories']);


        return RecipeResource::collection($recipes->paginate(50))->response();
    }
}
