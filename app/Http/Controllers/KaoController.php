<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\UserModel;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;
use GuzzleHttp\Client;

class KaoController extends Controller
{
    /*考试注册*/
    public function regkao(Request $request)
    {
        if ($request->isMethod('post')) {
            $email = $request->input('email');
            
            $password =$request->input('password');
            //查数据库 判断邮箱唯一 
            $res = UserModel::where(['email'=>$email])->first();
            if ($res) {
                echo '邮箱已注册，请重新输入！';
                header('Refresh:1;url=/loginkao');  
            } 
   
            $data=[
                'email' => $email,
                'password'=> $password
            ];
           
            //签名加密
            ksort($data);

            //拼接数据
            $str0 = '';
            foreach ($data as $k => $v) {
                $str0 .= $k.'='.$v.'&'; 
            }
            $str=rtrim($str0,'&');
            // dd($str);
            //私钥加密
            $enc_path = storage_path('keys/priv.pem');
            //签名
            openssl_sign($str,$sign0,openssl_get_privatekey('file://'.$enc_path));

            $sign = base64_encode($sign0);
            $data['sign']=$sign;
            dump($data);die;
            /*发送服务端*/
            $url = 'http://www.lumen.com/regkao';
            $ch = curl_init($url);

            //设置参数
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,false);    //显示页面
            curl_setopt($ch,CURLOPT_POST,true);
            curl_setopt($ch,CURLOPT_POSTFIELDS,$data);

            curl_exec($ch);

            //获取错误信息
            // $errno = curl_errno($ch);
            $error = curl_error($ch);

            // var_dump($errno);
            // var_dump($error);

            curl_close($ch);

        }else{
            return view('kao/regkao');
        }    	
    }

    /*登录考试 */
    public function loginkao(Request $request)
    {
        if($request->isMethod('post')){
            $email = $request->input('email');
            $password = $request->input('password');

            $res = UserModel::where(['email'=>$email])->first();
            if ($res) {
                if (password_verify($password,$res->password)) {
                    // 存seeion
                    $token = Str::random(15);
                    session(['id'=>$res->id,'token'=>$token]);
                    
                    $redis_key = 'token:id'.$res->id;
                    Redis::set($redis_key,$token);

                    //设置过期时间
                    Redis::expire($redis_key,1800);

                    header('Refresh:2;url=/conterkao');
                    echo '登陆成功，页面跳转请稍等.....';

                }else{                   
                    echo '用户名或密码错误，请重新输入！';
                    header('Refresh:1;url=/loginkao');
                }
            }else{
                echo '用户名或密码错误，请重新输入！'; 
                header('Refresh:1;url=/loginkao');       
            }
        }else{
            return view('kao/loginkao');
        }
        
    }


    public function conterkao()
    {
        echo '个人中心';
    }

    /*退出*/
    public function loginoutkao()
    {
        session()->flash('id');
        echo '退出成功';
    }
}
