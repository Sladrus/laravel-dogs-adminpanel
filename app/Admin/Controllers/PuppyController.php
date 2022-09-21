<?php

namespace App\Admin\Controllers;

use App\Models\Puppy;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PuppyController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Puppy';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Puppy());

        $grid->column('id', __('Id'));
        $grid->column('icon',__('Icon'))->image('', 100, 100);
        $grid->column('type', __('Type'));
        $grid->column('price', __('Price'));
        $grid->column('amount', __('Amount'));

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
        $show = new Show(Puppy::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('type', __('Type'));
        $show->field('price', __('Price'));
        $show->field('amount', __('Amount'));
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
        $form = new Form(new Puppy());

        $form->text('type', __('Type'));
        $form->image('icon',__('Icon'));
        $form->text('price', __('Price'));
        $form->text('amount', __('Amount'));

        return $form;
    }
}
