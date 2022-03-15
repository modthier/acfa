<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
use Cache;
use Carbon\Carbon;

class Admin
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
        if(Auth::guard('admin')->check()){
            $expiresAt = Carbon::now()->addMinutes(5);
            Cache::put('user-online-'.Auth()->guard('admin')->id(),true,$expiresAt);
        }

        if (!Auth::guard('admin')->check()) {
            
            return redirect()->route('admin.showLoginForm')
                    ->with('admin-without-login','Sorry, you have to log in first');
        }
        return $next($request);
    }
}
