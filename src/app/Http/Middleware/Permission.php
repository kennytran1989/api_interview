<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Contracts\Repository\UserRepositoryInterface;
class Permission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $userReponsitory = app( UserRepositoryInterface::class);

        $data  = [
            'status'    => false ,
            'data'      => array(
                'code'      => 401,
                'message'   => 'Token Not Found'
            )
        ];

        try{
            if(!$request->header('Authorization')){
                return response()->json($data, 401);
            }
            $user   = $userReponsitory->auth($request->header('Authorization'));
            $request->attributes->add(['userInfo' => $user]);
            return $next($request);

        } catch (\Exception $ex) {
            $data['data']['message'] = $ex->getMessage();
            return response()->json($data, 401);
        }
    }
}
