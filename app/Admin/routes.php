<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {
    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('recipes', RecipeController::class);
    $router->resource('ingredients', IngredientController::class);
    $router->resource('ingredient-types', IngredientTypeController::class);
    $router->resource('categories', CategoryController::class);
    $router->resource('dogs', DogController::class);
    $router->resource('dog-types', DogTypeController::class);
    $router->resource('dog-parents', DogParentController::class);
    
});
