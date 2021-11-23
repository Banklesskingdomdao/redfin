<?php

namespace Blk\Admin\App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class login
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
        if(!($request->session()->has('email'))){
            return redirect()->route('admin.login.page');
        }
        return $next($request);
    }
}
