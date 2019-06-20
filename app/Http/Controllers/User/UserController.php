<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\UserModel;
use Illuminate\Support\Facades\Redis;
use GuzzleHttp\Client;

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

    /*加密*/
    public function encrypt()
    {
        $data_post = '张三李四';
        
        $data_post = base64_encode($data_post);

        $url = 'http://www.lumen.com/decrypt';

        $client = new Client();
        $res  =  $client ->request('POST',$url,[ 
                'body'  =>  $data_post 
            ]);
        echo $res->getBody();
    }

    /*对称加密*/
    public function encrypt1()
    {
        $data = '张三李四';             //数据
        $data = base64_encode($data);

        $method = 'AES-128-CBC';       //密码方式
        $key = 'password';             //密码
            //  OPENSSL_RAW_DATA       //ssl原始数据  或  OPENSSL_ZERO_PADDING 填充 0
        $iv = 'qazwsxedcrfvtgby';      //初始化向量  16位

        $enc_data = openssl_encrypt($data,$method,$key,OPENSSL_RAW_DATA,$iv);
        // var_dump($enc_data);

        $client = new Client();
        $url ='http://www.lumen.com/decrypt1';
        $res = $client->request('POST',$url,[
                'body'=>$enc_data
            ]);
        return  $res->getBody();
    }

    /*非对称加密  ----私钥加密--*/
    public function encrsa()
    {
        $data = '今天星期四';

        //获取私钥路径
        $enc_path = storage_path('keys/priv.pem');

        $private_key = openssl_get_privatekey('file://'.$enc_path);
        //私钥加密
        openssl_private_encrypt($data,$enc_data,$private_key);

        var_dump($enc_data);echo '<hr/>';

        // //获取公钥
        // $dec_path = storage_path('keys/pub.key');
        // $public_key = openssl_get_publickey('file://'.$dec_path);
        // //公钥解密
        // openssl_public_decrypt($enc_data,$dec_data,$public_key);

        // var_dump($dec_data); echo'<hr/>';

         /*发送服务端*/
        $url = 'http://www.lumen.com/decrsa';
        $client = new Client();
        $res = $client->request('post',$url,[
            'body'=>$enc_data
        ]);
        return $res->getBody();
    }

    /*非对称机密签名*/
    public function sign()
    {
        //原始数据
        $data = [
            'order_id'          => '123456',
            'order_amount'      => '300',
            'add_time'          => '123334535',
            'uid'               => '2233'
        ];
        ksort($data);

        //拼接数据
        $str0 = '';
        foreach ($data as $k => $v) {
            $str0 .= $k.'='.$v.'&'; 
        }
        $str=rtrim($str0,'&');

        //私钥加密
        $enc_path = storage_path('keys/priv.pem');
        //签名
        openssl_sign($str,$sign0,openssl_get_privatekey('file://'.$enc_path));

        $sign = base64_encode($sign0);
        $data['sign']=$sign;

        /*发送服务端*/
        $url = 'http://www.lumen.com/decsign';
        $client = new Client();
        $res = $client->request('post',$url,[
            'form_params'=>$data
        ]);
        return $res->getBody();
        
    }

    /*支付宝书记支付*/
    public function alipay()
    {
        $url = 'https://openapi.alipaydev.com/gateway.do';

        //请求参数
        $biz_content = [
            'subject'       =>'手机'.mt_rand(11111,99999).time(),           //商品标题
            'out_trade_no'  =>'1810'.mt_rand(11111,99999).time(),            //订单号  
            'total_amount'  =>mt_rand(1,999),                               //订单总金额
            'product_code'  =>'QUICK_WAP_WAY'                              //产品码             
        ];

        //公共参数
        $data = [
            'app_id'        =>'2016092700609180',
            'method'        =>'alipay.trade.wap.pay',
            'charset'       =>'utf-8',
            'sign_type'     =>'RSA2',
            'timestamp'     => date('Y-m-d H:i:s'),
            'version'       =>'1.0',
            'biz_content'   =>json_encode($biz_content)
        ];

        //参数 缺 签名 
        
    }


}//最后一行
