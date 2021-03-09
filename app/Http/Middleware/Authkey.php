<?php

namespace App\Http\Middleware;

use Closure;
use App\UserModel;
class Authkey
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
        $token = $request->header('PUSHER_APP_KEY');
        if($token!='ABCDEFJ'){
            return \response()->json(['message'=>'Appkey not found'],401);
        }
        return $next($request);
    }
}
