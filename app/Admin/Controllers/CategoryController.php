<?php

namespace App\Admin\Controllers;

use App\Models\Category;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Widgets\Table;

class CategoryController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Category';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Category());

        $grid->column('id', __('Id'));
        $grid->column('icon', __('Icon'))->image('', 35, 35);
        $grid->column('title', __('Title'))->expand(function ($model) {

            $recipes = $model->recipes()->get()->map(function ($type) {
                
                return $type->only(['id', 'title']);
            });
        
            return new Table(['ID', 'Recipe',], $recipes->toArray());
        });
        
        // $grid->column('recipes', 'Recipes')->display(function ($recipes) {
        //     $recipes = array_map(function ($recipes) {
        //         return "<span class='label label-success'>{$recipes['title']}</span>";
        //     }, $recipes);

        //     return join('&nbsp;', $recipes);
        // });
        
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
        $show = new Show(Category::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('icon', __('Icon'));
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
        $form = new Form(new Category());

        $form->text('title', __('Title'));
        $form->image('icon', __('Icon'));

        return $form;
    }
}
