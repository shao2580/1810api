<?php

namespace App\Http\Middleware;

use Closure;
use App\Model\KaoUserModel;
use Illuminate\Support\Facades\Redis;

class DandianLogin
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
        $id = session('id');
        if ($id) {
            $key = 'token:id'.$id;
            $redis_token = Redis::get($key);
            Redis::expire($key,1800);
            $assion_token = session('token');
            // echo 'session中的token：'.$assion_token;echo '<br>';
            // echo  'redis中的token：'.$redis_token;die;

            if ($assion_token ==$redis_token) {
                 return $next($request);
            }else{
                echo '您的账号在其他地方登录，请确认是否是本人操作';
                header('Refresh:3;url=/loginkao');die;
            }

            // $res = KaoUserModel::where(['id'=>$id])->first();
            // dump($res);
        }else{
            header('Refresh:2;url=/loginkao');
            echo '请先登录';die;
        }

       
    }
}
