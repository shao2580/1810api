<?php

namespace App\Http\Controllers\Goods;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use GuzzleHttp\Client;
use App\Model\GoodsModel;
use App\Model\UserModel;
use App\Model\CartModel;

class GoodsController extends Controller
{
    /*商品列表面*/
    public function productList()
    {

        $data = GoodsModel::where(['is_del'=>1])->paginate(6);

        return view('goods/product-list',['data'=>$data]);
    }

    /*商品-详情*/
    public function shopSingle(Request $request)
    {
        $goods_id = $request->input();
        if ($goods_id) {
             $data = GoodsModel::where(['goods_id'=>$goods_id])->get();

            return view('goods/shop-single',['data'=>$data]);
        }else{
            $data = GoodsModel::inRandomOrder()->take(1)->get();

            return view('goods/shop-single',['data'=>$data]);
        }

       
    }

    /*购物车*/
    public function cart(Request $request)
    {
        $data = CartModel::where(['is_del'=>1])->get();

        return view('goods/cart',['data'=>$data]);
    }

    /*结算*/
    public function checkout()
    {
        return view('goods/checkout');
    }

    /*博客*/
    public function blog()
    {
        return view('goods/blog');
    }

    /*博客单*/
    public function blogSingle()
    {
        return view('goods/blog-single');
    }

    /*收藏页*/
    public function wishlist()
    {
        return view('goods/wishlist');
    }










}//最后一行
?>