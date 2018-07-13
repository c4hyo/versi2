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
        if($request->session()->exists('user')&&$request->session()->exists('nama')){
             return $next($request);
        }else{
            //  return back()->with('gagal','Anda belum login');
            return abort('404');
            //  dd($request->session()->exist('user'));
        }
    }
}
