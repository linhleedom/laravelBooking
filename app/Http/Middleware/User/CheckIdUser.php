<?php

namespace App\Http\Middleware\User;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckIdUser
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
        if ( Auth::check() == false ) {
            return redirect()->route('userError');
        }else{
            if($request->id == Auth::user()->id ){
                return $next($request);
            }else{
                return redirect()->route('userError');
            }
        }
        
    }
}
