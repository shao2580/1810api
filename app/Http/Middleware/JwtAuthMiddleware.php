<?php

namespace App\Http\Middleware;

use Closure;
use App\Model\Auth\JWTauth;

class JwtAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token = $request->token;
        if ($token) {
            $jwtAuth = JWTauth::getInstance();
            $jwtAuth->SetToken($token);
            if ($jwtAuth->validate() && $jwtAuth->verify()) {
                return $next($request);
            }else{
                  $data = [
                    'code'=>40002,
                    'msg'=>'登录已超时，请重新登录',
                    'data'=>[]
                    ];
                echo json_encode($data,JSON_UNESCAPED_UNICODE);die;
            }
        }else{
            $data = [
                'code'=>40001,
                'msg'=>'缺少必要参数',
                'data'=>[]
            ];
            echo json_encode($data,JSON_UNESCAPED_UNICODE);die;
        }
        
    }
}
