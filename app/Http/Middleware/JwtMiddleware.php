<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use JWTAuth;
use Exception;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use Tymon\JWTAuth\JWT;

class JwtMiddleware extends BaseMiddleware
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
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                return response()->json([
                    'OUT_STAT' => 'F',
                    'OUT_MESS' => 'Token is Invalid'
                ],500);
            }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                return response()->json([
                    'OUT_STAT' => 'F',
                    'OUT_MESS' => 'Token is Expired'
                ],500);
            }else{
                return response()->json([
                    'OUT_STAT' => 'F',
                    'OUT_MESS' => 'Authorization Token not found'
                ],500);
            }
        }
        return $next($request);
    }
}
