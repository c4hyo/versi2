<?php

namespace App\Http\Middleware;

use Closure;

class cekUser
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
        if($request->session()->exists('nama')&&$request->session()->exists('nama')){
           return $next($request);
        }else{
            return redirect ('login')->with('gagal','Anda belum login');;
        }
        
    }
}
