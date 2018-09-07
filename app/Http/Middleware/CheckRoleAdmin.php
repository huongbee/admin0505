<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class CheckRoleAdmin
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
          //manager  //admin
        $listRole = [];
        foreach(Auth::user()->roles as $role){
            $listRole[] = $role->role;
        }
        // dd($listRole);
        if(in_array('admin',$listRole))
            return $next($request);
        else
            return redirect()->route('home')
            ->with('error','Bạn không có quyền truy cập');

    }
}
