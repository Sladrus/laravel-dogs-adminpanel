<?php

namespace App\Admin\Controllers;

use App\Models\Dog;
use App\Models\DogParent;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Widgets\Table;

use App\Models\DogType;


class DogController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Dog';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Dog());

        $grid->column('id', __('ID'));
        $grid->column('icon', __('Изображение'))->image('', 100, 100);
        $grid->column('name', __('Имя'));


        $grid->column('dogTypes.title', __('Тип'))->label();
        $grid->parents()->display(function ($parents) {

            $parents = array_map(function ($parent) {
                return "<span class='label label-success'>{$parent['title']}</span>";
            }, $parents);
        
            return join('&nbsp;', $parents);
        });
        $grid->column('age', __('Возраст'));
        $grid->column('gender', __('Пол'));

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
        $show = new Show(Dog::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('dog_type_id', __('Dog type id'));
        $show->field('icon', __('Icon'));
        $show->field('price', __('Price'));
        $show->field('desc', __('Desc'));
        $show->field('age', __('Age'));
        $show->field('gender', __('Gender'));
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
        $form = new Form(new Dog());

        $form->text('name', __('Title'))->required();
        $form->textarea('desc', __('Description'))->required();
        $form->image('icon', __('Image'))->required();

        $form->text('age');
        $form->text('gender');


        $form->select('dog_type_id', __("Category"))->options(DogType::all()->pluck('title', 'id'))->required();
        
        
            //$form->select('ingredient_id', __("Ingredient type"))->options(IngredientType::all()->pluck('title', 'id'))->required();
        $form->multipleSelect('parents', __("Parents"))->options(DogParent::all()->pluck('title', 'id'));


        return $form;
    }
}
