<?php

namespace App\Admin\Controllers;

use App\Http\Resources\RecipeResource;
use App\Models\Category;
use App\Models\Ingredient;
use App\Models\IngredientType;
use App\Models\Recipe;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Widgets\Table;

class RecipeController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Recipe';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Recipe());

        $grid->column('id', __('ID'));
        $grid->column('thumbnail', __('Изображение'))->image('', 100, 100);

        $grid->column('title', __('Название'))->expand(function ($model) {

            $ingredients = $model->ingredients()->get()->map(function ($ingredient) {
                $id = IngredientType::find($ingredient->only('ingredient_id'))->first()->title;
                return [$id, $ingredient->amount,];
            });
            
            return new Table(['Ingredient', 'Кол-во',], $ingredients->toArray());
        });

        $grid->column('categories.title', __('Категория'))->label();
        $grid->column('description', __('Описание'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Recipe::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('type_id', __('Type id'));
        $show->field('description', __('Description'));
        $show->field('thumbnail', __('Thumbnail'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Recipe());

        $form->text('title', __('Title'))->required();
        $form->textarea('description', __('Description'))->required();
        $form->image('thumbnail', __('Image'))->required();

        $form->text('grams');
        $form->text('kcal');
        $form->text('fats');
        $form->text('carbs');
        $form->text('time');
        $form->select('difficult', __("Difficult"))->options(['Easy' => 'Easy', 'Medium' => 'Medium', 'Hard' => 'Hard']);


        $form->select('type_id', __("Category"))->options(Category::all()->pluck('title', 'id'))->required();
        
        $form->hasMany('ingredients', function (Form\NestedForm $form) {
            $form->select('ingredient_id', __("Ingredient type"))->options(IngredientType::all()->pluck('title', 'id'))->required();
            $form->text('amount', __('Amount'))->required();
            
        })->required();


        return $form;
    }
}
