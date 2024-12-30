<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth; 
class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $userType): Response
    {   
        if(auth()->user()->type == $userType){
            return $next($request);
        }else{
            Auth::logout();
            return redirect()->route('login')
            ->with('error','You are not eligible, please contact to administrator ');
        }
    }
    
}
