<?php

namespace App\Http\Middleware;

use Closure;

class UlogaMiddleware
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
        if ($request->session()->has('korisnik')) {
            $korisnik = $request->session()->get('korisnik');
            if ($korisnik->uloga != NULL) 
            {
                return $next($request);
            }
            else
            {
                return redirect()->back()->with('error','Nemate pravo pristupa ovoj stranici!');
            }
        }
        return redirect()->back()->with('error','Nemate pravo pristupa ovoj stranici!');
        
    }
}
