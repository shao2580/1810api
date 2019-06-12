<?php

namespace App\Admin\Controllers;

use App\Model\GoodsModel;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class GoodsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Model\GoodsModel';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new GoodsModel);

        $grid->column('goods_id', __('Goods id'));
        $grid->column('goods_name', __('Goods name'));
        $grid->column('cate_id', __('Cate id'));
        $grid->column('brand_id', __('Brand id'));
        $grid->column('goods_sn', __('Goods sn'));
        $grid->column('shop_price', __('Shop price'));
        $grid->column('market_price', __('Market price'));
        $grid->column('goods_img', __('Goods img'));
        $grid->column('goods_thumb', __('Goods thumb'));
        $grid->column('goods_number', __('Goods number'));
        $grid->column('is_new', __('Is new'));
        $grid->column('is_best', __('Is best'));
        $grid->column('is_hot', __('Is hot'));
        $grid->column('is_on_sale', __('Is on sale'));
        $grid->column('is_del', __('Is del'));
        $grid->column('keywords', __('Keywords'));
        $grid->column('description', __('Description'));
        $grid->column('content', __('Content'));

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
        $show = new Show(GoodsModel::findOrFail($id));

        $show->field('goods_id', __('Goods id'));
        $show->field('goods_name', __('Goods name'));
        $show->field('cate_id', __('Cate id'));
        $show->field('brand_id', __('Brand id'));
        $show->field('goods_sn', __('Goods sn'));
        $show->field('shop_price', __('Shop price'));
        $show->field('market_price', __('Market price'));
        $show->field('goods_img', __('Goods img'));
        $show->field('goods_thumb', __('Goods thumb'));
        $show->field('goods_number', __('Goods number'));
        $show->field('is_new', __('Is new'));
        $show->field('is_best', __('Is best'));
        $show->field('is_hot', __('Is hot'));
        $show->field('is_on_sale', __('Is on sale'));
        $show->field('is_del', __('Is del'));
        $show->field('keywords', __('Keywords'));
        $show->field('description', __('Description'));
        $show->field('content', __('Content'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new GoodsModel);

        $form->number('goods_id', __('Goods id'));
        $form->text('goods_name', __('Goods name'));
        $form->number('cate_id', __('Cate id'));
        $form->number('brand_id', __('Brand id'));
        $form->text('goods_sn', __('Goods sn'));
        $form->decimal('shop_price', __('Shop price'));
        $form->decimal('market_price', __('Market price'));
        $form->text('goods_img', __('Goods img'));
        $form->text('goods_thumb', __('Goods thumb'));
        $form->number('goods_number', __('Goods number'));
        $form->switch('is_new', __('Is new'));
        $form->switch('is_best', __('Is best'));
        $form->switch('is_hot', __('Is hot'));
        $form->switch('is_on_sale', __('Is on sale'));
        $form->switch('is_del', __('Is del'))->default(1);
        $form->text('keywords', __('Keywords'));
        $form->text('description', __('Description'));
        $form->textarea('content', __('Content'));

        return $form;
    }
}
