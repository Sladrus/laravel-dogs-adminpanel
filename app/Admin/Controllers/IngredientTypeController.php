<?php

namespace App\Admin\Controllers;

use App\Models\IngredientType;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class IngredientTypeController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'IngredientType';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new IngredientType());

        $grid->column('id', __('Id'));
        $grid->column('icon', __('Icon'))->image('', 35, 35);
        $grid->column('title', __('Title'));
        $grid->column('ingredients.title');

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
        $show = new Show(IngredientType::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('icon', __('Icon'));
        $show->field('ingredient_id', __('Ingredient id'));
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
        $form = new Form(new IngredientType());
        $form->text('title', __('Title'))->required();
        $form->image('icon', __('Icon'))->required();
        
        return $form;
    }
}
