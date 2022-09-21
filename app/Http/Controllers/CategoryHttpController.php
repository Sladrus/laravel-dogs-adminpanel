<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryHttpController extends Controller
{
    public function index() {

        $categories = Category::with(['recipes', 'recipes.ingredients', 'recipes.ingredients.ingredientType']);

        return CategoryResource::collection($categories->paginate(50))->response();
    }
}
