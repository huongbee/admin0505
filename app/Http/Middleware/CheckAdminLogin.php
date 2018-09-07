<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckAdminLogin
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
        if(Auth::check()){
            $user = Auth::user();
            if(!empty($user->roles->toArray())) 
                return $next($request);
            else{
                Auth::logout();
                return redirect()->route('getLogin')
                ->with('error','Bạn không có quyền truy cập');
            }
        }
        return redirect()->route('getLogin')
                ->with('error','Vui lòng đăng nhập');
    }
}
