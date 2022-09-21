<?php

namespace App\Admin\Controllers;

use App\Models\DogType;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Widgets\Table;

class DogTypeController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'DogType';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new DogType());

        $grid->column('id', __('Id'));
        $grid->column('title', __('Title'))->expand(function ($model) {

            $dogs = $model->dogs()->get()->map(function ($type) {
                
                return $type->only(['id', 'name']);
            });
        
            return new Table(['ID', 'Title',], $dogs->toArray());
        });

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
        $show = new Show(DogType::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('desc', __('Desc'));
        $show->field('icon', __('Icon'));
        $show->field('dog_id', __('Dog id'));
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
        $form = new Form(new DogType());

        $form->text('title', __('Title'));


        return $form;
    }
}
