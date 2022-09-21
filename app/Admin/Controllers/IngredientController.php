<?php

namespace App\Admin\Controllers;

use App\Models\Ingredient;
use App\Models\IngredientType;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class IngredientController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Ingredient';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Ingredient());

        $grid->column('id', __('Id'));
        $grid->column('ingredientType.title', __('title'));
        $grid->column('amount', __('Amount'));
        $grid->column('recipe_id', __('Recipe id'));

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
        $show = new Show(Ingredient::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('amount', __('Amount'));
        $show->field('icon', __('Icon'));
        $show->field('recipe_id', __('Recipe id'));
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
        $form = new Form(new Ingredient());

        $form->text('amount', __('Amount'));
        // $form->hasOne('ingredientType', function (Form\NestedForm $form) {
        //     //$form->select('ingredientType', __("Ingredient type"))->options(IngredientType::all()->pluck('title', 'id'))->required();
            
        //     //$form->text('amount', __('Amount'))->required();
        // })->required();
        $form->select('ingredient_id', __("Ingredient type"))->options(IngredientType::all()->pluck('title', 'id'))->required();

        return $form;
    }
}
