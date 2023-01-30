<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Auth;
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
        if (Auth::guard('masyarakat')->check()) {
            return route('masyarakat.dashboard');
        } elseif(Auth::guard('petugas')->check()){
            return route('petugas.dashboard');
        }else{
             return route('login'); 
        }
       
    }
}
