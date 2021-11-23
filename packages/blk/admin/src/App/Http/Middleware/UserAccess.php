<?php

namespace Blk\Admin\App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class UserAccess
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

        $userId = Auth::id();
        $user = User::where('id',$userId)->where(['status' =>'1'])->first();
        if(!$user){
            return redirect()->route('blocked');
        }
        return $next($request);
    }
}
