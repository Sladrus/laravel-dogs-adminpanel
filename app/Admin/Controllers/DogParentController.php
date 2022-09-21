<?php

namespace App\Admin\Controllers;

use App\Models\DogParent;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class DogParentController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'DogParent';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new DogParent());

        $grid->column('id', __('ID'));
        $grid->column('icon', __('Изображение'))->image('', 100, 100);
        $grid->column('title', __('Имя'));

        // $grid->column('name', __('Имя'))->expand(function ($model) {

        //     $ingredients = $model->ingredients()->get()->map(function ($ingredient) {
        //         $id = DogType::find($ingredient->only('dog_type_id'))->first()->title;
        //         return [$id, $ingredient->amount,];
        //     });
            
        //     return new Table(['Ingredient', 'Кол-во',], $ingredients->toArray());
        // });

        $grid->column('desc', __('Описание'));
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
        $show = new Show(DogParent::findOrFail($id));



        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new DogParent());

        $form->text('title', __('Title'));
        $form->text('desc', __('Desc'));
        $form->image('icon', __('Icon'));

        return $form;
    }
}
