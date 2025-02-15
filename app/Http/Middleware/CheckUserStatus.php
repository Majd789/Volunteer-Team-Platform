<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class CheckUserStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
//        dd(session()->all());
//        dd(Auth::user()->status);
//        dd(Auth::check());

        if (Auth::check()) {
            // الآن يمكنك الوصول إلى خصائص المستخدم بأمان
            if (Auth::user()->status === 'inactive') {
                Auth::logout();
                return redirect()->route('login')->with('error', 'Your account is inactive.');
            }


        }
        return $next($request);
    }
}
