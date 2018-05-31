<?php

namespace App\Http\Middleware;

use Closure;

class cekAdmin
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
        if($request->session()->exists('nama')||$request->session()->exists('user')){
           return $next($request);
        }else{
            // return redirect ('bukanwp-admin')->with('gagal','Anda belum login');
             return back()->with('gagal','Anda belum login');
        }
    }
}
