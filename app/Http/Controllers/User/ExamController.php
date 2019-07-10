<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Auth\JWTauth;

class ExamController extends Controller
{
    public function login(Request $request)
    {
    	$name = $request->username;
    	$password = $request->password;
    	//做登录操作
    	
    	//登录成功后 获取用户id
    	$uid = 1;

    	$jwtAuth = JWTauth::getInstance();

    	$token = $jwtAuth->setuid($uid)->encode()->GetToken();
    	
    	$data = [
    		'code'=>200,
    		'msg'=>'登陆成功',
    		'data'=>[
    			'token'=>$token,
    			'expiration'=>time()+7200
    		]
    	];

    	echo json_encode($data,JSON_UNESCAPED_UNICODE);
    }

    public function conter(Request $request)
    {
    	echo '个人中心';
    	
    }
}
