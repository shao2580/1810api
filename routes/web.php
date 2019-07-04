<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

/*项目 --H5--电商--*/
Route::get('/','User\UserController@index');   //主页面

Route::get('/error404','Publics\PublicsController@error404');   		//error404
Route::get('/testimonial','Publics\PublicsController@testimonial');     //testimonial
Route::get('/setting','Publics\PublicsController@setting');   			//设置
Route::get('/about-us','Publics\PublicsController@aboutus');   			//关于我们
Route::get('/contact','Publics\PublicsController@contact');   			//邮件

Route::any('/reg','User\UserController@reg');   //注册页面
Route::any('/login','User\UserController@login');   //登录页面


Route::get('/wishlist','Goods\GoodsController@wishlist');          //收藏
Route::get('/product-list','Goods\GoodsController@productList');   //商品列表
Route::get('/shop-single','Goods\GoodsController@shopSingle');     //商品-评论
Route::get('/cart','Goods\GoodsController@cart');   			   //购物车
Route::get('/checkout','Goods\GoodsController@checkout');   	   //结算
Route::get('/blog','Goods\GoodsController@blog');   	           //博客
Route::get('/blog-single','Goods\GoodsController@blogSingle');     //博客单







/**********************************/

/* api 接口-测试-客户端 */
Route::get('/login1','User\UserController@login1');
Route::any('/curl','User\UserController@curl');		//发送请求
Route::get('/curl1','User\UserController@curl1');    //get  curl
Route::get('/curl2','User\UserController@curl2');    //get  curl  获取token
Route::post('/curl3','User\UserController@curl3');    //post  
Route::any('/login2','User\UserController@login2');     //测试 登录
Route::get('/encrypt','User\UserController@encrypt');     //测试 加密
Route::get('/encrypt1','User\UserController@encrypt1');     // 对称加密
Route::get('/encrsa','User\UserController@encrsa');     // 非对称加密  --私钥加密
Route::get('/sign1','User\UserController@sign1');     // 非对称加密 -私钥加密 --签名
/**********************************/


Route::match(['get','post'],'/regkao','KaoController@regkao');  //考试注册
Route::match(['get','post'],'/loginkao','KaoController@loginkao');  //登录考试


Route::prefix('/')->middleware('ddlogin')->group(function(){
	Route::get('/conterkao','KaoController@conterkao');   //个人中心
	Route::get('/loginoutkao','KaoController@loginoutkao'); 		 //退出	

});