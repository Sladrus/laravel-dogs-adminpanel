<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\RecipeResource;
use App\Http\Resources\RecipeTypeResource;

use App\Models\Recipe;
use App\Models\RecipeType;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);
 
Route::get('/recipe/{id}', function ($id) {
    return new RecipeResource(Recipe::findOrFail($id));
});

Route::get('/recipes', [\App\Http\Controllers\RecipeHttpController::class, 'index']);
Route::get('/categories', [\App\Http\Controllers\CategoryHttpController::class, 'index']);

Route::get('/dogs', [\App\Http\Controllers\DogHttpController::class, 'index']);
Route::get('/dog-types', [\App\Http\Controllers\DogTypeHttpController::class, 'index']);


// Route::get('/type/{title}', function ($title) {
//     return new RecipeTypeResource(RecipeType::findOrFail($title));
// });

// Route::get('/types', function () {
//     return RecipeTypeResource::collection(RecipeType::all());
// });
