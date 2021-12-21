<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }

    public function handle($request, Closure $next, ...$guards)
    {
        // chưa đăng nhập
        if(!Auth::check()){
            return redirect()->route('login');
        }
        // lấy thông tin user khi đăng nhập
        $user = Auth::user();

        // kiểm tra quyền người dùng
        $routes = $request->route()->getName();

        //dd($user->can($routes));

        return $next($request);

    }
}
