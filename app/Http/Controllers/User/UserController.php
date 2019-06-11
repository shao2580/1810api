<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\UserModel;
use Illuminate\Support\Facades\Redis;

class UserController extends Controller
{

    public function login1()
    {
    	$key = 'tmp:1810';
    	Redis::set($key,mt_rand(11111,99999));

    	$v = Redis::get($key);
    	echo $v;die;


    	$data = [
    		'u_name' =>'zhansan',
    		'u_pass' =>'123456'
    	];
    	$uid = UserModel::insertGetId($data);
    	var_dump($uid);
    }


    /*get curl*/
    public function curl1()
    {
        //访问百度
        $url = 'https://www.baidu.com';

        //初始化
        $ch = curl_init($url);

        //设置参数              RETURNTRANSFER
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,false);  //控制浏览器输出 true=1 不输出  false输出

        //控制回话 执行
        curl_exec($ch);

        //关闭curl
        curl_close($ch);

    }

    /*获取token*/
    public function curl2()
    {
        $appid = 'wx6d2e84a8e26acdb4';
        $appsecret = '803b993f9443d5fcc625101d070e4797';

        $url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.$appid.'&secret='.$appsecret;
        $ch = curl_init($url);

        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

        $data = curl_exec($ch);

        curl_close($ch);

        //处理数据
        dd($data);
    }

    /*post 接收*/
    public function curl3()
    {
        // echo 1;
        dd($_POST);
    }

    /*post   发送请求*/
    public function curl()
    {
        // $data_post = [
        //     'name'=>'张三、李四',
        //     'pass'=>'1234567'
        // ];

        $url = 'http://www.1810api.com/login';

        $ch = curl_init($url);

        //设置参数
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,false);    //显示页面
        // curl_setopt($ch,CURLOPT_POST,true);
        // curl_setopt($ch,CURLOPT_POSTFIELDS,$data_post);

        curl_exec($ch);

        //获取错误信息
        // $errno = curl_errno($ch);
        $error = curl_error($ch);

        // var_dump($errno);
        // var_dump($error);

        curl_close($ch);

    }


    /*测试 form 表单 post提交 --登录*/
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {

            // 接收 表单 array 、 json   用$_post 
            
            // 接收  raw 数据  用 file_get_content() 

            dd($_POST);
        }else{
            return view('user/login');
        }
        
    }


}
