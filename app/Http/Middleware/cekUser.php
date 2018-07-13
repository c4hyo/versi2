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
        if($request->session()->exists('nama')&&$request->session()->exists('nim')){
           return $next($request);
        }else{
            // return redirect ('bukanwp-admin')->with('gagal','Anda belum login');
             return abort('404');
            // dd($request->session()->exist('nama'));
        }

    }
}
